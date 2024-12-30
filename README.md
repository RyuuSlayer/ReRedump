# A cleanroom redump.org reimplementation using the 2009 source code

# Project Setup

## Prerequisites

- PHP 8.4 or higher with mysqli enabled in the php.ini
- Composer
- Node.js and npm
- MariaDB (recommended)

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/RyuuSlayer/ReRedump.git
    cd project
    ```

2. Copy the example environment file and configure it:

    ```sh
    cp .env.example .env
    ```

    Open the [.env](http://_vscodecontentref_/1) file and update the following variables to match your MariaDB configuration:

    ```env
    DB_CONNECTION=mariadb
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

3. Install PHP dependencies:

    ```sh
    composer install
    ```

4. Generate the application key:

    ```sh
    php artisan key:generate
    ```

5. Run the database migrations:

    ```sh
    php artisan migrate
    ```

6. Install Node.js dependencies:

    ```sh
    npm install
    ```

7. Build the front-end assets:

    ```sh
    npm run dev
    ```

## Running the Project

1. Start the local development server:

    ```sh
    php artisan serve
    ```

2. Open your browser and visit `http://localhost:8000`.

## Additional Commands

- Clear the application cache:

    ```sh
    php artisan optimize:clear
    ```

- Refresh the database:

    ```sh
    php artisan migrate:fresh
    ```

- Watch for changes and automatically refresh CSS:

    ```sh
    npm run dev
    ```

## License

License has yet to be decided on.