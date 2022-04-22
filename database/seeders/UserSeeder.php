<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    protected $model = User::class;

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),// password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'jhon',
            'email' => 'jhon@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),// password
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'stiven',
            'email' => 'stiven@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),// password
            'remember_token' => Str::random(10),
        ]);

    }
}
