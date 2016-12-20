<?php

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Band::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
        'start_date' => $faker->date,
        'website' => $faker->url,
        'still_active' => $faker->boolean
    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    $recordedDate = $faker->date;
    $releaseDate = date('Y-m-d', strtotime($recordedDate . ' + '. $faker->numberBetween(14, 365) . ' days'));
    return [
        'name' => $faker->userName,
        'recorded_date' => $recordedDate,
        'release_date' => $releaseDate,
        'number_of_tracks' => $faker->numberBetween(1,16),
        'label' => $faker->userName,
        'producer' => $faker->userName,
        'genre' => $faker->userName,
    ];
});
