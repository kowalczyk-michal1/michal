<?php

use Illuminate\Database\Seeder;
use App\Todo;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i<=5; $i++) {
            $task = new Todo();
            $task->title = $faker->text(20);
            $task->description = $faker->text(200);
            $task->completed = 0;
            $task->completed_date = "2000-01-01 00:00:00";
            $task->save();
        }
    }
}
