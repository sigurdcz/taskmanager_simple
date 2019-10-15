<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Comment;
use App\Model\Task;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $task = Task::orderByRaw('RAND()')->first();
    return [
        'task_id' => $task->id,
        'content' => $faker->paragraph(3),
    ];
});
