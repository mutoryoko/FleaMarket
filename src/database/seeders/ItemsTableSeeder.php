<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'user_id' => '1',
            'name' => '腕時計',
            'image' => 'item-images/Clock.jpg',
            'condition' => '1',
            'price' => '15000',
            'brand' => 'Rolax',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'name' => 'HDD',
            'image' => 'item-images/HDD.jpg',
            'condition' => '2',
            'price' => '5000',
            'brand' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'name' => '玉ねぎ3束',
            'image' => 'item-images/onion.jpg',
            'condition' => '3',
            'price' => '300',
            'brand' => 'なし',
            'description' => '新鮮な玉ねぎ3束のセット',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '4',
            'name' => '革靴',
            'image' => 'item-images/LeatherShoes.jpg',
            'condition' => '4',
            'price' => '4000',
            'description' => 'クラシックなデザインの革靴',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '5',
            'name' => 'ノートPC',
            'image' => 'item-images/Laptop.jpg',
            'condition' => '1',
            'price' => '45000',
            'description' => '高性能なノートパソコン',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'name' => 'マイク',
            'image' => 'item-images/Mic.jpg',
            'condition' => '2',
            'price' => '8000',
            'brand' => 'なし',
            'description' => '高音質のレコーディング用マイク',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'name' => 'ショルダーバッグ',
            'image' => 'item-images/bag.jpg',
            'condition' => '3',
            'price' => '3500',
            'description' => 'おしゃれなショルダーバッグ',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'name' => 'タンブラー',
            'image' => 'item-images/Tumbler.jpg',
            'condition' => '4',
            'price' => '500',
            'brand' => 'なし',
            'description' => '使いやすいタンブラー',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '4',
            'name' => 'コーヒーミル',
            'image' => 'item-images/Coffee.jpg',
            'condition' => '1',
            'price' => '4000',
            'brand' => 'Starbacks',
            'description' => '手動のコーヒーミル',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '5',
            'name' => 'メイクセット',
            'image' => 'item-images/makeup.jpg',
            'condition' => '2',
            'price' => '2500',
            'description' => '便利なメイクアップセット',
        ];
        DB::table('items')->insert($param);
    }
}
