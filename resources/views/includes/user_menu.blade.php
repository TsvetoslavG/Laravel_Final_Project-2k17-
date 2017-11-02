<nav>
	<ul>
		<li>
			<a href="{{route('all_specs_user', $user->id)}}">Specs</a>
		</li>
		<li>
			<a href="{{route('all_tests_user', [$user->id, 2])}}">Tests</a>
		</li>
	</ul>
</nav>