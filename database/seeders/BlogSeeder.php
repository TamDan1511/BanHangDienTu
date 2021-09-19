<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            DB::table('blogs')->insert([
                'title' => 'Hello',
                'status' => 1,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare metus sed odio scelerisque lobortis. Donec a enim id ante sollicitudin tempor. Phasellus laoreet tellus vel arcu tristique, semper feugiat urna consectetur.',
                'picture' => 'https://a0.muscache.com/im/pictures/57b9f708-bb12-498c-bc33-769f8fc43e63.jpg?im_w=2560',
                'user_id' => 1
            ]);
        }
    }
}
