<?php

use App\Model\Comment;
use App\Model\Status;
use App\Model\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Vytvoření seedu pro STATUS tasku
        Status::create(['name'=>'success']);
        Status::create(['name'=>'created']);

        /**
         * vytvoreni zaznamu deseti tasku s nahodnym poctem komentaru
         *  celkovy pocet komentaru je roven 30
         *  Vysledek je - task ma 0 - 30 commentaru
         */
        factory(Task::class, 10)->create();
        factory(Comment::class, 30)->create();

    }
}
