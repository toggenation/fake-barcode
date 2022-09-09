<?php

namespace Faker\Tests\Provider;

use Faker\Factory;
use Faker\Generator;
use Faker\Provider\FakeBarcode;
use PHPUnit\Framework\TestCase;

class FakeBarcodeTest extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    public function setUp(): void
    {
        $faker = Factory::create();
        $faker->addProvider(new FakeBarcode($faker));
        $this->faker = $faker;
    }

    public function testSscc()
    {

        $ext = 9;
        $prefix = '111111';
        $sscc = $this->faker->sscc(9, '1111111');
        /**
         * @var \PHPUnit\Framework\TestCase $this
         */
        $this->assertStringStartsWith($ext, $sscc);
        $this->assertStringStartsWith($ext . $prefix, $sscc);
        $this->assertTrue(strlen($sscc) === 18);
    }

    public function testGtin()
    {

        $ext = 3;
        $prefix = '1234567';
        $gtin = $this->faker->gtin14($ext, $prefix);
        /**
         * @var \PHPUnit\Framework\TestCase $this
         */
        $this->assertStringStartsWith($ext, $gtin);
        $this->assertStringStartsWith($ext . $prefix, $gtin);
        $this->assertTrue(strlen($gtin) === 14);
    }
}
