<?php

namespace Faker\Provider;

class FakeBarcode extends \Faker\Provider\Base
{

    /**
     * Get a gtin14 barcode
     *
     * @return string
     */
    public static function gtin14(): string
    {
        return '12345678900630';
    }

    /**
     * Get an SSCC barcode
     *
     * @return string
     */
    public static function sscc(): string
    {
        return '123456789006345346';
    }
}
