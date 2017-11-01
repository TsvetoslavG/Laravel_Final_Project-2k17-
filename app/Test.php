<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_name', 'spec_id',
    ];
     public function Spec(){
    	return $this->belongsTo('App/Spec');
    }
}
