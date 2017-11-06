@extends('master')

@section('title', 'Show Tests')

@include('includes.user_menu')

@section('content')
	<h1>This is show Tests page</h1>
	@if(!empty($results))
		@foreach($results as $spec_name => $tests)
			<h2>{{$spec_name}}</h2>
			@if(!empty($tests[0]))
			<table border="1" cellpadding="10" cellspacing="10" style="border-collapse: collapse;">
				<tr>
					<th>Test name</th>
					<th>Links</th>
				</tr>
				@foreach($tests as $test)
					<tr>
						<td>{{$test['test']->test_name}}</td>
						@if($test['enrolled'])
							<td><a href="{{route('show_test_user', [$user->id, $test['test']->id])}}">Show results</a></td>
						@else
							<td><a href="{{route('get_test', [$user->id, $test['test']->id])}}">Enroll</a></td>
						@endif
					</tr>
				@endforeach
			</table>
			@else
			<p>No tests for now</p>
			@endif
		@endforeach
	@else
		<a href="{{route('all_specs_user', $user->id)}}">Get a spec</a>
	@endif
@endsection