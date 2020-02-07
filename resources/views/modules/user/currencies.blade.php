@extends('layouts.dashmix')
@section('content')
<h2 class="content-heading">
<i class="fa fa-angle-right text-muted mr-1"></i> Wallets ({{$wallets->count()}})
<button class="btn btn-success mb-2 fa-pull-right" data-toggle="modal" data-target="#addNewCurrency"><i class="fa fa-money"></i> ADD NEW CURRENCY</button>
</h2>
<div class="row">
	@foreach($wallets as $wallet)
	<div class="col-xl-4 invisible" data-toggle="appear">
		<!-- Card #1 -->
		<div class="block-content block-content-full ribbon ribbon-dark ribbon-modern">
			<div class="ribbon-box">{{ number_format($wallet->balance, 2) }} {{ $wallet->currencies()->first()->code }}</div>
			<div class="col-md-12 animated fadeIn">
				<div class="options-container">
					<div class="block block-rounded block-link-shadow">
						<div class="py-3 text-center">
							<i class="fa fa-credit-card fa-4x text-gray"></i>
							<p class="font-size-lg text-black mt-3 mb-0">
								{{$wallet->currencies()->first()->name}}
							</p>
							<p class="text-muted mb-3">
								{{number_format($wallet->balance,2)}}
							</p>
							<p class="font-size-sm font-w700 text-muted mb-0">
								@if(!$wallet->trashed())
								@if($wallet->main == 1)
								Active(Main)
								@else
								Active
								@endif
								@else
								Disabled
								@endif
							</p>
						</div>
						<div class="block-content block-content-full block-content-sm text-center bg-body-light">
							<em class="font-size-sm text-muted">Payment Gateway Wallet</em>
						</div>
					</div>
					<div class="options-overlay bg-black-90">
						<div class="options-overlay-content">
							<h3 class="h4 text-white mb-2">Wallet options</h3>
							<a href="{{ route('set.main.currency', $wallet->currency_id) }}" class="btn btn-success {{ $wallet->main == 1 || $wallet->trashed() ? 'disabled' : ''}} text-light"><i class="fa fa-snowflake"></i> Set main</a>
							@if($wallet->trashed())
							<a href="{{ route('reactivate.currency', $wallet->currency_id) }}" class="btn btn-warning {{ $wallet->main == 1 || $wallet->currency_id === 168 ? 'disabled' : '' }} text-light"><i class="fa fa-trash"></i> Reactivate</a>
							@else
							<a href="{{ route('deactivate.currency', $wallet->currency_id) }}" class="btn btn-danger {{ $wallet->main == 1 || $wallet->currency_id === 168  ? 'disabled' : '' }} text-light"><i class="fa fa-trash"></i> Deactivate</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Card #1 -->
	</div>
	@endforeach
</div>
@endsection
@section('modal')
@include('sysparam::includes._add_new_currency')
@endsection
@section('scripts')
@endsection
