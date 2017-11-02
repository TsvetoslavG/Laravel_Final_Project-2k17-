<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
	protected $table = 'tests_users';
	
    protected $fillable = [
		'user_id', 'test_id', 'spec_id', 'result_1', 'result_2'
	];
	
	public function user(){
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	
	public function test(){
		return $this->hasOne('App\Test', 'id', 'test_id');
	}
	
	public function spec(){
		return $this->hasOne('App\Spec', 'id', 'spec_id');
	}
}
