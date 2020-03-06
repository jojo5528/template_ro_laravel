<?php

use Illuminate\Database\Seeder;
use App\Site;
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
    }
}
