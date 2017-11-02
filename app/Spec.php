<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable = [
<<<<<<< HEAD
		'spec_name', 'spec_desc', 'spec_positions', 'positions_left'
	];
=======
        'spec_name',
    ];
     public function Test(){
    	return $this->hasOne('App/Test');
    }
>>>>>>> origin/master
}
