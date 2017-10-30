@extends('master')

@section('title', 'All tests page')

@section('content')
	<h1>Tests Page</h1>
	<table>
		<tr>
			<th>Test name</th>
			<th>Spec</th>
		</tr>
	@foreach($tests as $test)
		<tr>
			<td>{{$test['test_name']}}</td>
			<td>{{$test['spec_id']}}</td>
		</tr>
	@endforeach
	</table>
@endsection