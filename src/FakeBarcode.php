<?php

namespace Faker\Provider;

class FakeBarcode extends \Faker\Provider\Base
{

    /**
     * Get a gtin14 barcode
     *
     * @return string
     */
    public static function gtin14($ext = 0, $prefix = "1234567"): string
    {
        $number = $ext . $prefix;

        $len = 13 - strlen($number);

        $number .= self::serial($len);

        $barcode = $number . self::checkDigit($number);

        return $barcode;
    }

    /**
     * Get an SSCC barcode
     *
     * @return string
     */
    public static function sscc($ext = "1", $prefix = "1234567"): string
    {
        $len = 17 - strlen($ext . $prefix);

        $barcode = $ext . $prefix . self::serial($len);

        return  $barcode . self::checkDigit($barcode);
    }

    public static function serial($len)
    {
        return self::randomNumber($len, true);
    }

    public static function checkDigit($number): string
    {
        $sum = 0;
        $index = 0;
        $cd = 0;
        for ($i = strlen($number); $i > 0; $i--) {
            $digit = substr($number, $i - 1, 1);
            $index++;

            $ret = $index % 2;
            if ($ret == 0) {
                $sum += $digit * 1;
            } else {
                $sum += $digit * 3;
            }
        }
        $mod_sum = $sum % 10;
        // if it exactly divide the checksum is 0
        if ($mod_sum == 0) {
            $cd = 0;
        } else {
            // go to the next multiple of 10 above and subtract
            $cd = 10 - $mod_sum + $sum - $sum;
        }

        return $cd;
    }
}
