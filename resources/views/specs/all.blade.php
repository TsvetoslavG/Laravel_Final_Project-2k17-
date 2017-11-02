@extends('master')

@section('title', 'Show All Specs')

@include('includes.admin_menu')

@section('content')
	<h1>This is Spec index page</h1>
	@if(session('msg'))
		<p>{{session('msg')}}</p>
	@endif
	<a href="{{route('create_spec')}}">Add new spec</a>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Spec name</th>
			<th>Spec desc</th>
			<th>Spec number of positions</th>
			<th>Edit link</th>
			<th>Delete link</th>
		</tr>
		@foreach($specs as $spec)
			<tr>
				<td><a href="{{route('show_spec', $spec['id'])}}">{{($spec['spec_name'])}}</a></td>
				<td>{{$spec['spec_desc']}}</td>
				<td>{{$spec['spec_positions']}}</td>
				<td><a href="{{route('edit_spec', $spec['id'])}}">Edit</a></td>
				<td><a href="{{route('delete_spec', $spec['id'])}}">Delete</a></td>
			</tr>
		@endforeach
	</table>
@endsection