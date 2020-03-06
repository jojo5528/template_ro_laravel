<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderby('id','desc')->paginate(10);
        return view('ucp.gm_news_index', compact('news'));
    }

    public function create()
    {
        return view('ucp.gm_news_create');
    }

    public function edit(News $news)
    {
        return view('ucp.gm_news_edit', compact('news'));
    }

    public function show(News $news)
    {
        return view('ucp.gm_news_view', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'link_url' => ['nullable', 'string'],
            'image_url' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['nullable', 'string'],
            'type' => ['required', 'integer', 'min:1'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $news = News::create($data);
        if(!$news){
            return redirect()->back()->withErrors(['error'=>'เพิ่มข้อมูล NEWS ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ'])->withInput($data);
        }
        return redirect()->route('manage.news.index')->withErrors(['success'=>'เพิ่มข้อมูล NEWS ID:'.$news->id.' สำเร็จ!']);
    }

    public function update(Request $request, News $news)
    {
        $data = $request->except('_token', '_method');

        $validator = Validator::make($request->all(), [
            'link_url' => ['nullable', 'string'],
            'image_url' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['nullable', 'string'],
            'type' => ['required', 'integer', 'min:1'],
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        if(!($news->update($data))){
            return redirect()->back()->withErrors(['error'=>'แก้ไขข้อมูล NEWS ID:'.$news->id.' ล้มเหลว! กรุณาติดต่อผู้ดูแลระบบ']);
        }
        return redirect()->route('manage.news.show', $news->id)->withErrors(['success'=>'แก้ไขข้อมูล NEWS ID:'.$news->id.' สำเร็จ!']);
    }

    public function destroy(News $news)
    {
        $result = $news->delete();

        if(!$result){
            return response(['message'=>'error']);
        }
        return response(['message'=>'success']);
    }

    public function truncate()
    {
        $result = News::truncate();
        if(!$result){
            return response(['message'=>'error']);
        }
        return response(['message'=>'success']);
    }
}
