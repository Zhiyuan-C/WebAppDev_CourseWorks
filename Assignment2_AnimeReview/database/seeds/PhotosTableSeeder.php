<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/One_Piece_Anime_Logo.png",
            'anime_id' => 1,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/b0a417a26890b21929e6c1fafcd792ad.png",
            'anime_id' => 1,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/d4cfc9735425355f3fcfcc745dd4712e.png",
            'anime_id' => 1,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/natsume.jpg",
            'anime_id' => 2,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/yurionice.jpg",
            'anime_id' => 3,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/wtr_main.jpg",
            'anime_id' => 4,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/conanZero_ogimage.jpg",
            'anime_id' => 5,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/Kekkai_Sensen.jpg",
            'anime_id' => 6,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3973.png",
            'anime_id' => 6,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3982.png",
            'anime_id' => 6,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3983.png",
            'anime_id' => 6,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3984.png",
            'anime_id' => 6,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3988.png",
            'anime_id' => 6,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3989.png",
            'anime_id' => 6,
            'user_id' => 3
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3972.png",
            'anime_id' => 7,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3950.png",
            'anime_id' => 7,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3948.png",
            'anime_id' => 7,
            'user_id' => 7
        ]);
        DB::table('photos')->insert([
            'photo_path' => "defaultImg/IMG_3937.png",
            'anime_id' => 7,
            'user_id' => 7
        ]);
    }
}
