
## How to Setup project

Make sure you have at least PHP 8.3.11 using this command in terminal
`` 
php -v
``
<br>
To update your php you can downloadp php new version by clicking <a href="https://windows.php.net/downloads/releases/php-8.3.12-nts-Win32-vs16-x64.zip">here

To run this website do
<br>
``
php artisan serve
``
<br>
<br>
``
npm run dev or npm run build
``
Before running there is somestep
<br>
<p>After cloning copy the .env-example and rename it to .env <b>ITS A MUST!!</b></p>
<p>Insert all the database information in .env file</p>
<br>
``
php artisan key:generate
``
<br>
``
php artisan migrate:fresh --seed
``
<br>

