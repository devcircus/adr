# Bright Components - ADR - Action Domain Responder
### A collection of BrightComponents packages for ADR organization of your Laravel app.

[![Latest Stable Version](https://poser.pugx.org/bright-components/adr/v/stable)](https://packagist.org/packages/bright-components/adr)

![Bright Components](https://s3.us-east-2.amazonaws.com/bright-components/bc_large.png "Bright Components")

### Disclaimer
The packages under the BrightComponents namespace are basically a way for me to avoid copy/pasting simple functionality that I like in all of my projects. There's nothing groundbreaking here, just a little extra functionality for form requests, controllers, custom rules, services, etc.

## Installation
You can install the package via composer:

```bash
composer require bright-components/adr
```
> Note: Until version 1.0 is released, major features and bug fixes may be added between minor versions. To maintain stability, I recommend a restraint in the form of "^0.1.0". This would take the form of:
```bash
composer require "bright-components/adr:^0.1.0"
```

Laravel versions > 5.6.0 will automatically identify and register the service provider.
If you are using an older version of Laravel, add the package service provider to your config/app.php file, in the 'providers' array:
```php
'providers' => [
    //...
    BrightComponents\Adr\AdrServiceProvider::class,
    //...
];
```

## Usage
The adr package brings together several other packages from the bright-components namespace, each that adds another layer to the ADR structure. The package itself comes with one command that brings all of the commands from the other packages together. For example, with the bright-components/action package, you can run ```php artisan adr:action StoreComment``` to generate a ```StoreComment`` action. Using the bright-components/responders package, running ```php artisan adr:responder StoreResponder``` will give you the resulting Responder class. The same is true for the "service" package and the "valid" package.

Now, with the "adr" package, you are given a single ```adr:make``` command to generate all of these classes at the same time.

```php artisan adr:make StoreComment``` will produce, according to your configuration settings for each package, a:
StoreComment action, StoreComment responder, and a StoreComment service.

### Optional Command Options
The ```adr:make``` command offers several options. By default, with no options, the command will generated the Action, Responder and Service classes. Passing the ```no-action```, ```no-service```, or ```no-responder``` flag, will skip generating that specific class. You can also add the ```valid``` flag to add a validator for the service. So,

```bash
php artisan adr:make StoreComment --no-responder --valid
```

will produce a StoreComment action, a StoreComment service and a StoreComment validator.
// TODO

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email clay@phpstage.com instead of using the issue tracker.

## Roadmap

We plan to work on flexibility/configuration soon, as well as release a framework agnostic version of the package.

## Credits

- [Clayton Stone](https://github.com/devcircus)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
