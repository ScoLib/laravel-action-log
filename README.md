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

## Usage

config/app.php
providers
```php
'providers' => [
    \Sco\ActionLog\LaravelServiceProvider::class,
]
```

model file add $events

```php
    protected $events = [
        'created'  => \Sco\ActionLog\Events\ModelCreatedEvent::class,
        'updating' => \Sco\ActionLog\Events\ModelUpdatingEvent::class,
        'updated'  => \Sco\ActionLog\Events\ModelUpdatedEvent::class,
    ];
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
