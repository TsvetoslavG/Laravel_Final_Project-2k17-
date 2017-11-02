<<<<<<< HEAD
@extends('master')

@section('title', 'Show Spec')

@include('includes.admin_menu')

@section('content')
	<h1>This is show Spec page</h1>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Test name</th>
			<th>Edit link</th>
		</tr>
		<tr>
			<td>{{($test['test_name'])}}</td>
			<td><a href="{{route('edit_test', $test['id'])}}">Edit</a></td>
		</tr>
	</table>
	<a href="{{route('all_tests')}}">All specs</a>
@endsection
=======
@extends('layouts.master')

@section('title', 'Show Full Info')


@section('content')
<h1>{{ $show->name }}</h1>
<p>
	{{ $show->TVShow_info->theme }}
</p>


@endsection

<!-- Many-to-many - courses/students
	- db tables - pivot table, pivot property
	- relations in models - belongsToMany do not confuse it with hasMany 
https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
	-->
>>>>>>> origin/master
