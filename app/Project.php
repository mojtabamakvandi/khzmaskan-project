<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
