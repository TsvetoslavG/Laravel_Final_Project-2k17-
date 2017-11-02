<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;
use App\User;
use App\Spec;

class UserActions extends Controller
{
	public function tests($id){
		$user = User::find($id);
		
		$specs = json_decode($user->user_specs);
		
		$results = array();
		
		foreach($specs as $spec){
			$test = Test::where('spec_id', $spec);
			
			$results[$test->test_name] = $test;
		}
		
		return view('users.show_tests', compact('results'));
	}
	
	public function specs($id){
		$specs = Spec::all();
		
		$user = User::find($id);
		
		return view('users.get_spec', compact('specs', 'user'));
	}
	
	public function get_spec($user_id, $spec_id){
		$user = User::find($user_id);
		
		$spec = Spec::find($spec_id);
		
		$specs = json_decode($user->user_specs);
		
		if(array_search($spec_id, $specs) === false){
			$specs[] = $spec_id;
			
			$user->update(array(
				'user_specs'	=> json_encode($specs),
			));
			
			$this->update_positions($spec_id);
			
			return redirect()->route('all_specs_user', $user_id)->with('msg', 'You are successfully enrolled to ' . $spec->spec_name);
		}else{
			return redirect()->route('all_specs_user', $user_id)->with('msg', 'You are already enrolled to ' . $spec->spec_name);
		}
	}
	
	public function remove_spec($user_id, $spec_id){
		$user = User::find($user_id);
		
		$spec = Spec::find($spec_id);
		
		$specs = json_decode($user->user_specs);
		
		if(($id = array_search($spec_id, $specs)) !== false){
			array_splice($specs, $id, 1);
			
			$user->update(array(
				'user_specs'	=> json_encode($specs),
			));
			
			$this->update_positions($spec_id);
			
			return redirect()->route('all_specs_user', $user_id)->with('msg', 'You are successfully disenrolled from ' . $spec->spec_name);
		}else{
			return redirect()->route('all_specs_user', $user_id)->with('msg', 'You are not enrolled to ' . $spec->spec_name);
		}
	}
	
	//Special functions :)
	
    public function left_positions($id){
		$count = User::where('user_specs', 'like', '%"' . $id . '"%')->count();
		
		return $count;
	}
	
	public function update_positions($id){
		$spec = Spec::find($id);
		
		if(!empty($spec)){
			$spec->update(array(
				'positions_left'	=>	($spec->spec_positions - $this->left_positions($id)),
			));
			
			return true;
		}else{
			return false;
		}
	}
}
