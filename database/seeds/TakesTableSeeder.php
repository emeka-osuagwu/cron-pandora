<?php

use Illuminate\Database\Seeder;

class TakesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Task::class, 100)->create();
    }
}
