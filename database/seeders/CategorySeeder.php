<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'root',
            'status' => 1,
            'user_id' => 38,
            'parent_id' => 0,
            'level' => 0,
            'left' => 0,
            'right' => 1
        ]);
    }
}
