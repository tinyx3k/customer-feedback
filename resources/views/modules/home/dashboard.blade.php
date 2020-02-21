@extends('layouts.dashmix')
@section('styles')
<style type="text/css">
</style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-6 col-lg-6 col-md-6">
        <a href="{{ route('item.index') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-briefcase fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Items Management</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-6 col-md-6">
        <a href="{{ route('item.menu') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-boxes fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Menu</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-6 col-md-6">
        <a href="{{ route('item.create') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-plus-circle fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Add Item</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-6 col-md-6">
        <a href="{{ route('item.menu') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-star fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Recommended&nbsp;Products</div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
@section('scripts')
@endsection