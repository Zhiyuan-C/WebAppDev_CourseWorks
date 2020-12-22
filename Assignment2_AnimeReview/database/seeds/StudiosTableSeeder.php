<?php

use Illuminate\Database\Seeder;

class StudiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('studios')->insert([
            'name' => "Toei Animation"
        ]);
        DB::table('studios')->insert([
            'name' => "	MAPPA"
        ]);
        DB::table('studios')->insert([
            'name' => "TMS Entertainment"
        ]);
        DB::table('studios')->insert([
            'name' => "NAS"
        ]);
        DB::table('studios')->insert([
            'name' => "Production I.G"
        ]);
        
    }
}
