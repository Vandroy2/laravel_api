<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Desk;
use App\Models\ListD;
use App\Models\Task;
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
        Desk::factory(3)->create();
        ListD::factory(3)->create();
        Card::factory(12)->create();
        Task::factory(28)->create();
        $this->call(UserSeeder::class);
    }
}
