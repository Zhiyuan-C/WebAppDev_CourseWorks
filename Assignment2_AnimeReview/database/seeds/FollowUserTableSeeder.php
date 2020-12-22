<?php

use Illuminate\Database\Seeder;

class FollowUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_user')->insert([
            'user_id' => 1,
            'following_id' => 2
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 1,
            'following_id' => 3
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 1,
            'following_id' => 4
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 1,
            'following_id' => 5
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 4,
            'following_id' => 5
        ]);
        
        DB::table('follow_user')->insert([
            'user_id' => 3,
            'following_id' => 7
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 3,
            'following_id' => 2
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 3,
            'following_id' => 1
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 5,
            'following_id' => 3
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 4,
            'following_id' => 3
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 4,
            'following_id' => 7
        ]);
        DB::table('follow_user')->insert([
            'user_id' => 7,
            'following_id' => 3
        ]);
        
    }
}
