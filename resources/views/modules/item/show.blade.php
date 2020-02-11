@extends('layouts.dashmix')
@section('style')
<style>
	canvas{
		position: absolute;
		left: 35%;
		top: 25%;
	}
	#video{
		position: absolute;
		left: 35%;
		top: 25%;
	}
</style>
<script defer src="{{ asset('js/face-api.min.js') }}"></script>
<script defer src="{{ asset('js/face-script.js') }}"></script>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-12 text-center">
    		<h3 class="content-heading">{{ $item->name }}</h3>
    		<form action="{{ route('item.expression') }}" method="POST">
    			@csrf
    			<input type="hidden" name="item_id" value="{{$item->id}}">
    			<input type="hidden" id="neutral_score" name="neutral_score" required>
    			<input type="hidden" id="happy_score" name="happy_score" required>
    			<input type="hidden" id="sad_score" name="sad_score" required>
    			<input type="hidden" id="angry_score" name="angry_score" required>
    			<input type="hidden" id="fearful_score" name="fearful_score" required>
    			<input type="hidden" id="disgusted_score" name="disgusted_score" required>
    			<input type="hidden" id="surprised_score" name="surprised_score" required>
    			<div class="form-group">
    				<button type="submit" class="btn btn-lg btn-success">Get Expression for {{ $item->name }}</button>
    			</div>
    		</form>
    	</div>
    </div>
</div>
@stop
@section('scripts')
<video id="video" width="100" height="100" autoplay muted></video>
@stop