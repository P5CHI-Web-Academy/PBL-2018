Installation guide
===

Pre-installation requirements
--------------

**Important** You need to have installed Docker and Docker Compose
to work with provided repository. If you don't have it on your PC,
you need to install it conform instruction of official site.

Here are links for installation of Docker CE:

*If you have Ubuntu* https://docs.docker.com/install/linux/docker-ce/ubuntu/
*If you have Mac OS* https://docs.docker.com/docker-for-mac/install/
*If you have Windows* https://docs.docker.com/docker-for-windows/install/

Here is a link for installation of Docker Compose (choose your operating system
while being on page):

https://docs.docker.com/compose/install/#prerequisites

If you are using Ubuntu you can also give your user special rights
for running all Docker commands without writing "sudo" before every operation:

```
sudo usermod -aG docker <nameOfUser>
```

After this you need to reboot your system.

Process of installation
---------------

You need to GitClone provided repo or download it as ZIP file and unpack it
in some folder. After this, you need to enter in folder, where it was unpacked,
enter inside docker folder and run terminal from there.

You need to create an .env file that has all settings required for launch of
Docker. For this it is needed to copy all data from *env-example* file:

```
cp env-example .env
```

Next step: you need to build all containers from this project. For this you input:

```
docker-compose build
```

After end of building all those containers you need to run them:

```
docker-compose up -d
```

If you want to up only some of containers, then you need to input:

```
docker-compose up -d <nameOfContainer>
```

At the moment, there will appear 4 containers:

* slides_workspace_1
* slides_mysql_1
* slides_php-fpm_1
* slides_nginx_1

You will work mainly with first container and our primary configuration requires
installation of symfony inside container *workspace*. 

Enter in your docker folder and open terminal. Then you need to enter in container via
bash:

```
docker-compose exec workspace bash
```

Check if you are in *var/www* path. Then execute:

```
composer install
```

After installation of composer it is required to check */etc/hosts* file to see
all IP and their definition and make some edit. For this, while being inside
container, you write:

```
nano /etc/hosts
```

Inside this file, after first line need to be written:

```
127.0.0.1   slides.local
```

After this you save the file, get out from the container and check if server is running.
For this enter in any browser and write *slides.local/*. There must appear a screen.
