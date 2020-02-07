@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Customer Records</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter table-striped table-sm" id="customers-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Current Balance</th>
                                <th>Member Since</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->points->points }}</td>
                                <td>{{ $customer->created_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center"><h3>No Data Available</h3></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#customers-table').DataTable();
    });
</script>
@endsection