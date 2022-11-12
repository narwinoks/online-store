<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \APP\Models\Category::factory(6)->create();
        // \APP\Models\Product::factory(22)->create();
        Category::factory(6)->create();
        Product::factory(22)->create();
        User::create([
            'name' => 'winarno',
            'email' => 'winarno@gmail.com',
            'password' => bcrypt('password'),
            'utype' =>'ADM'
        ]);
    }
}
