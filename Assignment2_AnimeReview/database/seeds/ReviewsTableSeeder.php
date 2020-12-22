<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->insert([
            'rating' => 5,
            'message' => "Etiam purus velit, molestie vel efficitur sit amet, dapibus ut lorem. Mauris lacinia neque nec velit laoreet, sit amet pharetra nisi mattis. Aliquam ut euismod ipsum. In facilisis dui vel finibus mollis. Morbi elit mi, sagittis quis sollicitudin in, vulputate.",
            'anime_id' => 1,
            'user_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'message' => "Nulla rutrum eu mi sed accumsan. Nullam neque lorem, tristique vitae odio a, malesuada interdum augue. Proin tempor scelerisque justo in ultrices. Vivamus leo nisi, gravida quis nibh porttitor, sodales pretium eros. Nulla facilisi. Suspendisse nisi diam, euismod eget porttitor vitae, posuere ac orci. Cras viverra tempus neque, ac blandit ligula.",
            'anime_id' => 1,
            'user_id' => 2,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'message' => "Cras eget eros et felis rhoncus consectetur id eget dui. Praesent aliquet hendrerit mauris laoreet sodales. Mauris consequat, metus eget varius bibendum, lectus risus sodales eros, ut egestas mauris mi ac arcu. Vivamus in libero metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ut ultricies nisi. Quisque sed lorem mollis, sollicitudin sapien vitae, luctus diam. Praesent dictum sodales lacus ac tempor.",
            'anime_id' => 1,
            'user_id' => 3,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'message' => "Cras eget eros et felis rhoncus consectetur id eget dui. Praesent aliquet hendrerit mauris laoreet sodales. Mauris consequat, metus eget varius bibendum, lectus risus sodales eros, ut egestas mauris mi ac arcu. Vivamus in libero metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ut ultricies nisi. Quisque sed lorem mollis, sollicitudin sapien vitae, luctus diam. Praesent dictum sodales lacus ac tempor.",
            'anime_id' => 1,
            'user_id' => 4,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 2,
            'message' => "Cras eget eros et felis rhoncus consectetur id eget dui. Praesent aliquet hendrerit mauris laoreet sodales. Mauris consequat, metus eget varius bibendum, lectus risus sodales eros, ut egestas mauris mi ac arcu. Vivamus in libero metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ut ultricies nisi. Quisque sed lorem mollis, sollicitudin sapien vitae, luctus diam. Praesent dictum sodales lacus ac tempor.",
            'anime_id' => 1,
            'user_id' => 5,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'message' => "Integer sit amet velit vehicula, facilisis sapien eget, tristique nunc. Curabitur accumsan aliquet risus nec pretium. Mauris sit amet erat at lorem molestie porta ut feugiat velit. Cras semper augue vel mi ultrices, sit amet elementum mauris interdum. Proin at lacinia dolor. Donec pharetra congue est, non sagittis libero auctor et. Donec eu tempus leo. Aliquam quis lacus quis dui porttitor elementum quis sed diam.",
            'anime_id' => 1,
            'user_id' => 6,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'message' => "Integer sit amet velit vehicula, facilisis sapien eget, tristique nunc. Curabitur accumsan aliquet risus nec pretium. Mauris sit amet erat at lorem molestie porta ut feugiat velit. Cras semper augue vel mi ultrices, sit amet elementum mauris interdum. Proin at lacinia dolor. Donec pharetra congue est, non sagittis libero auctor et. Donec eu tempus leo. Aliquam quis lacus quis dui porttitor elementum quis sed diam.",
            'anime_id' => 1,
            'user_id' => 7,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'message' => "Curabitur auctor, nisl in interdum feugiat, justo augue dignissim nulla, et fringilla odio risus non felis. Curabitur egestas interdum sagittis. Duis ac aliquet dui. Quisque consequat risus quis nisl eleifend, sit amet imperdiet sapien congue. Phasellus ut nisi a urna bibendum aliquam sit amet non libero. Proin commodo dui ut velit fermentum porttitor. Morbi placerat quis massa ac scelerisque. Maecenas tristique massa et fringilla egestas.",
            'anime_id' => 2,
            'user_id' => 3,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'message' => "Quisque quis tincidunt felis, vel lobortis odio. Fusce feugiat, mi eu varius laoreet, urna quam tempus nisi, sed sagittis urna enim sed mi. Pellentesque eu velit in diam consequat tristique. Maecenas varius porta metus in lacinia. In aliquet sem nibh, et faucibus ipsum congue nec. Curabitur dictum eget enim nec cursus. Fusce et eros vitae velit tincidunt luctus vitae sit amet augue. Sed dictum aliquam mollis.",
            'anime_id' => 2,
            'user_id' => 4,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 3,
            'message' => "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam blandit lacus massa, nec gravida odio feugiat sed. Etiam ut libero ultrices, aliquet mi eget, consequat dolor. Suspendisse vitae elit risus. Morbi laoreet eleifend euismod. Morbi dapibus lorem eu velit blandit, eget elementum leo mattis. Sed nec dui consequat, aliquet dolor ac, consequat felis. Aliquam sodales vestibulum elit, nec porta massa lacinia eu.",
            'anime_id' => 4,
            'user_id' => 7,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'message' => "Fusce nec laoreet eros, vitae sagittis tortor. Vivamus eu placerat felis. Donec fringilla turpis sed mauris suscipit, at facilisis mauris mollis. Aliquam fringilla laoreet ex a cursus. Curabitur imperdiet eros sed lacus malesuada dapibus. Quisque congue justo interdum laoreet venenatis. Curabitur enim nibh, cursus non ante eget, imperdiet convallis neque. Vivamus maximus id lectus sit amet ultricies.",
            'anime_id' => 4,
            'user_id' => 5,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);
    }
}