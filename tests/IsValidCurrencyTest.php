<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\MoneyValidation\Tests;

use Money\Currency;
use Money\Currencies\ISOCurrencies;
use Money\Currencies;
use BrokeYourBike\MoneyValidation\IsValidCurrency;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class IsValidCurrencyTest extends \Orchestra\Testbench\TestCase
{
    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * @var Currencies
     */
    protected $currencies;

    public function setUp(): void
    {
        parent::setUp();

        /** @var \Illuminate\Validation\Factory */
        $this->validator = $this->app['validator'];

        $this->app->singleton(Currencies::class, function () {
            return new ISOCurrencies();
        });

        /** @var Currencies */
        $this->currencies = $this->app->make(Currencies::class);
    }

    /** @test */
    public function it_will_pass_if_currency_is_valid()
    {
        $currency = new Currency('USD');
        $this->assertTrue($this->currencies->contains($currency));

        $isValid = $this->validator->make(
            ['currency_code' => 'USD'],
            ['currency_code' => new IsValidCurrency()]
        )->passes();

        $this->assertTrue($isValid);
    }

    /** @test */
    public function it_will_not_pass_if_currency_is_invalid()
    {
        $currency = new Currency('NOT-EXISTENT-CURRENCY');
        $this->assertFalse($this->currencies->contains($currency));

        $isValid = $this->validator->make(
            ['currency_code' => 'NOT-EXISTENT-CURRENCY'],
            ['currency_code' => new IsValidCurrency()]
        )->passes();

        $this->assertFalse($isValid);
    }
}
