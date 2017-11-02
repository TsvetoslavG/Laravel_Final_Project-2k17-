@extends('master')

@section('title', 'Create Spec Page')

@include('includes.admin_menu')

@section('content')
	<h1>Create spec form</h1>
	{!! Form::open(['route' => 'create_spec_action', 'method' => 'post']) !!}
		<p>{{Form::text('spec_name', '', ['placeholder' => 'Spec name'])}}</p>
		<p>{{Form::textarea('spec_desc', '', ['placeholder' => 'Spec desc'])}}</p>
		<p>{{Form::number('spec_positions', '', ['placeholder' => 'Spec positions'])}}</p>
		<p>{{Form::submit('Create spec!')}}</p>
	{!! Form::close() !!}
@endsection