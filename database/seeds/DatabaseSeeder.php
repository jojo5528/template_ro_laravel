<?php

use Illuminate\Database\Seeder;
use App\Site;
use App\News;
use App\Page;
use App\WOE_Data;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //site default
        $data = [
            [
                'name'=>'seo_desc',
                'desc' => 'คำอธิบายเวลาค้นหา SEO',
                'value' => 'Devkurov freelance webdeveloper - บริการรับทำเว็บไซต์เกมออนไลน์และออกแบบต่างๆ',
            ],
            [
                'name' => 'seo_keywords',
                'desc' => 'คำค้นหา keyword SEO',
                'value' => 'ทำเว็บเกมส์,ฟรีแลนซ์,รับทำเว็บ,ทำเว็บRO,ทำเว็บ RO,ทำเว็บ ragnarok,ออกแบบเว็บไซต์',
            ],
            [
                'name' => 'footer_desc',
                'desc' => 'คำอธิบายเว็บไซต์ ข้อความใน FOOTER ด้านล่าง',
                'value' => 'Server Ragnarok Online by TRO.',
            ],
            [
                'name' => 'fake_account',
                'desc' => 'หลอกจำนวน Account ID',
                'value' => 3,
            ],
            [
                'name' => 'fake_online',
                'desc' => 'หลอกจำนวน Online Player',
                'value' => 3,
            ],
        ];
        Site::insert($data);

        //news default
        $images = [
            'https://www.gamemonday.com/wp-content/uploads/2019/07/Ragnarok-Revo-Classic.jpg',
            'https://place-hold.it/900x471/?bold=true',
            'https://img.online-station.net/_content/2019/0724/140450/gallery/Size_900_900_471.jpg',
        ];
        $link_url = [null , 'https://devkurov.in.th'];
        $data = [];
        for($i=0;$i<30;$i++){
            $data[$i] = [
                'type' => rand(1,3),
                'image_url' => $images[rand(0,2)],
                'link_url' => $link_url[rand(0,1)],
                'title' => Str::random(rand(4,12)),
                'desc' => Str::random(rand(32,256)),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        News::insert($data);

        //page default
        $data = [
            [
                'name'=> 'download',
                'html' => 'แก้ไขได้ในเมนู GM > PAGE ARTICLE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'information',
                'html' => 'แก้ไขได้ในเมนู GM > PAGE ARTICLE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'donate',
                'html' => 'แก้ไขได้ในเมนู GM > PAGE ARTICLE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'vote',
                'html' => 'แก้ไขได้ในเมนู GM > PAGE ARTICLE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'share',
                'html' => 'แก้ไขได้ในเมนู GM > PAGE ARTICLE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Page::insert($data);

        //WOE Castle Default
        $data = [
            //WOE FE Castle
            [
                'castle_id'=> 0,
                'name' => 'Neuschwanstein',
            ],
            [
                'castle_id'=> 1,
                'name' => 'Hohenschwangau',
            ],
            [
                'castle_id'=> 2,
                'name' => 'Nuernberg',
            ],
            [
                'castle_id'=> 3,
                'name' => 'Wuerzburg',
            ],
            [
                'castle_id'=> 4,
                'name' => 'Rothenburg',
            ],
            [
                'castle_id'=> 5,
                'name' => 'Repherion',
            ],
            [
                'castle_id'=> 6,
                'name' => 'Eeyolbriggar',
            ],
            [
                'castle_id'=> 7,
                'name' => 'Yesnelph',
            ],
            [
                'castle_id'=> 8,
                'name' => 'Bergel',
            ],
            [
                'castle_id'=> 9,
                'name' => 'Mersetzdeitz',
            ],
            [
                'castle_id'=> 10,
                'name' => 'Bright Arbor',
            ],
            [
                'castle_id'=> 11,
                'name' => 'Scarlet Palace',
            ],
            [
                'castle_id'=> 12,
                'name' => 'Holy Shadow',
            ],
            [
                'castle_id'=> 13,
                'name' => 'Sacred Altar',
            ],
            [
                'castle_id'=> 14,
                'name' => 'Bamboo Grove Hill',
            ],
            [
                'castle_id'=> 15,
                'name' => 'Kriemhild',
            ],
            [
                'castle_id'=> 16,
                'name' => 'Swanhild',
            ],
            [
                'castle_id'=> 17,
                'name' => 'Fadhgridh',
            ],
            [
                'castle_id'=> 18,
                'name' => 'Skoegul',
            ],
            [
                'castle_id'=> 19,
                'name' => 'Gondul',
            ],

            //WOE NGuild Castle
            [
                'castle_id'=> 20,
                'name' => 'Earth',
            ],
            [
                'castle_id'=> 21,
                'name' => 'Air',
            ],
            [
                'castle_id'=> 22,
                'name' => 'Water',
            ],
            [
                'castle_id'=> 23,
                'name' => 'Fire',
            ],

            //WOE SE Castle
            [
                'castle_id'=> 24,
                'name' => 'Himinn',
            ],
            [
                'castle_id'=> 25,
                'name' => 'Andlangr',
            ],
            [
                'castle_id'=> 26,
                'name' => 'Viblainn',
            ],
            [
                'castle_id'=> 27,
                'name' => 'Hljod',
            ],
            [
                'castle_id'=> 28,
                'name' => 'Skidbladnir',
            ],
            [
                'castle_id'=> 29,
                'name' => 'Mardol',
            ],
            [
                'castle_id'=> 30,
                'name' => 'Cyr',
            ],
            [
                'castle_id'=> 31,
                'name' => 'Horn',
            ],
            [
                'castle_id'=> 32,
                'name' => 'Gefn',
            ],
            [
                'castle_id'=> 33,
                'name' => 'Bandis',
            ],

            //WOE TE Castle
            [
                'castle_id'=> 34,
                'name' => 'Kafragarten 1',
            ],
            [
                'castle_id'=> 35,
                'name' => 'Kafragarten 2',
            ],
            [
                'castle_id'=> 36,
                'name' => 'Kafragarten 3',
            ],
            [
                'castle_id'=> 37,
                'name' => 'Kafragarten 4',
            ],
            [
                'castle_id'=> 38,
                'name' => 'Kafragarten 5',
            ],
            [
                'castle_id'=> 39,
                'name' => 'Gloria 1',
            ],
            [
                'castle_id'=> 40,
                'name' => 'Gloria 2',
            ],
            [
                'castle_id'=> 41,
                'name' => 'Gloria 3',
            ],
            [
                'castle_id'=> 42,
                'name' => 'Gloria 4',
            ],
            [
                'castle_id'=> 43,
                'name' => 'Gloria 5',
            ],
        ];
        WOE_Data::insert($data);
    }
}
