<a href="https://phalcon.io/"><img src="https://avatars1.githubusercontent.com/u/1221505?s=180&v=4" alt="Phalcon PHP Logo"></a>
# Phalcon PHP - Boilerplate
Phalcon PHP boilerplate with Volt Engine template structure

# Features
* Phalcon 3.x
* Volt Template Engine
* Bootstrap Flash Notifications

# Getting Started
1. Clone the repo: ```git clone https://github.com/alexandrejacarvalho/phalcon-boilerplate.git```
2. Build docker image:
    1. ```git clone https://github.com/AlexCarvalhoDev/docker-phalcon.git```
    3. ```docker build -t phalcon docker-phalcon```
3. Go to the repo: ```cd phalcon-boilerplate/```
4. Give permissions to the cache folder (mandatory for volt rendering): ```chmod -R a+w cache/```
4. Run docker image: ```docker run -d -v $(pwd):/var/www/html -p 8080:80 phalcon```

# Project Structure
```
├── app/
│   ├── config/
│   │   ├── config.php                (database and app configuration file)
│   │   ├── loader.php
│   │   ├── router.php
│   │   └── services.php
│   ├── controllers/
│   │   ├── ControllerBase.php
│   │   └── IndexController.php       (index controller as example)
│   |── views/
│   │   ├── index/
│   │   │   └── index.volt            (index volt template as example)
│   │   ├── index.volt
│   │   └── structure.volt            (volt template base)
├── cache/
|   └── volt/
├── public/
└── index.html
```
# FAQ
> Please open an issue with your questions.

# Contributing
Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (git checkout -b feature/AmazingFeature)
3. Commit your Changes (git commit -m 'Add some AmazingFeature')
4. Push to the Branch (git push origin feature/AmazingFeature)
5. Open a Pull Request
