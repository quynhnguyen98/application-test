<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StoreTable;
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

$factory->define(StoreTable::class, function (Faker $faker) {
    static $mainUser;
    if (!$mainUser) {
        $mainUser = \App\Models\UserTable::pluck('id')->toArray();
    }
    return [
        'user_id' => $faker->randomElement($mainUser),
        'store_name' => $faker->unique()->company
    ];
});
