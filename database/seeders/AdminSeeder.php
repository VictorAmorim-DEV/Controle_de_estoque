<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (\App\Models\User::where('is_admin', true)->count() === 0) {
            \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@sistema.com',
                'password' => Hash::make('senha_admin'), 
                'is_admin' => true,
            ]);
        }
    }
}
