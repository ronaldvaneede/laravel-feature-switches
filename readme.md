# Feature switches in Laravel 4

This package allows you to use feature switches in your code.

## Installation

You can install this package trough Composer. Add this to your `composer.json` file:
```js
"require": {
    // ...
    "ronaldvaneede/featureswitch": "dev-master"
}
```

Now run `composer install` or `composer update` to download it.

After that add the service provider to the `providers` array within the `app/config/app.php` file.

```php
'providers' => array(
    // ...
    'Ronaldvaneede\Featureswitch\FeatureswitchServiceProvider',
)
```

That's it!

## Using Feature switches

...to be continued...