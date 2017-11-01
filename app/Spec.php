<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable = [
        'spec_name',
    ];
     public function Test(){
    	return $this->hasOne('App/Test');
    }
}
