<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'username' => 'Count_Ballsackula',
            'email' => 'Count_Ballsackula@yikyak.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'username' => 'TheManInTheWhiteSuit',
            'email' => 'TheManInTheWhiteSuit@yikyak.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'username' => 'radiotower',
            'email' => 'radiotower@yikyak.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'username' => 'brocollibreath',
            'email' => 'brocollibreath@yikyak.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'username' => 'Horsegirl2',
            'email' => 'Horsegirl2@yikyak.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'username' => 'ladiesman217',
            'email' => 'ladiesman217@yikyak.com',
            'password' => Hash::make('password'),
        ]);
    }
}
