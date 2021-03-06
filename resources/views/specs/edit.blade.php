@extends('master')

@section('title', 'Edit Spec Page')

@include('includes.admin_menu')

@section('content')
	<h1>Edit spec form</h1>
	{!! Form::open(['route' => ['edit_spec_action', $spec['id']], 'method' => 'post']) !!}
		<p>{{Form::text('spec_name', $spec['spec_name'], ['placeholder' => 'Spec name'])}}</p>
		<p>{{Form::textarea('spec_desc', $spec['spec_desc'], ['placeholder' => 'Spec desc'])}}</p>
		<p>{{Form::number('spec_positions', $spec['spec_positions'], ['placeholder' => 'Spec positions'])}}</p>
		<p>{{Form::submit('Edit spec!')}}</p>
	{!! Form::close() !!}
@endsection