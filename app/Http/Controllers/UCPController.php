<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;

class UCPController extends Controller
{
    //user
    
    public function user_index()
    {
        return view('ucp.user_dashboard');
    }

    public function user_changepassword()
    {
        return view('ucp.user_changepassword');
    }

    public function user_changemail()
    {
        return view('ucp.user_changemail');
    }

    //gm manage

    public function gm_guide()
    {
        return view('ucp.gm_guide');
    }

    public function gm_index()
    {
        $count['user'] = User::count();
        $count['news'] = News::count();
        return view('ucp.gm_dashboard', compact('count'));
    }
}
