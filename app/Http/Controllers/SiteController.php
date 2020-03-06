<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        $site = Site::orderby('id','desc')->paginate(10);
        return view('ucp.gm_site_index', compact('site'));
    }

    public function create()
    {
        return view('ucp.gm_site_create');
    }

    public function edit(Site $site)
    {
        return view('ucp.gm_site_edit', compact('site'));
    }

    public function show(Site $site)
    {
        return view('ucp.gm_site_view', compact('site'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $site = Site::create($data);
        if(!$site){
            return redirect()->back()->withErrors(['error'=>'เพิ่มข้อมูล SITE ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.site.index')->withErrors(['success'=>'เพิ่มข้อมูล SITE ID:'.$site->id.' สำเร็จ!']);
    }

    public function update(Request $request, Site $site)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'desc' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if(!($site->update($data))){
            return redirect()->back()->withErrors(['error'=>'แก้ไขข้อมูล SITE ID:'.$site->id.' ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.site.show', $site->id)->withErrors(['success'=>'แก้ไขข้อมูล SITE ID:'.$site->id.' สำเร็จ!']);
    }

    public function destroy(Site $site)
    {
        $result = $site->delete();

        if(!$result){
            return response(['message'=>'error']);
        }
        return response(['message'=>'success']);
    }

    public function truncate()
    {
        $result = Site::truncate();
        if(!$result){
            return response(['message'=>'error']);
        }

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

        return response(['message'=>'success']);
    }
}
