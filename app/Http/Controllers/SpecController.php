<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spec;
use App\User;
use App\Test;
use App\TestUser;

class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$specs = Spec::all();
		
        return view('specs.all', compact('specs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Spec::create(array(
			'spec_name'			=>	$request['spec_name'],
			'spec_desc'			=>	$request['spec_desc'],
			'spec_positions'	=>	$request['spec_positions'],
			'positions_left'	=>	$request['spec_positions'],
		));
		
		return redirect()->route('all_specs')->with('msg', 'You create new spec ' . $request['spec_name'] . ' successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spec = Spec::where('id', $id)->first();
		
		return view('specs.show', compact('spec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spec = Spec::where('id', $id)->first();
		
		return view('specs.edit', compact('spec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Spec::find($id)->update(array(
			'spec_name'			=>	$request['spec_name'],
			'spec_desc'			=>	$request['spec_desc'],
			'spec_positions'	=>	$request['spec_positions'],
		));
		
		return redirect()->route('all_specs')->with('msg', 'You edited spec ' . $request['spec_name'] . ' successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spec = Spec::find($id);
		
		Test::where('spec_id', $id)->delete();
		
		TestUser::where('spec_id', $id)->delete();
		
		$users = User::where('user_specs', 'like', '%"' . $id . '"%')->get();
		
		foreach($users as $user){
			$specs = json_decode($user->user_specs);
		
			$ind = array_search($id, $specs);
			
			array_splice($specs, $ind, 1);
			
			$user->update(array(
				'user_specs'	=> json_encode($specs),
			));
		}
		
		$spec->delete();
		
		return redirect()->route('all_specs')->with('msg', 'You deleted spec ' . $spec['spec_name'] . ' successfully!');
    }
}
