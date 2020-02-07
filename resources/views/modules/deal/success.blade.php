@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h3>Successfully deducted {{ $item->points_price }}PTS. from {{ $user->first_name.' '.$user->last_name }}'s Account.</h3>
		<h5 class="text-primary">{{ $user->first_name.' '.$user->last_name }}'s Remaining Balance: {{ $user->points->points }}</h5>
		<h3 class="content-heading">Redemption Details</h3>
		<table class="table table-sm table-striped table-vcenter table-bordered">
			<thead>
				<tr class="text-center">
					<th>Item Name</th>
					<th>Item Points Price</th>
					<th width="30%">Item Image</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ $item->name }}</td>
					<td>{{ $item->points_price }}PTS.</td>
					<td><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid"></td>
				</tr>
			</tbody>
		</table>
		<div class="form-group">
			<a href="{{ route('dashboard') }}" class="btn btn-primary btn-block"><i class="fa fa-home mr-1"></i>Go back to Home Page</a>
		</div>
	</div>
</div>
@stop