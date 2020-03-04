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
            <h1><i class="far fa-smile mr-1"></i><i class="far fa-sad-tear mr-1"></i><i class="far fa-surprise mr-1"></i><i class="far fa-frown mr-1"></i><i class="far fa-angry mr-1"></i><i class="far fa-dizzy mr-1"></i><i class="far fa-meh-rolling-eyes mr-1"></i></h1>
            <a href="{{ route('item.show', $item->id) }}" class="btn btn-lg btn-success">Tap Here When Ready!</a>
    	</div>
    </div>
</div>
@stop
@section('scripts')
@stop