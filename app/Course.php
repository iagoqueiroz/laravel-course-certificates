<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('certification_filename', 'progress')->withTimestamps();
    }
}
