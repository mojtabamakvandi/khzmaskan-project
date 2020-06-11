<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function factors()
    {
        return $this->hasMany(Factor::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
