<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function categories()
    {
       return $this->belongsTo(Category::class);
    }
    public function users()
    {
       return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
