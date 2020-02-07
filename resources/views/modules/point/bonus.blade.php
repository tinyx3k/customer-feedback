@extends('layouts.dashmix')
@section('style')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@stop
@section('content')
<div class="row">
	<div class="col-lg-12">
		<form action="{{ route('bonus.add') }}" id="bonus_points_form" method="POST">
			@csrf
			<div class="form-group">
				<label>Customer</label>
				<select name="user_id" id="user_id" class="form-control" required>
					<option></option>
				</select>
			</div>
			<div class="form-group">
				<label>Custom Message</label>
				<textarea name="message" id="message" cols="30" rows="5" class="form-control" required></textarea>
			</div>
			<div class="form-group">
				<label>Points to Add</label>
                <input type="number" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="points_added" required>
			</div>
			<div class="form-group">
				<button class="btn btn-success" id="submit_button"><i class="fa fa-star mr-1"></i>Add Points</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
	$(window).keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});

	$('#user_id').select2({
		placeholder: "Click here and scan QR code.",
		minimumInputLength: 3,
		ajax: {
			type: 'POST',
			url: '{{ route('point.customer.search') }}',
			dataType: 'json',
			data: function(params){
				return {
					q: $.trim(params.term),
				};
			},
			processResults: function(data) {
				return {
					results: data
				};
			},
			cache: true
		},
		language: {
			inputTooShort: function(args) {
				return "Scan QR Code.";
			},
			searching: function() {
				return "Looking up customer info...";
			},
			noResult: function() {
				return "No customer found, please clear field and try scanning again...";
			}
		}
	});

	$('form#bonus_points_form').submit(function() {
		$('#submit_button').attr('disabled', 'disabled');
	})
</script>
@stop