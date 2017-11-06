<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TestUser;
use App\Test;

class UserResultsController extends Controller
{
    public function show_results($test_id){
		$test = Test::find($test_id)->first();
		$results = TestUser::where('test_id', $test_id)->get();
		
		return view('tests.test_results', compact('test', 'results'));
	}
	
	public function save_results(Request $request, $test_id){
		foreach($request['results'] as $user_id => $data){
			$final_result = ($data['result_1'] > $data['result_2']) ? $data['result_1'] : data['result_2'];
			
			$approved = array_key_exists('approved', $data) ? true : false;
			
			TestUser::where('user_id', $user_id)->where('test_id', $test_id)->update(array(
				'result_1'		=>	$data['result_1'],
				'result_2'		=>	$data['result_2'],
				'final_result'	=>	$final_result,	
				'approved'		=>	$approved,
			));
		}
		
		return redirect()->route('all_tests')->with('msg', 'You saved your results!');
	}
}
