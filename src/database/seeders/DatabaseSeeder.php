<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ProfilesTableSeeder::class,
            ItemsTableSeeder::class,
            CategoriesTableSeeder::class,
            CategoriesItemsTableSeeder::class,
        ]);
    }
}
