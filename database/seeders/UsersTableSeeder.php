<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'username' => 'Fariha',
            'password' => Hash::make('fariha2007'), 
            'name' => 'Fariha Sanzana',
            'age' => 22,
            'image' => 'public/images/far.jpg', 
            'role' => 'ADMIN',
            'balance' => 0,
            'email' => 'far@gmail.com',
            'phone_number' => '01557788991',
        ]);

        User::create([
            'username' => 'arpita',
            'password' => Hash::make('arpita2007'), // Hash the password
            'name' => 'Arpita Saha',
            'age' => 25,
            'image' => 'public/images/ar.jpg', // Assuming a default profile image
            'role' => 'ADMIN',
            'balance' => 100,
            'email' => 'ar@gmail.com',
            'phone_number' => '01552233776',
        ]);

        // Add more users as needed
    }
}