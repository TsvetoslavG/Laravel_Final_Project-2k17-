@extends('master')

@section('title', 'Show Spec')

@include('includes.admin_menu')

@section('content')
	<h1>Test</h1>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Test Name</th>
			<th>Spec</th>
		</tr>
		<tr>
			<td>{{$test['test_name']}}</td>
			<td>{{$test->spec->spec_name}}</td>
		</tr>
	</table>
	{!! Form::open(['route' => ['save_test_results', $test['id']], 'method' => 'post']) !!}
		<h2>Results</h2>
		<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
			<tr>
				<th>Person name</th>
				<th>Result 1</th>
				<th>Result 2</th>
				<th>Approved</th>
			</tr>
		@foreach($results as $result)
			<?php
				$input_name = 'results[' . $result['user_id'] . ']';
			?>
			<tr>
				<td>{{$result->user->name}}</td>
				<td>{{Form::text($input_name . '[result_1]', $result['result_1'], ['placeholder'=>'Result 1'])}}</td>
				<td>{{Form::text($input_name . '[result_2]', $result['result_2'], ['placeholder'=>'Result 2'])}}</td>
				<td>{{Form::checkbox($input_name . '[approved]')}}
			</tr>
		@endforeach
			<tr>
				<td colspan="4">{{Form::submit('Save results')}}</td>
			</tr>
		</table>
	{!! Form::close() !!}
	<a href="{{route('all_tests')}}">All tests</a>
@endsection