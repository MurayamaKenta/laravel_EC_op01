<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['id' => 1, 'name' => 'ブランド1']);
        DB::table('categories')->insert(['id' => 2, 'name' => 'ブランド2']);
        DB::table('categories')->insert(['id' => 3, 'name' => 'ブランド3']);
        DB::table('categories')->insert(['id' => 4, 'name' => 'ブランド4']);
        DB::table('categories')->insert(['id' => 5, 'name' => 'ブランド5']);
    }
}
