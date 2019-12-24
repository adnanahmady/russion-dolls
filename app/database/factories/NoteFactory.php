<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'card_id' => factory('App\Card')->create()->id,
        'body' => $faker->paragraph
    ];
});
