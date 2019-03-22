<?php

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'team_id' => function (array $ticket) {
            return DB::table('teams')
                ->inRandomOrder()
                ->first()
                ->id;
        },
    ];
});
