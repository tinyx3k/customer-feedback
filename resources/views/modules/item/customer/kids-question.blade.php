@extends('layouts.dashmix')
@section('style')
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center" id="video-container">
            <h3 class="content-heading">Ready for your recommendation?</h3>
            <h1><i class="far fa-smile mr-1"></i><i class="far fa-sad-tear mr-1"></i><i class="far fa-surprise mr-1"></i><i class="far fa-frown mr-1"></i><i class="far fa-angry mr-1"></i><i class="far fa-dizzy mr-1"></i><i class="far fa-meh-rolling-eyes mr-1"></i></h1>
            <a href="{{ route('item.kids.expression') }}" class="btn btn-lg btn-success">Tap Here When Ready!</a>
        </div>
    </div>
</div>
@stop
@section('scripts')
@stop