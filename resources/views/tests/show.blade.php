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