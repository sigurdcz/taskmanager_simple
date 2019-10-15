<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Task;
use App\Model\Status;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $statuses = Status::orderByRaw('RAND()')->first();
    return [
        'name' => $faker->domainName,
        'description' => $faker->text(64),
        'status_id' => $statuses->id
    ];
});
