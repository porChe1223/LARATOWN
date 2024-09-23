<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => '李方信',
            'email' => 'houshinri@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '李林峰',
            'email' => 'linfengli@yahoo.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '杜方',
            'email' => 'dufang@hotmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
