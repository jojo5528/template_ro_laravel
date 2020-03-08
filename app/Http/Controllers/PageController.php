<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::orderby('id','desc')->paginate(10);
        return view('ucp.gm_page_index', compact('page'));
    }

    public function create()
    {
        return view('ucp.gm_page_create');
    }

    public function edit(Page $page)
    {
        return view('ucp.gm_page_edit', compact('page'));
    }

    public function show(Page $page)
    {
        return view('ucp.gm_page_view', compact('page'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'html' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $page = Page::create($data);
        if(!$page){
            return redirect()->back()->withErrors(['error'=>'เพิ่มข้อมูล PAGE ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.page.index')->withErrors(['success'=>'เพิ่มข้อมูล PAGE ID:'.$page->id.' สำเร็จ!']);
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'html' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if(!($page->update($data))){
            return redirect()->back()->withErrors(['error'=>'แก้ไขข้อมูล PAGE ID:'.$page->id.' ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.page.show', $page->id)->withErrors(['success'=>'แก้ไขข้อมูล PAGE ID:'.$page->id.' สำเร็จ!']);
    }

    public function destroy(Page $page)
    {
        $result = $page->delete();

        if(!$result){
            return response(['message'=>'error']);
        }
        return response(['message'=>'success']);
    }

    public function truncate()
    {
        $result = Page::truncate();
        if(!$result){
            return response(['message'=>'error']);
        }

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

        return response(['message'=>'success']);
    }
}
