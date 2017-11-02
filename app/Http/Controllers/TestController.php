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
<<<<<<< HEAD
		//$test = Test::find(1)->first();
		
		//dd($test->spec->spec_name);
		$tests = Test::all();
        
		return view('tests.all', compact('tests'));
=======
		$tests = Test::all();
        
        return view('tests.index', compact('tests'));
>>>>>>> origin/master
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
		$specs = Spec::all();
		
		return view('tests.create' , compact('specs'));
=======
        $specs = Spec::all();
         return view('tests.create' , compact( 'specs'));
>>>>>>> origin/master
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
		Test::create([
			'test_name'	=>	$request['test_name'],                
			'spec_id'	=>	$request['spec_id'],
		]);
		
		return redirect()->route('all_tests')->with('msg', 'You created new test ' . $request['test_name'] . ' successfully!');
=======
        $test = Test::create([
                'test_name'      => $request['test_name'],                
                
                'spec_id'     => $request['spec_id'],
                
            ]);
        
       
        
            
        return redirect()->route('get_all_test')->withSuccess('New test Successfully Created');
>>>>>>> origin/master
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
<<<<<<< HEAD
		$test = Test::find($id)->first();
		
		$specs = Spec::all();
		
		return view('tests.edit', compact('test', 'specs'));
=======
        $test = Test::find($id)->first();
       return view('tests.edit', compact('test'));
>>>>>>> origin/master
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
<<<<<<< HEAD
		Test::find($id)->update(array(
			'test_name'	=> $request['test_name'],
			'spec_id'	=> $request['spec_id'],
		));
		
		return redirect()->route('all_tests')->with('msg', 'You updated ' . $request['test_name'] . ' test successfully!');
=======
        
        
>>>>>>> origin/master
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
		$test = Test::find($id);
		
		$test->delete();
		
		return redirect()->route('all_tests')->with('msg', 'Test ' . $test['test_name'] . ' deleted successfully!');
=======
         $test = Test::find($id);
        $test->delete();
        return redirect()->route('get_all_test')->withSuccess('test deleted');
>>>>>>> origin/master
    }
}
