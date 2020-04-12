<?php

/** @var Factory $factory */

use App\Models\Project;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::now()->addYear(),
        'user_id' => null,
    ];
});
