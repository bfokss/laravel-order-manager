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
    }
}
