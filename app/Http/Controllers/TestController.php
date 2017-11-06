<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Spec;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {	
		//$test = Test::find(1)->first();
		
		//dd($test->spec->spec_name);
		$tests = Test::all();
        
		return view('tests.all', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$specs = Spec::all();
		
		return view('tests.create' , compact('specs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Test::create([
			'test_name'	=>	$request['test_name'],                
			'spec_id'	=>	$request['spec_id'],
		]);
		
		return redirect()->route('all_tests')->with('msg', 'You created new test ' . $request['test_name'] . ' successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->first();
		
		return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$test = Test::find($id)->first();
		
		$specs = Spec::all();
		
		return view('tests.edit', compact('test', 'specs'));
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
		Test::find($id)->update(array(
			'test_name'	=> $request['test_name'],
			'spec_id'	=> $request['spec_id'],
		));
		
		return redirect()->route('all_tests')->with('msg', 'You updated ' . $request['test_name'] . ' test successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$test = Test::find($id);
		
		$test->delete();
		
		return redirect()->route('all_tests')->with('msg', 'Test ' . $test['test_name'] . ' deleted successfully!');
    }
}
