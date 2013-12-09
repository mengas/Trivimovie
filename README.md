# Install notes

## Environment 

 - You can use PHP's built-in web server, to fast run this app. For that I recomend have a host pointing to local (`/etc/hosts` Linux, `C:/Windows/System32/drivers/etc/hosts` Windows) like so

    127.0.0.1 local.trivimovie.com

 - You could also be using a virtual host to serve the web app. Apache example:

        # ReservaCanhcas
        <VirtualHost *:80>
            DocumentRoot /var/www/trivimovie.com/web
            ServerName local.trivimovie.com
            
            ErrorLog /var/logs/apache2/trivimovie-error.log
            LogLevel notice

            <Directory "/var/www/trivimovie.com/web">
                Options Indexes Includes FollowSymLinks MultiViews
                AllowOverride all
                Order allow,deny
                Allow from all
            </Directory>
        </VirtualHost>

## Requirements

 - Laravel basic requirements: http://laravel.com/docs/installation#server-requirements
 - Having composer available

## Install Steps

 - Inside the cloned repository (or exctracted), composer must be executed to install vendors

        $ ./composer.phar install => This will take a while
    
 - Generate assets files (optional):

        $ php artisan basset:build


## Support

I will write a blog entry soon, documenting this project.

Meanwhile, you may find me at http://twitter.com/w0rldart