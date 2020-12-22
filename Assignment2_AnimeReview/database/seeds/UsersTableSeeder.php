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
        DB::table('users')->insert([
            'nick_name' => "Barber",
            'email' => "barber@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1986-02-05',
            'type_id' => 1
        ]);
        DB::table('users')->insert([
            'nick_name' => "Bambam",
            'email' => "bambam@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1997-12-05',
            'type_id' => 1
        ]);
        DB::table('users')->insert([
            'nick_name' => "Sandy",
            'email' => "sandy@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1987-06-27',
            'type_id' => 2
        ]);
        DB::table('users')->insert([
            'nick_name' => "Gibby",
            'email' => "gibby@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1999-02-12',
            'type_id' => 1
        ]);
        DB::table('users')->insert([
            'nick_name' => "Cyclone",
            'email' => "cyclone@email.com",
            'password' => bcrypt('123456'),
            'dob' => '2002-05-17',
            'type_id' => 1
        ]);
        DB::table('users')->insert([
            'nick_name' => "Poncho",
            'email' => "poncho@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1970-08-01',
            'type_id' => 1
        ]);
        DB::table('users')->insert([
            'nick_name' => "Oracle",
            'email' => "oracle@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1981-05-11',
            'type_id' => 2
        ]);
        DB::table('users')->insert([
            'nick_name' => "Dice",
            'email' => "dice@email.com",
            'password' => bcrypt('123456'),
            'dob' => '1978-08-22',
            'type_id' => 1
        ]);
    }
}

