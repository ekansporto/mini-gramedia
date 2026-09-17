<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illumate\Support\Facades\Hash;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123')
            ]
        );
    }
}
