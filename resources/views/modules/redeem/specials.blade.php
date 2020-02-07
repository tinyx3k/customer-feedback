@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="block block-rounded block-bordered block-fx-shadow">
			<div class="block-header bg-primary-op">
				<h3 class="block-title text-white font-w600">Special Promotions</h3>
			</div>
			<div class="block-content">
				<a class="block block-rounded block-bordered block-fx-shadow" href="javascript:void(0);" data-toggle="modal" data-target="#first-modal">
					<img class="img-fluid" src="{{asset('img/android_app/lasagna_combo.png')}}" alt="">
					<div class="block-content">
						<h1 class="mb-1 text-danger">$10 Lasagna Combo</h1>
						<p>
							Make movie times more enjoyable when you get a personal lasagna and small drink for only $10. Available at Agana Theatres.
						</p>
					</div>
				</a>
				<!-- END Story -->
				<!-- Story -->
				<a class="block block-rounded block-bordered block-fx-shadow" href="javascript:void(0);" data-toggle="modal" data-target="#second-modal">
					<img class="img-fluid" src="{{asset('img/android_app/skyzone_promo.jpg')}}" alt="">
					<div class="block-content">
						<h1 class="mb-1 text-danger">Skyzone and the Movies</h1>
						<p>
							Watching movies made more fun and exciting with Skyzone and the Movies! This is the perfect activity for school trips or group dates!
						</p>
					</div>
				</a>
				<!-- END Story -->
				<!-- Story -->
				<a class="block block-rounded block-bordered block-fx-shadow" href="javascript:void(0);" data-toggle="modal" data-target="#third-modal">
					<img class="img-fluid" src="{{asset('img/android_app/mac_and_cheese.png')}}" alt="">
					<div class="block-content">
						<h1 class="mb-1 text-danger">$10 Mac and Cheese Combo</h1>
						<p>
							Bring all-time favorite snack Mac n’ Cheese when you watch your movie at Agana Theatres. Combo comes along with a small drink.
						</p>
					</div>
				</a>
				<!-- END Story -->
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="first-modal" tabindex="-1" role="dialog" aria-labelledby="first-modal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="block block-themed block-rounded block-transparent mb-0">
				<img class="img-fluid" src="{{asset('img/android_app/lasagna_combo.png')}}" alt="">
				<div class="block-content">
					<h1 class="mb-1 text-danger">$10 Lasagna Combo</h1>
					<p>
						Make movie times more enjoyable when you get a personal lasagna and small drink for only $10. Available at Agana Theatres.
					</p>
				</div>
				<div class="block-content block-content-full text-right bg-light">
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="second-modal" tabindex="-1" role="dialog" aria-labelledby="second-modal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="block block-themed block-transparent mb-0">
				<img class="img-fluid" src="{{asset('img/android_app/skyzone_promo.jpg')}}" alt="">
				<div class="block-content">
					<h1 class="mb-1 text-danger">Skyzone and the Movies</h1>
					<p>
						Watching movies made more fun and exciting with Skyzone and the Movies! This is the perfect activity for school trips or group dates!
					</p>
				</div>
				<div class="block-content block-content-full text-right bg-light">
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="third-modal" tabindex="-1" role="dialog" aria-labelledby="third-modal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="block block-themed block-transparent mb-0">
				<img src="{{asset('img/android_app/mac_and_cheese.png')}}" alt="Mac and Cheese" class="img-fluid">
				<div class="block-content">
					<h1 class="mb-1 text-danger">$10 Mac and Cheese Combo</h1>
					<p>
						Bring all-time favorite snack Mac n’ Cheese when you watch your movie at Agana Theatres. Combo comes along with a small drink.
					</p>
				</div>
				<div class="block-content block-content-full text-right bg-light">
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop