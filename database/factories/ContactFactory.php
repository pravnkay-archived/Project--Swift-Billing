<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'gstin' => $faker->regexify('\d{2}[a-zA-Z]{5}\d{4}[a-zA-Z]{1}[0-9]{1}[zZ][0-9]{1}'),
        'country' => $faker->randomElement($array = array ('India')),
        'state' => $faker->randomElement($array = array ('Tamil Nadu','Kerala','Maharashtra')),
        'person' => $faker->name,
        'mobile' => $faker->regexify('\+91 [0-9]{10}'),
        'pan' => $faker->regexify('[a-zA-Z]{5}\d{4}[a-zA-Z]{1}'),
        'address' => $faker->streetAddress,
        'pincode' => $faker->regexify('\d{6}'),
        'city' => $faker->randomElement($array = array ('Chennai','Trivandrum','Mumbai')),
        'email' => $faker->unique()->safeEmail,
    ];
});
