@extends('master')

@section('title', 'Show Spec')

@include('includes.admin_menu')

@section('content')
	<h1>This is show Spec page</h1>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Spec name</th>
			<th>Spec desc</th>
			<th>Spec number of positions</th>
			<th>Edit link</th>
		</tr>
		<tr>
			<td>{{($spec['spec_name'])}}</td>
			<td>{{$spec['spec_desc']}}</td>
			<td>{{$spec['spec_positions']}}</td>
			<td><a href="{{route('edit_spec', $spec['id'])}}">Edit</a></td>
		</tr>
	</table>
	<a href="{{route('all_specs')}}">All specs</a>
@endsection