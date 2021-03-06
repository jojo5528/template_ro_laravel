<?php

use Illuminate\Support\Facades\Route;

//auth
Auth::routes([
    'confirm' => false,
    'reset' => false,
]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//page
Route::get('/', 'RouteController@index')->name('home');
Route::redirect('/home', '/');
Route::get('/page/{page}', 'RouteController@page_view')->name('page');
Route::prefix('news')->name('news.')->group(function (){
    Route::get('/', 'RouteController@news_all')->name('all');
    Route::get('/{news}', 'RouteController@news_show')->name('show');
});
Route::get('/guild/{guild}/emblem', 'EmblemController@get_emblem')->name('guild.emblem');

//ucp
Route::prefix('ucp')->middleware('auth')->group(function (){
    Route::get('dashboard', 'UCPController@user_index')->name('user.dashboard');
    Route::get('changepassword', 'UCPController@user_changepassword')->name('user.changepassword');
    Route::match(['put','patch'], 'update/{user}', 'UserController@update_credential')->name('user.update');
    Route::get('changemail', 'UCPController@user_changemail')->name('user.changemail');
});

//manage
Route::prefix('manage')->middleware('gm')->name('manage.')->group(function (){
    Route::get('guide', 'UCPController@gm_guide')->name('guide');
    Route::get('dashboard', 'UCPController@gm_index')->name('dashboard');
    Route::resource('news', 'NewsController');
    Route::post('news/truncate', 'NewsController@truncate')->name('news.truncate');
    Route::resource('site', 'SiteController');
    Route::post('site/truncate', 'SiteController@truncate')->name('site.truncate');
    Route::resource('page', 'PageController');
    Route::post('page/truncate', 'PageController@truncate')->name('page.truncate');
    Route::resource('woe', 'WOEController');
    Route::post('woe/truncate', 'WOEController@truncate')->name('woe.truncate');
});
