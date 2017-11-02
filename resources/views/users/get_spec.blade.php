@extends('master')

@section('title', 'Create Test Page')

@include('includes.user_menu')

@section('content')
	@if(session('msg'))
		<p>{{session('msg')}}</p>
	@endif
	<h1>Specs</h1>
	<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
		<tr>
			<th>Spec Name</th>
			<th>Description</th>
			<th>Positions</th>
			<th>Positions left</th>
			<th>Enroll link</th>
		</tr>
		@foreach($specs as $spec)
			<tr>
				<td>{{$spec->spec_name}}</td>
				<td>{{$spec->spec_desc}}</td>
				<td>{{$spec->spec_positions}}</td>
				@if($spec->positions_left > 0)
					<td>{{$spec->positions_left}}</td>
				@else
					<td>No position left</td>
				@endif
				@if(array_search($spec->id, json_decode($user->user_specs)) === false)
					@if($spec->positions_left > 0)
						<td><a href="{{route('get_spec', [$user->id, $spec->id])}}">Enroll</a></td>
					@else
						<td><a href="#"><del>Enroll</del></a></td>
					@endif
				@else
					<td><a href="{{route('remove_spec', [$user->id, $spec->id])}}">Disenroll</a></td>
				@endif
			</tr>
		@endforeach
	</table>
@endsection