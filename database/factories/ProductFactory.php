<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text($maxNbChars = 15),
        'type' => $faker->randomElement($array = array ('goods')),
        'hsn' => $faker->randomNumber($nbDigits = 8, $strict = false),
        'sku' => $faker->regexify('[a-z]{3}-[a-z]{2}-\d{2}'),
        'taxrate' => $faker->randomElement($array = array ('0','0.1', '0.25', '3', '5', '12', '18', '28')),
        'cessValue' => $faker->lexify('0'),
        'saleValue' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000),
        'unit' => $faker->lexify('NOS'),
        'discountRate' => $faker->lexify('0'),
    ];
});
