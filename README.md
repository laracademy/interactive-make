# Interactive Make for Laravel 5.4

[![Latest Stable Version](https://poser.pugx.org/laracademy/interactive-make/v/stable)](https://packagist.org/packages/laracademy/interactive-make)  [![Total Downloads](https://poser.pugx.org/laracademy/interactive-make/downloads)](https://packagist.org/packages/laracademy/interactive-make) [![Latest Unstable Version](https://poser.pugx.org/laracademy/interactive-make/v/unstable)](https://packagist.org/packages/laracademy/interactive-make) [![License](https://poser.pugx.org/laracademy/interactive-make/license)](https://packagist.org/packages/laracademy/interactive-make)

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

### Preview

![](http://i.imgur.com/qR8AQ4U.gif)
