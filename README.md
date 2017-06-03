# Interactive Make for Laravel 5.4

## Getting Started

To get started you must first install the package from composer.

```bash
composer require laracademy/interactive-make
```

### Laravel >= 5.5

That's it! The package is auto-discovered on 5.5 and up!

### Laravel <= 5.4

Add the package service provider to your `config/app.php`

```php
Laracademy\Commands\MakeServiceProvider::class,
```

Run this command in your terminal then follow the prompts

```bash
php artisan make
```
