<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'devkurov_site';
    public $timestamps = false;

    protected $fillable = ['name', 'desc', 'value'];
}
