@extends('layouts.dashmix')
@section('styles')
<link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header">
				<h3 class="block-title">Create New User</h3>
			</div>
			<div class="block-content">
				<form action="{{route ('user.store')}}" method="POST">
					@csrf
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
					</div>
					<div class="form-group">
						<label for="qr_data">QR Code Data</label>
						<input type="text" class="form-control" name="qr_data" placeholder="Click here and then scan with the QR code scanner" required>
					</div>
					<div class="form-group">
						<label for="email" class="required">Email:</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email address" required>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile:</label>
						<input type="mobile" class="form-control" name="mobile" placeholder="Enter email mobile">
					</div>
					<div class="form-group">
						<label for="birthdate">Date of Birth</label>
						<input type="text" class="js-datepicker form-control" name="birthdate" id="birthdate" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yyyy" placeholder="mm/dd/yyyy" required>
					</div>
					<div class="form-group">
						<label for="role_id" class="required">Role:</label>
						<select name="role_id" class="form-control">
							@foreach($roles as $role)
							@php
							if ($role->name === 'Super Admin' || $role->name === 'Admin' || $role->name === auth()->user()->roles()->first()->name) continue;
							@endphp
							<option value="{{ $role->id }}">{{ $role->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
<script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
	jQuery(function(){ Dashmix.helpers(['datepicker']); });
</script>
@stop