@extends('master')

@section('title', 'Show All Tests')

@include('includes.admin_menu')

@section('content')
	<h1>This is Tests index page</h1>
	@if(session('msg'))
		<p>{{session('msg')}}</p>
	@endif
	<a href="{{route('create_test')}}">Add new test</a>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Test name</th>
			<th>Test spec</th>
			<th>Edit link</th>
			<th>Delete link</th>
		</tr>
		@foreach($tests as $test)
			<tr>
				<td><a href="{{route('show_test', $test['id'])}}">{{($test['test_name'])}}</a></td>
				<td><a href="{{route('show_spec', $test['spec_id'])}}">{{$test->spec->spec_name}}</a></td>
				<td><a href="{{route('edit_test', $test['id'])}}">Edit</a></td>
				<td><a href="{{route('delete_test', $test['id'])}}">Delete</a></td>
			</tr>
		@endforeach
	</table>
@endsection