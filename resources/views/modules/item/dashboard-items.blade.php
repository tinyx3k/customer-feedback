@extends('layouts.dashmix')
@section('styles')
<style type="text/css">
</style>
@endsection
@section('content')
<h3 class="content-heading text-center font-w700">PELASE SELECT THE PRODUCT YOU ORDERED BELOW</h3>
<div class="row">
    @foreach($items as $item)
    <div class="col-6 col-lg-4 col-md-4">
        <a href="{{ route('item.question', $item->id) }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-primary-op">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid"></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">{{ $item->name }}</div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection