Deployment
 
..* Install Docker Community Edition https://docs.docker.com/install/
..* Clone project files from https://github.com/P5CHI-Web-Academy/PBL-2018.git
..* Enter project_folder/docker folder and run: sudo docker-compose up -d (this command will create the four containers: php-fpm, mysql, nginx, workspace)
..* Enter workspace container: sudo docker-compose exec workspace bash
..* In workspace container run:  php bin/console doctrine:schema:update --force (this command will create the database schema) 
..* To create first supervisor it is needed to access the database with the help of any mysql software, for example Workbench, and in user table insert first supervisor.
..* In workspace container run: composer install (to install symfony components)
..* In workspace run: php bin/console assets:install
..* In project root folder run: sudo chmod 777 -R * to give all privileges for all files
..* Accesc web application as 127.0.0.1/app_dev.php/admin

If local host uses Linux the sudo is needed, otherwise sudo is not needed.
