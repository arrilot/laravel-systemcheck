[![Latest Stable Version](https://poser.pugx.org/arrilot/laravel-systemcheck/v/stable.svg)](https://packagist.org/packages/arrilot/laravel-systemcheck/)
[![Total Downloads](https://img.shields.io/packagist/dt/arrilot/laravel-systemcheck.svg?style=flat)](https://packagist.org/packages/arrilot/laravel-systemcheck)
[![Build Status](https://img.shields.io/travis/arrilot/laravel-systemcheck/master.svg?style=flat)](https://travis-ci.org/arrilot/laravel-systemcheck)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/arrilot/laravel-systemcheck/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/arrilot/laravel-systemcheck/)

# Laravel System Check (WIP)

*Check your server and application configuration according to APP_ENV*

## Installation

1) Run ```composer require arrilot/laravel-systemcheck```

2) Register a service provider inside the `app.php` configuration file.

```php
...
'providers' => [
    ...
    Arrilot\SystemCheck\ServiceProvider::class,
],
```

## Usage

This package provides a `php artisan system:check` command that performs a bunch of checks and prints results.

![screenshot](https://i.gyazo.com/1fb26f1eee971542accbc13eb3fdb49c.png)

There are two modes.

1. production
2. dev

Each mode has its own collection of checks.

The mode is determined automatically according to APP_ENV.
You can override current environment by passing --env to the command. `php artisan system:check --env=production`

## Configuration

By default the package treats the following environments as "production":
```php
['production', 'prod']
```

You can override them by calling
```php
app()->make('system.checks')->setProductionEnvironments(['prod1', 'prod2']);
```
in your `AppServiceProvider`
