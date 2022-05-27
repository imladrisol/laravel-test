<p>
<b>Starter project from Laravel8 + Docker (php8 + nginx + mysql)</b>

clone project
**********
>docker run --rm -v $(pwd):/app composer install

>sudo chown -R $USER:$USER ~/<project_path>
>
> cp .env.example .env
*********
change .env:

DB_HOST=db

DB_PASSWORD=test
**********************

>docker-compose up -d
>
>docker ps

>docker-compose exec app php artisan key:generate

>docker-compose exec app php artisan config:cache
***********

>docker-compose exec db bash

>mysql -u root -p #### paswd: test

>show databases;

>GRANT ALL ON laravel.* TO 'root'@'%' IDENTIFIED BY 'test';

>FLUSH PRIVILEGES;

>exit;

>exit
********


>docker-compose exec app php artisan migrate

>docker-compose exec app php artisan tinker

\DB::table('migrations')->get();
</p>

>docker-compose exec app php artisan migrate:fresh --seed


