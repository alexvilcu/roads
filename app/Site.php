<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Site extends Model
{
    protected $fillable = ['description', 'address'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
