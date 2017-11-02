@extends('master')
<<<<<<< HEAD

@section('title', 'Edit Spec Page')

@include('includes.admin_menu')

@section('content')
	<h1>Edit test form</h1>
	{!! Form::open(['route' => ['edit_test_action', $test['id']], 'method' => 'post']) !!}
		<p>{{Form::text('test_name', $test['test_name'], ['placeholder' => 'Test name'])}}</p>
		<?php 
			$select_arr = array();
			
			foreach($specs as $spec){
				$select_arr[$spec['id']] =	$spec['spec_name'];
			}
		?>
		<p>{{Form::select('spec_id', $select_arr, 'Select spec')}}</p>
		<p>{{Form::submit('Edit test!')}}</p>
	{!! Form::close() !!}
=======
@section('title','Edit')

@section('content')
	<h1>Edit Test Form</h1>
	{!! Form::open(['route' => ['test.update', $test['id']], 'method' => 'post']) !!}
    	{{Form::text('test_name', $test['test_name'])}}
    	{{Form::select('spec_id', [1 => 'php', 2 => 'java'], ['placeholder' => 'Spec'])}}
	{{Form::submit('Update')}}
	{!! Form::close() !!}
	
>>>>>>> origin/master
@endsection