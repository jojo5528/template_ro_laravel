<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function filter_list(Request $request){
        $per_page = 9;

        if($request->type>0){
            $where = ["type"=>$request->type];
        }else{
            $where = null;
        }
        $data = News::where($where)->orderby($request->order_key, $request->order_dir)->paginate($per_page);

        foreach($data as $i){
            $i['type_html'] = $i->type_html();
            $i['link_url'] = (!empty($i['link_url']))?$i['link_url']:route('news.show', $i['id']);
        }

        return response()->json($data);
    }
}
