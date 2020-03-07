<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function (){
    Route::post('news/filter', 'Api\NewsController@filter_list')->name('news.filter');
});