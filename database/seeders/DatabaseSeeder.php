<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'main',
            'email'=>'main@gmail.com',
            'phone'=>'0945123654',
            'address'=>'YGN',
            'role'=>'admin',
            'password'=>Hash::make('main1234'),
        ]);
    }
}
