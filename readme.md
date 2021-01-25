# Technical Test - Laravel MySQL Backup on Google Drive Using Scheduler

Create a demo laravel project:

- Add CRON JOB scheduler
- Scheduler should backup the MySQL or MongoDB database & upload it on Google Drive


This is the codebase for the module, which has one interface:

### Demo Video
Link: 


## Getting started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Here's a basic setup:

* Apache2
* PHP 7 - All the code has been tested against PHP 7.2
* Mysql (5.x), running locally
* Composer 2.0.8

* The module is written in the [Laravel 5.8](https://laravel.com/), and 
uses the [Blade](https://laravel.com/docs/8.x/blade) templating system.

 
### Installing

1. Clone the repository:
    ```shell script
    git clone https://github.com/armashfankar/laravel-database-backup-gdrive.git

    ```

2. Install the requirements for the repository using the `composer`:
   ```shell script
    cd donation-box-paypal/
    composer install
    
    ```

3. Copy `.env.example` to create `.env` file:
    ```shell script
    cp .env.example .env
    
    ```

4. Configure Database & Cache Drive in `.env` file:
    
    1. Database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=gdrive_backup
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. Create MySQL Database:
     ```shell script
    mysql -u root -p

    create database gdrive_backup;
    
    ```

6. Generate key for `.env` file:
    ```shell script
    php artisan key:generate
    
    ```

7. Migrate database & seed 10k records:
    ```shell script
    php artisan migrate
    ```

8. Run / Execute:
    ```shell script
    php artisan backup:mysql
    
    ```
    