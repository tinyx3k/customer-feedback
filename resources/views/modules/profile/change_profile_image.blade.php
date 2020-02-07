@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header">
				<h3 class="block-title">Change Profile Image</h3>
			</div>
			<div class="block-content">
				<form id="change-img" action="{{ route('save.profile.image') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Current Image</label>
						<br>
						@if(auth()->user()->profile_image == null || auth()->user()->profile_image == '')
						<img src="{{ asset('img/avatars/avatar0.jpg') }}" alt="Profile Image" class="img-fluid">
						@else
						<img src="{{ asset('profile_images').'/'.auth()->user()->profile_image }}" class="img-fluid" style="max-width: 80" alt="">
						@endif
					</div>
					<div class="form-group">
						<label>New Image</label>
						<input type="file" name="img" class="form-control" accept="image/*" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success"><i class="fa fa-save mr-1"></i>Save New Profile Image</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
<script>
	$('#change-img').on('submit', function() {
		LoadingBlockUI();
	})
</script>
@stop