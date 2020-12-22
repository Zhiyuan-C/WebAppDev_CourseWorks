<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            'user_id' => 1,
            'review_id' => 2
        ]);
        DB::table('likes')->insert([
            'user_id' => 2,
            'review_id' => 4
        ]);
        DB::table('likes')->insert([
            'user_id' => 1,
            'review_id' => 4
        ]);
        DB::table('likes')->insert([
            'user_id' => 1,
            'review_id' => 7
        ]);
        DB::table('likes')->insert([
            'user_id' => 3,
            'review_id' => 7
        ]);
        DB::table('likes')->insert([
            'user_id' => 3,
            'review_id' => 4
        ]);
        
    }
}
