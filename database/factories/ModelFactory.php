<?php
use App\Label;
use App\Review;
use App\Product;
use App\Seller;
use App\Address;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Product::class, function (Faker\Generator $faker) {

  return [
    'name' => $faker->word,
    'price' => $faker->randomFloat(2, 1, 1000),
    'description' => $faker->text()
  ];
});

$factory->define(\App\Seller::class, function (Faker\Generator $faker) {

  return [
    'name' => $faker->word,
    'lastname' => $faker->word
  ];
});

$factory->define(\App\Review::class, function (Faker\Generator $faker) {

  return [
    'name_of_critic' => $faker->word,
    'title' => $faker->word,
    'content' => $faker->text(),
    'date' => $faker->date($format = 'y-m-d')

  ];
});

$factory->define(\App\Label::class, function (Faker\Generator $faker) {
     return [
        'name' => $faker->word
    ];
});

$factory->define(\App\Address::class, function (Faker\Generator $faker) {
     return [
        'address' => $faker->text(),
        'city' => $faker->word,
        'region' => $faker->word,
        'country' => $faker->word,
        'postalcode' => $faker->word
    ];
});
