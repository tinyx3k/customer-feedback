@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header bg-primary-op">
				<h3 class="block-title font-w700 text-white">Points Redeemed</h3>
			</div>
			<div class="block-content">
				@forelse($histories as $history)
				<p class="p-3 bg-danger-op rounded">
					Spent <b>{{ $history->item->name }}</b> for {{ $history->points_spent }} PTS. on {{date('F j, Y',strtotime($history->created_at))}}
				</p>
				@empty
				<h3 class="text-primary font-w700">No redemption history yet!</h3>
				@endforelse
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-lg-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header bg-primary-op">
				<h3 class="block-title font-w700 text-white">Points Earned</h3>
			</div>
			<div class="block-content">
				@forelse($earned as $history)
				<p class="p-3 bg-warning-op rounded">
					Earned {{ $history->points_redeemed }} PTS. from <b>{{ $history->item->name }}</b> on {{date('F j, Y',strtotime($history->created_at))}}
				</p>
				@empty
				<h3 class="text-primary font-w700">No redemption history yet!</h3>
				@endforelse
			</div>
		</div>
	</div>
</div>
@stop