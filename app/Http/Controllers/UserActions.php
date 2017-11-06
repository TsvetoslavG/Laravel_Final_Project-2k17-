<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;
use App\User;
use App\Spec;
use App\TestUser;

class UserActions extends Controller
{
	public function tests($id){
		$user = User::find($id);
		
		$specs = json_decode($user->user_specs);
		
		$results = array();
		
		foreach($specs as $spec){
			$spec = Spec::find($spec);
			
			$tests = Test::where('spec_id', $spec->id)->get();
			
			$tests_arr = array();
			
			foreach($tests as $test){
				$enrolled = TestUser::where('user_id', $user->id)->where('spec_id', $spec->id)->where('test_id', $test->id)->get();

				if(!empty($enrolled[0])){
					$tests_arr[] = ['test'=>$test, 'enrolled'=>true];
				}else{
					$tests_arr[] = ['test'=>$test, 'enrolled'=>false];
				}
			}
			
			$results[$spec->spec_name]=$tests_arr;
		}
		
		return view('users.show_tests', compact('results', 'user'));
	}
	
	public function get_test($user_id, $test_id){
		$user = User::find($user_id);
		
		$test = Test::find($test_id);
		
		TestUser::create(array(
			'user_id'	=>	$user->id,
			'test_id'	=>	$test->id,
			'spec_id'	=>	$test->spec_id
		));
		
		return redirect()->route('all_tests_user', $user->id)->with('msg', 'You sucessfully selected ' . $test->test_name);
	}
	
	public function test($user_id, $test_id){
		$user = User::find($user_id);
		
		$test = TestUser::where('user_id', $user_id)->where('test_id', $test_id)->first();
		
		$rating = TestUser::where('test_id', $test_id)->orderBy('final_result', 'desc')->get();
		
		return view('users.show_test', compact('user', 'test', 'rating'));
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
		
		TestUser::where('spec_id', $spec_id)->where('user_id', $user_id)->delete();
		
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
