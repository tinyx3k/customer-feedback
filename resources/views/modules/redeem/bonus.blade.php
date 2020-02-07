@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header bg-primary-op">
				<h3 class="block-title font-w700 text-white">Bonus Points</h3>
			</div>
			<div class="block-content">
				@if($bonus != null)
				<p class="bg-success-op p-3 font-w600 rounded">
					{{$bonus->message}}<br><span class="font-w700 text-danger">Added {{ $bonus->points_added }} PTS to your account!</span>
				</p>
				@else
				<p class="bg-warning-op p-3 font-w600 rounded">
					No bonus points added yet!
				</p>
				@endif
			</div>
		</div>
	</div>
</div>
@stop