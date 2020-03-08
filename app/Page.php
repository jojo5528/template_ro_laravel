<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'devkurov_pages';

    protected $fillable = ['name', 'html'];
}
