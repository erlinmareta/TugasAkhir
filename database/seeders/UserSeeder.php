<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
            'remember_token' => Str::random(60),
        ]);




    }
}
