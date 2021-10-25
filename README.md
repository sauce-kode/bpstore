# BPStore
_A simple Laravel web application to be used by nurses to store the blood pressure readings of their patients._

## Notes

### Exporting Data
For good user experience and optimum performance of the application in case of large data exports, the export was queued in batched jobs. Hence, a queue should be started (further notes found below).

## Features Implemented
* Page for creating patients
* Page to record blood pressure readings of patients
* Exporting patients' data to CSV

## Tools

* Laravel
* Laravel Livewire
* Tailwind CSS

## Setup and Installation

This project requires the following dependencies to run

* [PHP 7+](https://www.php.net/downloads.php)
* [Composer](https://getcomposer.org/download/)
* [Node 14+](https://nodejs.org/en/)

Clone the project, install the dependencies and run Laravel mix.
```sh
git clone https://github.com/sauce-kode/bpstore.git
cd bpstore
composer install
npm install
npm run watch
```

Create .env file
```sh
cp .env.example .env
```

Enter the appropriate values for the following database values in your .env file
```sh
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

Run the database migration
```sh
php artisan migrate
```

Seed your database (A seeder for 50000 patients has been added)
```sh
php artisan db:seed
```

Start your server
```sh
php artisan serve
```

Start queue (Or depending on your OS, you can configure a supervisor)
```sh
php artisan queue:work
```