# Interactive Make for Laravel 5.4

## Getting Started

To get started you must first install the package from composer.

```bash
composer require laracademy/interactive-make
```

Add the package service provider to your `config/app.php`

```php
Laracademy\Commands\MakeServiceProvider::class,
```

Run this command in your terminal then follow the prompts

```bash
php artisan make
```
