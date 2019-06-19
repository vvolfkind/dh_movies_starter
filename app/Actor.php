<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = [];

    public function fullName()
    {
    	return $this->first_name . ' ' . $this->last_name;
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
