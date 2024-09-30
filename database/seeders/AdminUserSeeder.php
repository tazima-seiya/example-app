<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('role', 10)->exists())
        {
            return;
        }
        //
        User::createOrFirst(
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'tazima@chubu-fukushi.org',
                'role' => 10,
                'password' => Hash::make('admin000'),
            ]
        );
    }
}
