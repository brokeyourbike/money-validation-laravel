# money-validation-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/money-validation-laravel)](https://github.com/brokeyourbike/money-validation-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/money-validation-laravel/downloads)](https://packagist.org/packages/brokeyourbike/money-validation-laravel)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/money-validation-laravel/blob/main/LICENSE)

[![ci](https://github.com/brokeyourbike/money-validation-laravel/actions/workflows/ci.yml/badge.svg)](https://github.com/brokeyourbike/money-validation-laravel/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/brokeyourbike/money-validation-laravel/branch/main/graph/badge.svg?token=ImcgnxzGfc)](https://codecov.io/gh/brokeyourbike/money-validation-laravel)
[![Type Coverage](https://shepherd.dev/github/brokeyourbike/money-validation-laravel/coverage.svg)](https://shepherd.dev/github/brokeyourbike/money-validation-laravel)

Validation rules for Money and Currency

## Installation

```bash
composer require brokeyourbike/money-validation-laravel
```

## Usage

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

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/money-validation-laravel/blob/main/LICENSE)
