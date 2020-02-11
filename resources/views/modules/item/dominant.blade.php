@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-12 text-center">
    		{{-- <h3 class="content-heading">Dominant Expression for {{ $item->name }}</h3> --}}
    		<h2>{{ $dominant }}</h2>
    	</div>
    </div>
</div>
@endsection