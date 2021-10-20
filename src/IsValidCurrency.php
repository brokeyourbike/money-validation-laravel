<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\MoneyValidation;

use Money\Currency;
use Money\Currencies;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Validation\Rule;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class IsValidCurrency implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /** @var Currencies */
        $currencies = App::make(Currencies::class);

        $currency = new Currency($value);

        return $currencies->contains($currency);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Currency :attribute invalid.';
    }
}
