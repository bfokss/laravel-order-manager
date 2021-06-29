<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Stand_1',
            'price' => 101,
            'description' => 'Test description 1'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_2',
            'price' => 102,
            'description' => 'Test description 2'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_3',
            'price' => 103,
            'description' => 'Test description 3'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_4',
            'price' => 104,
            'description' => 'Test description 4'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_5',
            'price' => 105,
            'description' => 'Test description 5'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_6',
            'price' => 106,
            'description' => 'Test description 6'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_7',
            'price' => 107,
            'description' => 'Test description 7'
        ]);

        DB::table('products')->insert([
            'name' => 'Stand_8',
            'price' => 108,
            'description' => 'Test description 8'
        ]);
    }
}
