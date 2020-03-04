@extends('layouts.dashmix')
@section('style')
<style>
	/*canvas{
		position: absolute;
		left: 0;
		top: 35%;
        margin-left: auto;
        margin-right: auto;
        right: 0;
	}
	#video{
		position: absolute;
		left: 0;
		top: 35%;
        margin-left: auto;
        margin-right: auto;
        right: 0;
	}*/
    .content {
        padding: 0;
    }
    canvas{
        position: absolute;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<script defer src="{{ asset('js/face-api.min.js') }}"></script>
<script defer src="{{ asset('js/face-script.js') }}"></script>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-12 text-center" id="video-container">
    		<h3 class="content-heading p-0 m-0"><i class="far fa-smile mr-1"></i><i class="far fa-sad-tear mr-1"></i><i class="far fa-surprise mr-1"></i><i class="far fa-frown mr-1"></i><i class="far fa-angry mr-1"></i><i class="far fa-dizzy mr-1"></i><i class="far fa-meh-rolling-eyes mr-1"></i></h3>
            <video id="video" width="200" height="150" autoplay muted></video>
    		<form action="{{ route('item.adult.recommended') }}" id="exp-form" method="POST">
    			@csrf
    			<input type="hidden" id="neutral_score" name="neutral_score" required>
    			<input type="hidden" id="happy_score" name="happy_score" required>
    			<input type="hidden" id="sad_score" name="sad_score" required>
    			<input type="hidden" id="angry_score" name="angry_score" required>
    			<input type="hidden" id="fearful_score" name="fearful_score" required>
    			<input type="hidden" id="disgusted_score" name="disgusted_score" required>
    			<input type="hidden" id="surprised_score" name="surprised_score" required>
    			<div class="video-options" style="visibility: hidden;">
                    <select name="" id="vid-id" class="custom-select">
                        <option value="">Select camera</option>
                    </select>
                </div>
    		</form>
    	</div>
    </div>
</div>
@stop
@section('scripts')
@stop