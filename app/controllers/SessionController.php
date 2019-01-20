<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
use Phalcon\Db\Result\Pdo;

class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        if (!$this->request->isPost()) {
            $this->tag->setDefault('email', 'demo');
            $this->tag->setDefault('password', 'phalcon');
        }
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession($user)
    {
        $this->session->set('auth', [
            'id' => $user['id'],
            'name' => $user['name']
        ]);
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function startAction()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        if ($this->request->isPost()) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $sql = "SELECT * FROM users WHERE (email = :email OR username = :email) AND active = 'Y'";

            $stmt = $this->db->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user != false)
                if (password_verify($password, $user['password'])) {

                    $this->_registerSession($user);

                    return $this->response->redirect('/');
                }

            $this->flash->error('Wrong email/password');
        }

        return $this->dispatcher->forward(
            [
                "controller" => "session",
                "action"     => "index",
            ]
        );
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');

        return $this->dispatcher->forward(
            [
                "controller" => "index",
                "action"     => "index",
            ]
        );
    }
}
