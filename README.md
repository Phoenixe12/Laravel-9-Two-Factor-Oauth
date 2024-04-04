
# Laravel Fortify Example

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Laravel Authentication Scaffold using Laravel Fortify and Bootstrap.

This repository provides an example of Laravel authentication scaffold using Laravel Fortify and Bootstrap.

## Installation

### Clone Repository


```shell
$ git clone https://github.com/qirolab/laravel-fortify-example.git
```

### Install Dependencies

```shell
$ composer install
```

### Configure Environment

```shell
# create copy of .env
$ cp .env.example .env

# create Laravel key
$ php artisan key:generate

# run migration
$ php artisan migrate
```

## Two-Factor Authentication with Two-Factor-Laravel

Two-Factor-Laravel is a package that implements two-factor authentication for your Laravel apps.

### Installation

```shell
composer require emargareten/two-factor-laravel
```

### Publish Configuration and Migration Files

```shell
php artisan vendor:publish --provider="Emargareten\TwoFactor\ServiceProvider"
```

### Run Migrations

```shell
php artisan migrate
```

### Configuration

After publishing the assets, you may review the `config/two-factor.php` configuration file.

### Usage

To start using two-factor authentication, add the `TwoFactorAuthenticatable` trait to your User model.

```php
use Emargareten\TwoFactor\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use TwoFactorAuthenticatable;
}
```

#### Enabling Two-Factor Authentication

This package provides the logic for enabling two-factor authentication. Call the `enableTwoFactorAuthentication` method on the user model to generate a secret key and recovery codes for the user.

```php
// Example controller method to enable two-factor authentication
public function store(Request $request): RedirectResponse
{
    $user = $request->user();

    if ($user->hasEnabledTwoFactorAuthentication()) {
        return back()->with('status', 'Two-factor authentication is already enabled');
    }

    $user->enableTwoFactorAuthentication();

    return redirect()->route('account.two-factor-authentication.confirm.show');
}
```

[... continue with other sections like confirming, disabling, user authentication, recovery codes, testing, etc.]

## Testing

```shell
composer test
```

## Changelog

Please see CHANGELOG for more information on what has changed recently.

## Credits

- [emargareten](https://github.com/emargareten)
- [All Contributors](https://github.com/qirolab/laravel-fortify-example/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
```
