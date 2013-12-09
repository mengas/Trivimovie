# Install notes

## Environment 

 - A HTTP service is required, with php support and a virtual host pointing to the folder "web/" located in the root directory path of the project
 - For example, for those in Windows using XAMPP (adapt it to WAMP if that is what you are using) this host will suit you perfectly:

        # ReservaCanhcas
        <VirtualHost *:80>
            DocumentRoot "C:/xampp/htdocs/reservacanchas/web"
            ServerName local.reservacanchas.com
            
            ErrorLog "C:/xampp/apache/logs/reservacanchas-error.log"
            LogLevel notice

            <Directory "C:/xampp/htdocs/reservacanchas/web">
                Options Indexes Includes FollowSymLinks MultiViews
                AllowOverride all
                Order allow,deny
                Allow from all
            </Directory>
        </VirtualHost>

 - Don't forget the 127.0.0.1 local.reservacanchas.com hostname

## Server Requirements

 - Laravel basic requirements: http://laravel.com/docs/installation#server-requirements

## App Install Steps

 - First step is to go to the folder where the app has been extracted (example: cd /var/www/reservacanchas)

 - Inside the directory at its root level, composer must executed to install the dependencies:

        $ ./composer.phar install => This will take a while

 - After composer finishes, we need to edit (I have created the folder for you) the config file located in app/config/local

        app/config/database.php => Set the MySQL auth credencials, and the databases (already created) to be used
    
 - Generate assets files:

        $ php artisan basset:build
    
 - Now, the last step is to migrate and seed the database
 
        $ php artisan migrate:install --env=local
        $ php artisan migrate --seed  --env=local


# Usage notes

## Seeded data

 - If you check app/database/seeds/UsersTableSeeder.php file, you will see that 2 users are created with their respective password. Therefore, those credentials may be used to start testing/using the app