# Interactive Make for Laravel 5.4

[![Latest Stable Version](https://poser.pugx.org/laracademy/interactive-make/v/stable)](https://packagist.org/packages/laracademy/interactive-make)  [![Total Downloads](https://poser.pugx.org/laracademy/interactive-make/downloads)](https://packagist.org/packages/laracademy/interactive-make) [![Latest Unstable Version](https://poser.pugx.org/laracademy/interactive-make/v/unstable)](https://packagist.org/packages/laracademy/interactive-make) [![License](https://poser.pugx.org/laracademy/interactive-make/license)](https://packagist.org/packages/laracademy/interactive-make)

## Getting Started

To get started you need to install the package with Composer:

```bash
composer require laracademy/interactive-make
```

### Laravel >= 5.5

That's it! The package is auto-discovered on 5.5 and up!

### Laravel <= 5.4

Add the package service provider to your providers array in `config/app.php`

```php
'providers' => [
    // ...
    Laracademy\Commands\MakeServiceProvider::class,
],
```

To start using this package, run this command in your terminal and follow the onscreen prompts:

```bash
php artisan make
```

### Preview

![](http://i.imgur.com/qR8AQ4U.gif)



## Disclaimer

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
