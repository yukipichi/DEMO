<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StockTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(StockTableSeeder::class);
        $this->call(MineTableSeeder::class);
    }
}
