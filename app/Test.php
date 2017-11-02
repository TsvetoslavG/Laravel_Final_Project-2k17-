<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
<<<<<<< HEAD
		'test_name', 'spec_id'
	];
	
	public function spec(){
		return $this->hasOne('App\Spec', 'id', 'spec_id');
	}
=======
        'test_name', 'spec_id',
    ];
     public function Spec(){
    	return $this->belongsTo('App/Spec');
    }
>>>>>>> origin/master
}
