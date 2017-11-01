
@extends('master')
@section('title', 'Test')

@section('style')

<link rel="stylesheet" type="text/css" href="">

@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-6">
		<h1>Test</h1>
	</div>	
</div>
@if(Session::has('success'))
<div class="alert alert-success">
	<button class="close" type="button" data-dismiss="alert">&times;</button>
	<strong>
		<i class="fa fa-check-circle fa-lg fa-fw"></i>Success. &nbsp;
	</strong>
	{{ Session::get('success') }}
</div>
@endif
<div class="row">
<table class="table">
	<tr>
		<td>
			Name
		</td>
		<td>
			Specialiti
		</td>
		
		<td>
			edit
		</td>
		<td>
			Delete
		</td>
	</tr>
	@foreach($tests as $test)
	<tr>
		<td>
				{{ $test->test_name }}				
		</td>
		<td>
				{{ $test->spec_id }}				
		</td>
		
		
		<td>
			<a href="{{ route('edit_test', $test->id) }}" class="btn btn-info">Edit</a>
		</td>
		<td>
			<a href="{{ route('delete_test', $test['id'])}}">Delete</a>
		</td>
	</tr>
@endforeach
</table>
<div class="row">
	<div class="col-md-6">
		<a href="{{ route('add_new_test') }}" class="btn btn-info">Add New Test</a>
	</div>
</div>
</div>
</div>
@endsection