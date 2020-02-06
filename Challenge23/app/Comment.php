<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function themes()
    {
        return $this->belongsTo('App\Theme');
    }
}
