# Laravel API Project

This is a Laravel project designed to provide a RESTful API for managing customers and services. The project is set up with authentication using Laravel Sanctum and includes automated testing and continuous integration using GitHub Actions.

## Features

- RESTful API for managing customers and services
- Authentication using Laravel Sanctum
- Automated testing with PHPUnit
- Continuous Integration (CI) with GitHub Actions

## Requirements

- PHP 8.3 or higher
- Composer
- MySQL
- Node.js and npm (for frontend dependencies)
- Git

## Installation

1. **Clone the repository**:

    ```bash
    git clone https://github.com/your-username/your-repo-name.git
    cd your-repo-name
    ```

2. **Install dependencies**:

    ```bash
    composer install
    npm install
    ```

3. **Copy the example environment file and set the necessary environment variables**:

    ```bash
    cp .env.example .env
    ```

   Update the `.env` file to match your environment settings.

4. **Generate an application key**:

    ```bash
    php artisan key:generate
    ```

5. **Set up the database**:

   Create a database for the application and update the `.env` file with your database settings.

    ```bash
    php artisan migrate
    ```

6. **Run the application**:

    ```bash
    php artisan serve
    ```

   The application will be available at `http://localhost:8000`.

## Running Tests

To run the tests, use the following command:

```bash
php artisan test
