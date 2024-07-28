# Laravel API Project

This is a Laravel project designed to provide a RESTful API for managing customers and services. The project includes authentication using Laravel Sanctum, automated testing with PHPUnit, and continuous integration using GitHub Actions.

## Features

- RESTful API for managing customers and services
- Authentication using Laravel Sanctum
- Automated testing with PHPUnit
- Continuous Integration (CI) with GitHub Actions
- Dockerized environment for easy setup and deployment

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL
- Node.js and npm (for frontend dependencies)
- Docker and Docker Compose

## Installation

### Local Development Setup

1. **Clone the repository**:

    ```bash
    git clone https://github.com/Nader27/code-challenge.git
    cd code-challenge
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
    php artisan db:seed
    ```

6. **Run the application**:

    ```bash
    php artisan serve
    ```

   The application will be available at `http://localhost:8000`.

### Docker Setup

To run this project with Docker, follow these steps:

1. **Build and Start the Containers**:

    ```bash
    docker-compose up --build -d
    ```

2. **Install Dependencies**:

    ```bash
    docker-compose exec app composer install
    ```

3. **Run Migrations**:

    ```bash
    docker-compose exec app php artisan migrate --force
    ```

4. **Seed the Database** (if applicable):

    ```bash
    docker-compose exec app php artisan db:seed
    ```

5. **Generate Application Key**:

    ```bash
    docker-compose exec app php artisan key:generate
    ```

Access the application at `http://localhost:8000`.

## Running Tests

To run the tests, use the following command:

```bash
php artisan test
