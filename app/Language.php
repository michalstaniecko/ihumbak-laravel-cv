<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $guarded = [];


    public function profiles() {
        return $this->belongsToMany(Profile::class)->withPivot('level');
    }

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
