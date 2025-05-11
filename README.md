<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/images/logo.svg" width="400" alt="Logo"></a></p>

## About Kitflix

It's Netflix, but for kittens!

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/marknuyens/kitflix.git
    ```
2. Navigate to the project directory:
   ```bash
   cd kitflix
   ```
3. Install the dependencies:
   ```bash
   composer install
   npm install
   npm run build
   ```
4. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
5. Set up the database:
    ```bash
    touch database/database.sqlite
    php artisan migrate
    php artisan db:seed
    ```
6. Generate the application key:
   ```bash
   php artisan key:generate
   ``` 
7. Start the development server:
   ```bash
   php artisan serve
   ```
8. Open your browser and go to `http://localhost:8000` to see the application in action.
9. Oh, and simply press `Ctrl + C` to stop the server when you're done.
10. Last, but not least: *enjoy the kittens!* 😻
