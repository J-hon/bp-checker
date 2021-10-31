# BP Checker
A Laravel application which will be used by nurses to input their patients’ blood pressure readings.

## Features Implemented
* A page for creating patients
* A page to record blood pressure readings for patients
* Export a CSV of all patients

## Tools

* Laravel
* Laravel Livewire
* Tailwind CSS
* Livewire Datatables
* Laravel Excel

## Setup and Installation

The project requires the following dependencies to run

* PHP 7+
* Composer
* Node 14+

Run the following to get started
```sh
git clone https://github.com/J-hon/bp-checker.git

cd bp-checker

composer install

npm install

npm run dev
```

Create .env file

`cp .env.example .env`

Fill in your database credentials in the .env file
```
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

Run the database migration

`php artisan migrate`

Seed your database (To seed a nurse and 50,000 patients)

`php artisan db:seed`

```
Login credentials of seeded nurse to login:

Email - johndoe@gmail.com
Password - password
```

Start your server

`php artisan serve`

Start the queue (Queue is used in case of large data exports)

`php artisan queue:work`

Run tests

`php artisan test`
