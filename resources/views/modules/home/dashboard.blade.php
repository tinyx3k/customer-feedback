@extends('layouts.dashmix')
@section('styles')
<style type="text/css">
</style>
@endsection
@section('content')
@if(auth()->user()->hasRole('Super Admin'))
<div class="row">
    <div class="col-6 col-lg-3 col-md-3">
        <a href="{{ route('user.create') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-user fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">New User</div>
                </div>
            </div>
        </a>
    </div>
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
    <div class="col-6 col-lg-3 col-md-3">
        <a href="{{ route('redeem.index') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-boxes fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Earn Points</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3 col-md-3">
        <a href="{{ route('redemption.index') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-tags fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Redeem Items</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3 col-md-3">
        <a href="{{ route('point.index') }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-gd-lake">
            <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                <div>
                    <div class="font-size-h1 font-w300 text-white"><i class="fa fa-star fa-fw"></i></div>
                    <div class="font-w600 mt-2 text-uppercase text-white-75">Bonus Points</div>
                </div>
            </div>
        </a>
    </div>
</div>
@elseif(auth()->user()->hasRole('Customer'))
<div class="row">
    <div class="col-sm-12 text-center mb-4">
        <h6 class="text-white m-0">You have a total of</h6>
        <h1 class="text-white m-0">{{ auth()->user()->points->points }}</h1>
        <h6 class="text-white m-0">POINTS!</h6>
        <a href="{{ route('deal.index') }}" class="btn btn-lg btn-hero-primary btn-rounded mt-4">
            CHOOSE REWARDS
        </a>
    </div>
    <div class="col-sm-12 text-center">
        <div class="mx-auto bg-white" style="border-radius: 50%; height: 250px; width: 250px; padding: 50px; border: 3px solid white;">
            {{-- <img src="{{ asset('img/android_app/qr.png') }}" alt="" class="img-fluid"> --}}
            {!! QrCode::format('svg')->margin(0)->size(150)->generate(auth()->user()->qr_data) !!}
        </div>
        <h4 class="text-white font-w900 m-0">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
        <h4 class="text-white font-w900 m-0">{{ auth()->user()->email }}</h4>
        <h4 class="text-white">{{ auth()->user()->mobile }}</h4>
    </div>
</div>
@else
<h1>Cashier/Employee Module Currently Unavailable</h1>
@endif
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection