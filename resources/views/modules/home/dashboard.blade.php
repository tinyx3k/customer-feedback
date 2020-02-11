@extends('layouts.dashmix')
@section('styles')
<style type="text/css">
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-6 col-lg-3 col-md-3">
        <a href="{{ route('item.create') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-plus-circle fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Add Item</div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection