<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mine')->truncate();

        $mine = [
            [
                'name' => 'yuki',
                'age' => '27',
            ],
        ];
        DB::table('mine')->insert($mine);
    }
}
