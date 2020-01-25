<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['id' => 1, 'name' => '山田太郎', 'email' => 'aaa@aaa', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 2, 'name' => '田中', 'email' => 'bbb@bbb', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 3, 'name' => '五反田さん', 'email' => 'ccc@ccc', 'password' => bcrypt('password'), 'age' => 24, 'addr' => '府中市八幡町']);
        DB::table('users')->insert(['id' => 4, 'name' => '山田太郎', 'email' => 'ddd@ddd', 'password' => bcrypt('password'), 'age' => 68, 'addr' => '府中市八幡町']);
        DB::table('users')->insert(['id' => 5, 'name' => '山田太郎', 'email' => 'eee@eee', 'password' => bcrypt('password'), 'age' => 37, 'addr' => '府中市八幡町']);
        DB::table('users')->insert(['id' => 6, 'name' => '田中', 'email' => 'fff@fff', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 7, 'name' => '田中', 'email' => 'ggg@ggg', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 8, 'name' => '田中', 'email' => 'hhh@hhh', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 9, 'name' => '田中', 'email' => 'iii@iii', 'password' => bcrypt('password'),]);
        DB::table('users')->insert(['id' => 10, 'name' => '田中', 'email' => 'jjj@jjj', 'password' => bcrypt('password'),]);
    }
}
