@extends('master')

@section('title', 'Create Test Page')

@include('includes.admin_menu')

@section('content')
	<h1>Create test form</h1>
	{!! Form::open(['route' => 'create_test_action', 'method' => 'post']) !!}
		<p>{{Form::text('test_name', '', ['placeholder' => 'Test name'])}}</p>
		<?php 
			$select_arr = array();
			
			foreach($specs as $spec){
				$select_arr[$spec['id']] =	$spec['spec_name'];
			}
		?>
		<p>{{Form::select('spec_id', $select_arr, 'Select spec')}}</p>
		<p>{{Form::submit('Create test!')}}</p>
	{!! Form::close() !!}
@endsection