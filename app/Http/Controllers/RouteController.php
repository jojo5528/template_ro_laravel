<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Char;
use App\Site;
use App\News;
use App\Page;

class RouteController extends Controller
{
    public function index()
    {
        //count
        $online = Char::where('online',1)->count();
        $account = User::count();

        $fake_online = Site::where('name','fake_online')->orderby('id','desc')->first('value');
        $fake_online = $fake_online?$fake_online->value:1;
        $fake_account = Site::where('name','fake_account')->orderby('id','desc')->first('value');
        $fake_account = $fake_account?$fake_account->value:1;

        $count['online'] = $online*$fake_online;
        $count['account'] = $account*$fake_account;

        //news
        $news = News::orderby('id', 'desc')->take(6)->get();

        //=====ranking=====
        $col_mvp = Schema::hasColumn('char','point_mvp');
        $col_pvp = Schema::hasColumn('char','point_pvp');
        $col_vote = Schema::hasColumn('login','point_total');
        $col_share = null;

        //mvp
        if($col_mvp){
            $mvp = Char::select('name','point_mvp')->orderby('point_mvp','desc')->take(10)->get();
            if(!empty($mvp)){
                $mvp_data = [];
                foreach($mvp as $i){
                    $mvp_data[]['name'] = $i['name'];
                    $mvp_data[]['point'] = $i['point_mvp'];
                }
            }else{
                $mvp_data = null;
            }
        }else{
            $mvp_data = null;
        }

        //pvp
        if($col_pvp){
            $pvp = Char::select('name','point_pvp')->orderby('point_pvp','desc')->take(10)->get();
            if(!empty($pvp)){
                $pvp_data = [];
                foreach($pvp as $i){
                    $pvp_data[]['name'] = $i['name'];
                    $pvp_data[]['point'] = $i['point_pvp'];
                }
            }else{
                $pvp_data = null;
            }
        }else{
            $pvp_data = null;
        }

        //vote
        if($col_vote){
            $vote = User::select('userid','point_total')->orderby('point_total','desc')->take(10)->get();
            if(!empty($vote)){
                $vote_data = [];
                foreach($vote as $i){
                    $vote_data[]['name'] = $i['userid'];
                    $vote_data[]['point'] = $i['point_total'];
                }
            }else{
                $vote_data = null;
            }
        }else{
            $vote_data = null;
        }

        //share
        $share_data = null;

        $ranking['mvp'] = $mvp_data;
        $ranking['pvp'] = $pvp_data;
        $ranking['vote'] = $vote_data;
        $ranking['share'] = $share_data;

        return view('home', compact('count', 'news', 'ranking'));
    }

    public function news_all()
    {
        return view('news_all');
    }

    public function news_show(News $news)
    {
        return view('news_show', compact('news'));
    }

    public function page_view($page){
        $data = Page::where('name', $page)->orderby('id', 'desc')->first();
        return view('pages')->with('page', $data);
    }
}
