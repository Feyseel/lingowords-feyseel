<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    $word = $faker->lexify('??????');

    return [
        'word' => $word,
	    'length' => strlen($word),
    ];
});
