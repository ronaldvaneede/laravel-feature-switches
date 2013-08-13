# Feature switches in Laravel 4

[![Build Status](https://travis-ci.org/ronaldvaneede/laravel-feature-switches.png?branch=master)](https://travis-ci.org/ronaldvaneede/laravel-feature-switches)

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

## Wishes

In the end this should support a configuration like this:

```php
// on / off / users -> user_list => 'a,b,c' / staff / 1% 
'features' => array(
    'login' => array('enabled' => 'on'),
    'facebook' => array('enabled' => 'off'),
    'google+' => array('enabled' => '5%'),
    'twitter' => array('enabled' => 'users', 'user_list' => 'ronald,jaap,piet')
)
```

## Using Feature switches

To use the feature switches you have to add this to the `app/config/app.php` file:

```php
'features' => array(
    'feature-a' => array('enabled' => 'on'),
    'feature-b' => array('enabled' => 'off')
)
```

Then you can use `Featureswitch::allow('feature-a')` and `Featureswitch::allow('feature-b')` to check if the feature is available.
The `allow()` method will return either `true` or `false`.