<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function themes()
    {
        return $this->hasOne(Theme::class);
    }
}
