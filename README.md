# IAD CHATROOM | MVC Architecture | PHP from scratch 

This is a simple project PHP from scratch to create a little chatroom.

## installation & Starting 
These instructions apply if you installed:
  - The Docker App, i.e., if you are using macOS, Linux or Windows Pro/Enterprise/Education.
  - Composer
  
1. First, download the , either directly or by cloning the repo.
1. Run in the root folder **docker-compose up -d** to prepare the environment (Apache, PHP7, Mysql, phpMyAdmin, Insert fixtures data).
1. Run in the 'www/iad_chat' **composer install** to install the project dependencies.
1. Now that installation is complete, you can test :)
     - URL: http://localhost:8001/iad_chat/public/index.php/
     - Users Fixture (dump/iad_chat_db.sql): 
           <br> william@email.com / password
           <br> marc@email.com / password
           <br> john@email.com / password
            
 If you need to re-install, run these commands:
 -  docker-compose stop   
 -  docker-compose rm   
 -  docker-compose rm   
 -  docker volume prune --force 
 -  docker-compose up --build --force-recreate