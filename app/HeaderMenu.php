<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderMenu extends Model
{
    public function headerMenu()
    {
        return $this->belongsTo(HeaderMenu::class,'parent','id');
    }
}
