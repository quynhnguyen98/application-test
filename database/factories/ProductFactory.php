<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductTable;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ProductTable::class, function (Faker $faker) {
    static $mainStore;
    if (!$mainStore) {
        $mainStore = \App\Models\StoreTable::pluck('id')->toArray();
    }
    return [
        'store_id' => $faker->randomElement($mainStore),
        'product_name' => $faker->unique()->sentence(2)
    ];
});
