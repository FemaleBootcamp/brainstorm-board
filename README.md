# brainstorm-board
The Brainstorm Board is a web applications that allows users to log in and create an online board for brainstorming. It simulates the usual sticker board and allows for collaboration among multiple users. The user that creates the board can share its unique URL with their collaborators, so everyone can have access to it and be able to add new ideas.

#### Docker installation
1. Install Docker and Docker Compose for the operating system of your choice.
2. Get into your project directory (`cd brainstorm-board`)
3. Build the docker containers using `docker-compose build --no-cache --pull --force-rm`
4. Run the containers using `docker-compose up -d`
5. Access the PHP container using `docker exec -it brainstormboard_phpfpm_1 bash`
6. Run composer install to install of the composer dependencies.
7. Rename the docker example `.env` file using `cp .env.docker.example .env`
8. Run `php artisan key:generate` to generate an application key (`APP_KEY`)
9. Run `php artisan migrate` to run all of the migration
10. Add `127.0.0.1 brainstormboard.local:9000` to your `/etc/hosts` file
11. Access the site using `brainstormboard.local:9080` in your browser