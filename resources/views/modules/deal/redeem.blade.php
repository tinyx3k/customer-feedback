@extends('layouts.dashmix')
@section('styles')
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 text-center mb-4 pt-4 bg-primary">
        <h6 class="text-white m-0">You chose to redeem</h6>
        <h1 class="text-white m-0">{{ $item->name }}</h1>
        <h6 class="text-white">for {{ $item->points_price }} PTS!</h6>
        @if($item->item_type == 'Combo')
        <h2 class="text-white m-0">This is a combo item which contains the following:</h2>
        @foreach($item->comboItemsName() as $content)
        <h6 class="text-white m-0">-{{ $content->name }}</h6>
        @endforeach
        @endif
        <h6 class="text-white font-w700 mt-2">PLEASE HAVE THE QR CODE SCANNED TO REDEEM YOUR REWARD</h6>
    </div>
    <div class="col-sm-12 text-center mb-4">
        <div class="mx-auto bg-white" style="border-radius: 50%; height: 250px; width: 250px; padding: 50px; border: 3px solid white;">
            {{-- <img src="{{ asset('img/android_app/qr.png') }}" alt="" class="img-fluid"> --}}
            {!! QrCode::format('svg')->margin(0)->size(150)->generate(auth()->user()->id . '|' . $item->id) !!}
        </div>
        <small class="text-white">If the app doesn't automatically update, tap <i class="fa fa-home"></i> button below or <i class="fa fa-trophy"></i> to check if your item is successfully redeemed.</small>
    </div>
</div>
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection