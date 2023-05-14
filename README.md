# money-validation-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/money-validation-laravel)](https://github.com/brokeyourbike/money-validation-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/money-validation-laravel/downloads)](https://packagist.org/packages/brokeyourbike/money-validation-laravel)
[![Maintainability](https://api.codeclimate.com/v1/badges/a81b62866be29368ac32/maintainability)](https://codeclimate.com/github/brokeyourbike/money-validation-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a81b62866be29368ac32/test_coverage)](https://codeclimate.com/github/brokeyourbike/money-validation-laravel/test_coverage)

Validation rules for Money and Currency

## Installation

```bash
composer require brokeyourbike/money-validation-laravel
```

## Usage

Package uses service container for currencies resolution. You can set it in your `AppServiceProvider`

```php
use Money\Currencies\ISOCurrencies;
use Money\Currencies;

public function register()
{
    $this->app->singleton(Currencies::class, function () {
        return new ISOCurrencies();
    });
}
```

```php
use Illuminate\Foundation\Http\FormRequest;
use BrokeYourBike\MoneyValidation\IsValidCurrency;

class ExampleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'currency_code' => [
                'required',
                'string',
                'size:3',
                new IsValidCurrency(),
            ],
        ];
    }
}
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/money-validation-laravel/blob/main/LICENSE)
