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
    		<h3 class="content-heading">Ready to share your expression for {{ $item->name }}?</h3>
            <h5>Smile, frown, or do whatever you want to share your expression about our product!</h5>
            <a href="{{ route('item.show', $item->id) }}" class="btn btn-lg btn-success">Tap Here When Ready!</a>
    	</div>
    </div>
</div>
@stop
@section('scripts')
@stop