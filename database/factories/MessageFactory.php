<?php

use App\Models\Users;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

/** @var EloquentFactory $factory */
$factory->define(\App\Models\Messages::class, function (Faker $faker) {
    return [
        'user_id' => Users::all()->random()->id,
        'content' => $faker->text, // secret
    ];
});