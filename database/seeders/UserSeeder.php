<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
 
 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'kiennguyen',
            'status' => 1,
            'isAdmin' => 1,
            'email' => 'kiennguyen1320@gmail.com',
            'password' => Hash::make('password')// password
        ]);
        // $users = User::factory()->count(1)->create();
    }
}
