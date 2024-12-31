# A cleanroom redump.org reimplementation using the 2009 source code

# Project Setup

[Herd](https://herd.laravel.com/) provides a native Laravel development environment for macOS and Windows.

1. Install development dependencies:
    ```sh
    herd install php@8.4
    herd install node
    ```

2. Clone the repository:
    ```sh
    git clone https://github.com/RyuuSlayer/ReRedump.git
    cd ReRedump
    ```

3. Set up your development environment:
    ```sh
    herd park ReRedump
    ```

4. Set up MariaDB:
    - Download and install [MariaDB](https://mariadb.org/download/)
    - Start the MariaDB service

5. Copy the example environment file and configure it:
    ```sh
    cp .env.example .env
    ```
    Update the database credentials in `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=reredump
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Install dependencies and build assets:
    ```sh
    composer install
    npm install
    ```

7. Set up the application:
    ```sh
    php artisan key:generate
    php artisan migrate
    ```

8. Start the development servers:
    ```sh
    # Terminal 1: Start Laravel server
    php artisan serve

    # Terminal 2: Start Vite dev server with hot reload
    npm run dev
    ```

Now you can access the application at `http://localhost:8000`. Any changes to CSS or JavaScript will automatically reload in your browser.

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