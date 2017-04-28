# Laravel Action Log

[![StyleCI][ico-styleci]][link-styleci]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require scolib/laravel-action-log
```

After updating composer, add the ServiceProvider to the `providers` array in `config/app.php`

```php
\Sco\ActionLog\LaravelServiceProvider::class,
```

If you want to use the facade to logging actions, add this to the `aliases` array in `config/app.php`

```php
'ActionLog' => Sco\ActionLog\Facade::class,
```

Copy the package config to your local config with the publish command:

```php
php artisan vendor:publish --provider="Sco\ActionLog\LaravelServiceProvider"
```

Default action log table name is `action_logs`, If you want to customize it, edit the `config/actionlog.php`

Now run the artisan migrate command:
```php
php artisan migrate
```

## Usage

### Method 1

Override the property `$events` in your Model

```php
    protected $events = [
        'created'  => \Sco\ActionLog\Events\ModelWasCreated::class,
    ];
```

All available event

```php
[
    'created'   => \Sco\ActionLog\Events\ModelWasCreated::class
    'deleted'   => \Sco\ActionLog\Events\ModelWasDeleted::class
    'restored'  => \Sco\ActionLog\Events\ModelWasRestored::class
    'saved'     => \Sco\ActionLog\Events\ModelWasSaved::class
    'updated'   => \Sco\ActionLog\Events\ModelWasUpdated::class
    'creating'  => \Sco\ActionLog\Events\ModelWillCreating::class
    'deleting'  => \Sco\ActionLog\Events\ModelWillDeleting::class
    'restoring' => \Sco\ActionLog\Events\ModelWillRestoring::class
    'saving'    => \Sco\ActionLog\Events\ModelWillSaving::class
    'updating'  => \Sco\ActionLog\Events\ModelWillUpdating::class
]
```

### Method 2
Manual logging actions

```php
ActionLog::info($type, $content, $tableName = '')
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email slice1213@gmail.com instead of using the issue tracker.

## Credits

- [klgd][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-styleci]: https://styleci.io/repos/89337140/shield?branch=master
[ico-version]: https://img.shields.io/packagist/v/ScoLib/laravel-action-log.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ScoLib/laravel-action-log/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ScoLib/laravel-action-log.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ScoLib/laravel-action-log.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ScoLib/laravel-action-log.svg?style=flat-square

[link-styleci]: https://styleci.io/repos/89337140
[link-packagist]: https://packagist.org/packages/ScoLib/laravel-action-log
[link-travis]: https://travis-ci.org/ScoLib/laravel-action-log
[link-scrutinizer]: https://scrutinizer-ci.com/g/ScoLib/laravel-action-log/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ScoLib/laravel-action-log
[link-downloads]: https://packagist.org/packages/ScoLib/laravel-action-log
[link-author]: https://github.com/klgd
[link-contributors]: ../../contributors
