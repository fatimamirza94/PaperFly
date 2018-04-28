<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
     protected $fillable = ['code','name']; 

    public function district()
    {
    	return $this->hasMany(District::class);
    } 
}
