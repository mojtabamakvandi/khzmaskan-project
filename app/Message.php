<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function manager()
    {
        return $this->belongsTo(Manager::class,'manager_id','id');
    }
}
