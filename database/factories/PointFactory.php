<?php

use App\Point;
use Faker\Generator as Faker;

$factory->define(Point::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(0, 16),
        'ticket_id' => function (array $point) {
            return DB::table('tickets')
                ->inRandomOrder()
                ->first()
                ->id;
        },
        'owner_id' => function (array $point) {
            return DB::table('users')
                ->inRandomOrder()
                ->first()
                ->id;
        },
    ];
});
