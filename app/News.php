<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'devkurov_news';

    protected $fillable = ['image_url', 'link_url', 'title', 'desc', 'type'];

    public function type_text()
    {
        $str = "ERROR";
        switch($this->type){
            case 1:
                $str = "NEWS";
                break;
            case 2:
                $str = "EVENT";
                break;
            case 3:
                $str = "PROMOTION";
                break;
            default:
                $str = "ERROR";
                break;
        }
        return $str;
    }

    public function type_class()
    {
        $str = "badge badge-pill text-white";
        switch($this->type){
            case 1:
                $str .= " badge-warning";
                break;
            case 2:
                $str .= " badge-success";
                break;
            case 3:
                $str .= " badge-primary";
                break;
            default:
                $str .= " badge-danger";
                break;
        }
        return $str;
    }

    public function type_html()
    {
        $str = '<b class="'.$this->type_class().'">'.$this->type_text().'</b>';
        return $str;
    }
}
