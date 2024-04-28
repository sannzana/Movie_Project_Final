<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert two user records into the users table
        DB::table('users')->insert([
            [
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'name' => 'John Doe',
                'age' => 30,
                'image' => 'path/to/john_image.jpg', // Assuming you have a default image path
                'role' => 'user',
                'balance' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'janedoe',
                'password' => Hash::make('password123'),
                'name' => 'Jane Doe',
                'age' => 25,
                'image' => 'path/to/jane_image.jpg', // Assuming you have a default image path
                'role' => 'ADMIN', // Assuming you want to create an admin user
                'balance' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}