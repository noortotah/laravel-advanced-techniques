<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    $user_ids = DB::table('users')->pluck('id')->all();

    return [
      'title' => $faker->sentence,
      'user_id' => $faker->randomElement($user_ids),
      'content' => $faker->paragraphs(rand(3, 10), true),
      'published' => $faker->boolean,
    ];
});