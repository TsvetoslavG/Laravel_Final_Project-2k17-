@extends('master')
@section('title','Edit')

@section('content')
	<h1>Edit Test Form</h1>
	{!! Form::open(['route' => ['test.update', $test['id']], 'method' => 'post']) !!}
    	{{Form::text('test_name', $test['test_name'])}}
    	{{Form::select('spec_id', [1 => 'php', 2 => 'java'], ['placeholder' => 'Spec'])}}
	{{Form::submit('Update')}}
	{!! Form::close() !!}
	
@endsection