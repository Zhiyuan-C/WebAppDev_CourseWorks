<?php

use Illuminate\Database\Seeder;

class AnimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animes')->insert([
            'title' => "One Piece",
            'broadcast' => '1999-10-20',
            'description' => "One Piece (Japanese: ワンピース Hepburn: Wan Pīsu) is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueisha's Weekly Shōnen Jump magazine since July 22, 1997, and has been collected into 90 tankōbon volumes. The story follows the adventures of Monkey D. Luffy, a boy whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With his crew of pirates, named the Straw Hat Pirates, Luffy explores the Grand Line in search of the world's ultimate treasure known as 'One Piece' in order to become the next Pirate King. Description text from: One Piece - Wikipedia",
            'official_site' => "https://one-piece.com/",
            'official_site_name' => "ONE PIECE.com（ワンピース ドットコム）",
            'studio_id' => 1
        ]);
        DB::table('animes')->insert([
            'title' => "Natsume's Book of Friends",
            'broadcast' => '2008-07-07',
            'description' => "Natsume's Book of Friends (Japanese: 夏目友人帳 Hepburn: Natsume Yūjin-chō) is a Japanese manga series by Yuki Midorikawa. It began serialization by Hakusensha in the shōjo manga magazine LaLa DX in 2005, before switching to LaLa in 2008. The chapters have been collected in twenty-two bound volumes. The series is about Natsume, an orphaned teenage boy who can see spirits, who inherits from his grandmother the notebook she used to bind spirits under her control. Natsume's Book of Friends was a finalist for the first Manga Taishō award in 2008. Description text from: Natsume's Book of Friends - Wikipedia",
            'official_site' => "http://www.natsume-anime.jp/",
            'official_site_name' => "アニメ 夏目友人帳 公式サイト",
            'studio_id' => 4
        ]);
        DB::table('animes')->insert([
            'title' => "Yuri!!! on Ice",
            'broadcast' => '2016-10-06',
            'description' => "Yuri!!! on Ice (Japanese: ユーリ!!! on ICE) is a Japanese sports anime television series about figure skating. The series was produced by MAPPA, directed by Sayo Yamamoto and written by Mitsurō Kubo. Character design was by Tadashi Hiramatsu, and its music was composed by Taro Umebayashi and Taku Matsushiba. The figure skating was choreographed by Kenji Miyamoto, who also performed routines himself which were recorded and used as skating sound effects. The series premiered on October 6, 2016 and ended on December 22, with a total of 12 episodes. A Yuri on Ice feature film, Ice Adolescence, is planned for release in 2019. The series revolves around the relationships between Japanese figure skater Yuri Katsuki; his idol, Russian figure-skating champion Victor Nikiforov, and up-and-coming Russian skater Yuri Plisetsky; as Yuri K. and Yuri P. take part in the Figure Skating Grand Prix, with Victor acting as coach to Yuri K. Description text from: Yuri on Ice - Wikipedia",
            'official_site' => "https://yurionice.com/index2.php",
            'official_site_name' => "TVアニメ「ユーリ!!! on ICE」公式サイト",
            'studio_id' => 2
        ]);
        DB::table('animes')->insert([
            'title' => "World Trigger",
            'broadcast' => '2014-10-05',
            'description' => "World Trigger (Japanese: ワールドトリガー Hepburn: Wārudo Torigā), also known in short form as WorTri (Japanese: ワートリ Hepburn: Wātori), is a Japanese manga series written and illustrated by Daisuke Ashihara, and serialized in Weekly Shōnen Jump since February 2013. An anime adaptation of the series produced by Toei Animation started airing on October 5, 2014, with the series ending on April 3, 2016. Description text from: World Trigger - Wikipedia",
            'official_site' => "http://www.toei-anim.co.jp/tv/wt/",
            'official_site_name' => "ワールドトリガー 東映アニメーション",
            'studio_id' => 1
        ]);
        DB::table('animes')->insert([
            'title' => "Detective Conan: Zero The Enforcer",
            'broadcast' => '2018-04-13',
            'description' => "Detective Conan: Zero The Enforcer (名探偵コナン ゼロの執行人 Meitantei Conan: Zero no Shikkounin) is a 2018 Japanese animated crime thriller film directed by Kobun Shizuno and written by Takahiro Okura. It was the twenty-second installment of the Case Closed film series based on the manga series of the same name by Gosho Aoyama, following the 2017 film Detective Conan: Crimson Love Letter. The film was released on April 13, 2018. Description text from: Detective Conan: Zero The Enforcer - Wikipedia",
            'official_site' => "http://www.conan-movie.jp/",
            'official_site_name' => "劇場版『名探偵コナン ゼロの執行人』",
            'studio_id' => 3
        ]);
        DB::table('animes')->insert([
            'title' => "Blood Blockade Battlefront",
            'broadcast' => '2015-04-04',
            'description' => "Blood Blockade Battlefront (Japanese: 血界戦線 Hepburn: Kekkai Sensen, lit., 'Bloodline Battlefront') is a Japanese shōnen manga by Yasuhiro Nightow. It has been published bimonthly in the magazine Jump SQ19 from February to April 2009 and moved to Jump Square upon the former's ending. The plot revolves around a young photographer named Leonardo Watch, who obtains 'the All Seeing Eyes of the Gods' at the cost of his sister's eyesight. After the incident, Leonardo moves to the city of Hellsalem's Lot to join an organization known as Libra to fight several monsters as well as terrorists. The manga has been published in the United States by Dark Horse Comics.  Description text from: Blood Blockade Battlefront - Wikipedia",
            'official_site' => "http://kekkaisensen.com/",
            'official_site_name' => "TVアニメ「血界戦線 ＆ BEYOND」公式サイト",
            'studio_id' => 4
        ]);
        DB::table('animes')->insert([
            'title' => "Haikyu!!",
            'broadcast' => '2014-04-06',
            'description' => "Haikyu!! (ハイキュー!! Haikyū!!, from the kanji 排球 'volleyball') is a Japanese shōnen manga series written and illustrated by Haruichi Furudate. Individual chapters have been serialized in Weekly Shōnen Jump since February 2012, with bound volumes published by Shueisha. The series was initially published as a one-shot in Shueisha's seasonal Jump NEXT! magazine prior to serialization. As of April 2018, thirty-one volumes have been released in Japan.[7] The manga has been licensed in North America by Viz Media.[8] Haikyu!! has sold over 28 million copies.[9]  Description text from: Haikyu!! - Wikipedia",
            'official_site' => "http://www.j-haikyu.com/anime/",
            'official_site_name' => "アニメ「ハイキュー!!」公式HP",
            'studio_id' => 5
        ]);
    }
}
