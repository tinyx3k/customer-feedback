@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header">
				<h3 class="block-title">Change Password</h3>
			</div>
			<div class="block-content">
				<form action="{{ route('changePassword') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>Current Password</label>
						<input type="password" class="form-control" name="current_password" required>
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" name="new_password" required>
					</div>
					<div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" class="form-control" name="confirm_new_password" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success"><i class="fa fa-save mr-1"></i>Save New Password</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')

@stop