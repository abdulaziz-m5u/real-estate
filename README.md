# Laravel 8 Real Estate / Venues Management with Adminpanel

## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/real-estate.git your-project
```

Go to the project directory

```bash
  cd your-project
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate
```

```bash
    php artisan db:seed --class=UsersSeeder
```

#### Login

-   email = admin@example.com
-   password = 12345678
