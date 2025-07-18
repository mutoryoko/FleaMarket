<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '山田太郎',
                'email' => 'taro@example.com',
                'password' => 'password1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '田中次郎',
                'email' => 'jiro@test.com',
                'password' => 'password2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '佐々木三郎',
                'email' => 'saburo@laravel.co.jp',
                'password' => 'password3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '鈴木四郎',
                'email' => 'shiro@sample.com',
                'password' => 'password4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '稲垣五郎',
                'email' => 'goro@laravel.com',
                'password' => 'password5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
