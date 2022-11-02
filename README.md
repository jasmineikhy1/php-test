# php-test


Copy .env.example to .env
```twig
 cp .env.example .env
```

add database information
```twig
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=php-test
DB_USERNAME=root
DB_PASSWORD=
```

Install composer packages 
```twig
composer install
```

Generate app key  
```twig
php artisan key:generate
```

Migrate database  
```twig
php artisan migrate
```

Run seeder command to insert dummy data  
```twig
php artisan db:seed
```

run the project
```twig
php artisan serve
```
