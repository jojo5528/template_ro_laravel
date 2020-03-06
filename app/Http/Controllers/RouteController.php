<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Char;
use App\Site;

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

        return view('home', compact('count'));
    }
}
