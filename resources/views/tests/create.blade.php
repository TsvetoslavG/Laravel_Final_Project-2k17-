@extends('.master')
@section('title','Create')




@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				Show <small>&raquo; New Show</small>
			</h3>

		</div>
	</div>
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
		    @foreach ($errors->all() as $error)
		    <li>{{ $error }}</li>
		     @endforeach       
		    </ul>
		</div>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Show Form
					</h3>
				</div>
				<div class="panel-body">					
					<form action="{{ route('test.store')}}" role="form" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="test_name" class="col-md-2 control-label">
										 Name           
									</label>
									<div class="col-md-10">
										<input type="text"  class="form-control" name="test_name" id="test_name" value= "{{ old('test_name') }}">
									</div>
								</div>
								<div class="form-group">
									<select name="spec_id">
         						  	@if($specs->count() > 0)
        						  		@foreach($specs as $spec)
        				   <option value="{{$spec->id}}">{{$spec->spec_name}}</option>
       							  		@endForeach
       								@else
       						    No Record Found
       								@endif   
       					 			</select>
								</div>
								
								<div class="col-md-8">
									<div class="form-group">
										<div class="col-md-10 col-md-offset-2">
											<button type="submit" class="btn btn-primary btn-lg">
												<i class="fa fa-disk-o">													
												</i>
												Save 
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection