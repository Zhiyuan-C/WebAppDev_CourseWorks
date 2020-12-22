<?php

use Illuminate\Database\Seeder;

class DislikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('dislikes')->insert([
            'user_id' => 3,
            'review_id' => 2
        ]);
        DB::table('dislikes')->insert([
            'user_id' => 4,
            'review_id' => 4
        ]);
        DB::table('dislikes')->insert([
            'user_id' => 2,
            'review_id' => 5
        ]);
        DB::table('dislikes')->insert([
            'user_id' => 1,
            'review_id' => 5
        ]);
        DB::table('dislikes')->insert([
            'user_id' => 6,
            'review_id' => 5
        ]);
        
    }
}
