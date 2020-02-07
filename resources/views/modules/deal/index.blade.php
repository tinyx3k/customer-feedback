@extends('layouts.dashmix')
@section('styles')
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 text-center mb-4">
        <h6 class="text-white m-0">You have a total of</h6>
        <h1 class="text-white m-0">{{ auth()->user()->points->points }}</h1>
        <h6 class="text-white">POINTS!</h6>
        <h6 class="text-white font-w700">CHOOSE FROM THE AVAILABLE REWARDS BELOW</h6>
    </div>
    <div class="col-sm-12 text-center">
        @forelse($items as $item)
        <div class="row bg-black-25 mb-4 p-2">
            <div class="col-3">
                <img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid">
            </div>
            <div class="col-6">
                <u class="text-white">{{ $item->name }}</u>
            </div>
            <div class="col-3 text-center text-white">
                <small>{{ $item->points_price }} PTS</small><br>
                @if(auth()->user()->points->points < $item->points_price)
                <button class="btn btn-light btn-rounded btn-sm" disabled>REDEEM</button>
                @else
                <a href="{{ route('deal.redeem', $item->id) }}" class="btn btn-light btn-rounded btn-sm">REDEEM</a>
                @endif
            </div>
        </div>
        @empty
        <h1 class="text-black">No Redeemable Items Available</h1>
        @endforelse
    </div>
</div>
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection