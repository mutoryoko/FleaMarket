<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'user_image' => 'profile-images/user1.png',
                'postcode' => '123-4567',
                'address' => '秋田県にかほ市象潟町後田388-2',
                'building' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'user_image' => 'profile-images/user2.png',
                'postcode' => '111-2233',
                'address' => '埼玉県熊谷市市ノ坪632-4',
                'building' => '草加ハイツ101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'user_image' => 'profile-images/user3.png',
                'postcode' => '223-4455',
                'address' => '埼玉県白岡市西3-360-14',
                'building' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'user_image' => 'profile-images/user4.png',
                'postcode' => '334-5566',
                'address' => '宮崎県宮崎市東大淀3-20-20',
                'building' => 'ABCハイツ201',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'user_image' => 'profile-images/user5.png',
                'postcode' => '445-6677',
                'address' => '埼玉県熊谷市市ノ坪632-4',
                'building' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
