@extends('master')

@section('title', 'Edit Spec Page')

@include('includes.user_menu')

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
@endsection