## laravel-oauth2-server-sample
A sample for https://github.com/lucadegasperi/oauth2-server-laravel

### Install
    $ git clone https://github.com/mamor/laravel-oauth2-server-sample.git
    $ cd laravel-oauth2-server-sample
    $ composer install

### Config
1. Correct database settings
1. Change "url" in app/config/app.php to base URL that accessed from browser

### Migration
    $ php artisan migrate --package="lucadegasperi/oauth2-server-laravel"
    $ php artisan migrate --seed

### Login
* email: your-email@example.com
* password: password

### Note
Once access token is issued, please access the following URL.
* /scope1?access_token={YOUR_ACCESS_TOKEN} ... This should be allowed
* /scope2?access_token={YOUR_ACCESS_TOKEN} ... This should be allowed
* /scope3?access_token={YOUR_ACCESS_TOKEN} ... This should be rejected

### License
Copyright 2014, Mamoru Otsuka. Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
