To run this application locally, you need to perform some operations in the terminal
1- composer install
2- npm install
3- npm run dev
Now you have all the required files

The next step is to create a database by migrating it and populating it with factories and seeds
Run the following command
php artisan migrate --seed ;

Now run the php artisan serve command and visit the local site