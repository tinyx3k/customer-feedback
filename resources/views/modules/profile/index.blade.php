@extends('layouts.dashmix')
@section('styles')
@stop
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header">
				<h3 class="block-title">Edit {{ $user->first_name .' '. $user->last_name }}'s Profile</h3>
			</div>
			<div class="block-content">
				<form action="{{ route('user.update', $user->id) }}" method="POST">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="{{ $user->id }}">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
					</div>
					<div class="form-group">
						<label>Mobile Number</label>
						<input type="mobile" class="form-control" name="mobile" value="{{ $user->mobile }}">
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit"><i class="fa fa-save mr-1"></i>Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')

@stop