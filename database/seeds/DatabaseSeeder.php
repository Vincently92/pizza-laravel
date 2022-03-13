<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Half pizza',
            'description' => 'Assemble your 35 cm pizza with two different flavors',
            'image' => '1.jpeg',
            'price' => '{"usd":10.19, "eur": 9.19}'
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Chicken candy',
            'description' => 'Chicken pieces, bell peppers, cheddar and parmesan cheese mix, mozzarella, red onion, sweet chili sauce, alfredo sauce',
            'image' => '2.jpeg',
            'price' => '{"usd":12.89, "eur": 10.79}'
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Grilled vegetables',
            'description' => 'Grilled vegetables, tomatoes, red onion, mozzarella, pesto sauce, tomato sauce, garlic',
            'image' => '3.jpeg',
            'price' => '{"usd":9.99, "eur": 7.79}'
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Turkey in tangerines',
            'description' => 'Turkey pastrami, alfredo sauce, tangerines, citrus sauce, mozzarella, cheddar and parmesan cheese mix',
            'image' => '4.jpeg',
            'price' => '{"usd":11.99, "eur": 10.59}'
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Pepperoni fresh',
            'description' => 'Spicy pepperoni, extra mozzarella, tomatoes, tomato sauce',
            'image' => '5.jpeg',
            'price' => '{"usd":13.99, "eur": 11.79}'
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Double chick 👶',
            'description' => 'Chicken, mozzarella, alfredo sauce',
            'image' => '6.jpeg',
            'price' => '{"usd":12.99, "eur": 9.79}'
        ]);
    }
}
