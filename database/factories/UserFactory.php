<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserTable;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(UserTable::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'user_name' => $faker->unique()->safeEmail,
        'password' => \Illuminate\Support\Facades\Hash::make('123456'),
    ];
});
