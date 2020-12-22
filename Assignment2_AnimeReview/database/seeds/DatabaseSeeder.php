<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudiosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(AnimesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(FollowUserTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(DislikesTableSeeder::class);
    }
}
