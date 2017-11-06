@extends('master')

@section('title', 'Edit Spec Page')

@include('includes.user_menu')

@section('content')
	<h1>This is show Test page</h1>	
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Test name</th>
			<th>Spec</th>
			<th>Result 1</th>
			<th>Result 2</th>
			<th>Final result</th>
			<th>Approved</th>
		</tr>
		<tr>
			<td>{{$test->test->test_name}}</td>
			<td>{{$test->spec->spec_name}}</td>
			@if(!empty($test->result_1))
				<td>{{$test->result_1}}</td>
			@else
				<td>No mark</td>
			@endif
			@if(!empty($test->result_2))
				<td>{{$test->result_2}}</td>
			@else
				<td>No mark</td>
			@endif
			@if(empty($test->final_result))
				<td>No mark</td>
			@else
				<td>{{$test->final_result}}</td>
			@endif
			@if($test->approved)
				<td>Yes</td>
			@else
				<td>No</td>
			@endif
		</tr>
	</table>
	<h2>Clasation</h2>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Name</th>
			<th>Result 1</th>
			<th>Result 2</th>
			<th>Final Mark</th>
			<th>Approved</th>
		</tr>
	@foreach($rating as $rate)
		<tr>
			<td>{{$rate->user->name}}</td>
			@if(!empty($rate->result_1))
				<td>{{$rate->result_1}}</td>
			@else
				<td>No mark</td>
			@endif
			@if(!empty($rate->result_2))
				<td>{{$rate->result_2}}</td>
			@else
				<td>No mark</td>
			@endif
			@if(empty($rate->final_result))
				<td>No mark</td>
			@else
				<td>{{$rate->final_result}}</td>
			@endif
			@if($rate->approved)
				<td>Yes</td>
			@else
				<td>No</td>
			@endif
		</tr>
	@endforeach
@endsection