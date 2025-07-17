<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'name' => '山田太郎',
            'email' => 'taro@sample.com',
            'password' => 'password1',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '田中次郎',
            'email' => 'jiro@sample.com',
            'password' => 'password2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '佐々木三郎',
            'email' => 'saburo@sample.com',
            'password' => 'password3',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鈴木四郎',
            'email' => 'shiro@sample.com',
            'password' => 'password4',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '稲垣五郎',
            'email' => 'goro@sample.com',
            'password' => 'password5',
        ];
        DB::table('users')->insert($param);
    }
}
