@extends('master')

@section('title', 'Show Tests')

@include('includes.user_menu')

@section('content')
	<h1>This is show Spec page</h1>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Test name</th>
		</tr>
		<tr>
			<td>{{($test['test_name'])}}</td>
			<td><a href="{{route('edit_test', $test['id'])}}">Edit</a></td>
		</tr>
	</table>
	<a href="{{route('all_tests')}}">All specs</a>
@endsection