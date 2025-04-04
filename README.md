# LibraryApp
## Installation
 1. open command prompt inside the LibraryApp folder and type command `composer update`.
 2. rename the `.env.example` file to `.env`.
 3. inside the command prompt type `php artisan key:generate`.
 4. then type `php artisan migrate`
 5. after migrating next type `php artisan db:seed`
 6. then type `npm install && npm run build`.
 7. finally type `php artisan serve` to run the program.
## Pages
 `http://127.0.0.1:8000/library`
 `http://127.0.0.1:8000/authors`
 `http://127.0.0.1:8000/books`
