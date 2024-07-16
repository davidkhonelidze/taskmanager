# TaskManager

## Description

This project is built using Laravel with Inertia.js and Vue for the frontend, and MySQL for the database. It aims to provide a seamless and efficient application using modern web technologies.

## Stack

- Laravel
- Inertia.js
- Vue.js
- MySQL
- Tailwind CSS

## Prerequisites

Ensure you have the following installed on your local machine:

- Docker
- Docker Compose
- Composer

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/davidkhonelidze/taskmanager.git
    cd taskmanager
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up environment variables:
    ```bash
    cp .env.example .env
    ```

4. Install Laravel Sail:
    ```bash
    composer require laravel/sail --dev
    ```

5. Start the Docker containers:
    ```bash
    ./vendor/bin/sail up
    ```

6. Generate the application key:
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

7. Run migrations:
    ```bash
    ./vendor/bin/sail artisan migrate
    ```

8. Seed the database:
    ```bash
    ./vendor/bin/sail artisan db:seed
    ```

9. Build front end:
    ```bash
    ./vendor/bin/sail npm run build
    ```
   
## Usage

### Access the Application

Once the Docker containers are up and running, you can access the application at:

http://localhost

You can access redmine at:

http://localhost:3000

### To Work with Redmine API Instead of Database

1. Change the `API_TYPE` variable in the `.env` file to `"api"`:
    ```env
    API_TYPE=api
    ```

2. Copy the API key from Redmine and set the `API_KEY` in the `.env` file:
    ```env
    API_KEY=your_redmine_api_key
    ```

3. Create general data (projects, issues, statuses, trackers) in Redmine.

4. Clear the application configuration cache:
    ```bash
    php artisan config:clear
    ```

