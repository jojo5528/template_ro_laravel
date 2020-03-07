<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    public $timestamps = false;

    protected $table = 'Guild';
    protected $primaryKey = 'guild_id';

    protected $hidden = [
        'char_id', 'guild_lv', 'connect_member',
        'max_member', 'average_lv',
        'exp', 'next_exp', 'skill_point',
        'mes1', 'mes2', 'emblem_len', 'emblem_id', 'last_master_change',
    ];

    public function image()
    {
        $img = chunk_split(base64_encode($this->emblem_data));
        $str = '<img src="data:image/png;base64,'.$img.'" height="24" width="24">';
        return $str;
    }
}
