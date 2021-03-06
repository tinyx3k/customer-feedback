@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-12 text-center">
			<a href="{{ route('dashboard') }}" class="btn-block btn-lg btn-warning">Go Back To Home Screen</a>
			<h3 class="content-heading font-w700">Recommended Product Based on your Expression</h3>
			<div class="row">
				@foreach($recommended_by_expression as $key => $product)
				<div class="col-8 offset-2">
					<div class="block block-bordered block-rounded block-fx-shadow">
						<div class="block-header bg-primary">
							<h3 class="block-title font-w700">{{ $key }}</h3>
						</div>
						<div class="block-content mb-4">
							@if($product != null)
							<img src="{{ asset('/') .'img/item_images/'. $product->image }}" alt="{{ $product->name }}" class="img-fluid">
							<h3>{{ $product->name }}</h3>
							@else
							<h3>- Sorry! There are currently no recommended product based on your mood -</h3>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-12 text-center">
			<h3 class="content-heading font-w700">If you don't have any recommendations above, try our BEST SELLERS!</h3>
			<div class="row">
				@foreach($recommended_by_sales as $key => $sale)
				<div class="col-8 offset-2">
					<div class="block block-bordered block-rounded block-fx-shadow">
						<div class="block-header bg-primary">
							<h3 class="block-title font-w700">{{ $key }}</h3>
						</div>
						<div class="block-content mb-4">
							@if($sale != null)
							<img src="{{ asset('/') .'img/item_images/'. $sale->image }}" alt="{{ $sale->name }}" class="img-fluid">
							<h3>{{ $sale->name }}</h3>
							@else
							<h3>- None -</h3>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop