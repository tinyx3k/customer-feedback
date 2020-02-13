@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
    	<div class="col-lg-12 text-center">
    		<h3 class="content-heading">Dominant Expression for {{ $item->name }}</h3>
    		<h2>{{ $dominant }}</h2>
    		<h3 class="content-heading">Expression Logs</h3>
    		<table class="table table-striped table-sm table-vcenter">
    			<thead>
    				<tr>
    					<th>Date</th>
    					<th>Expression</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($expressions as $expression)
					<tr>
						<td>{{ date('Y-m-d H:i:s', strtotime($expression->created_at)+28800) }}</td>
						<td>{{ $expression->dominant }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="2" class="text-center">No Orders Yet!</td>
					</tr>
    				@endforelse
    			</tbody>
    		</table>
    	</div>
    </div>
</div>
@endsection