@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Redeem Records</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter table-striped table-sm" id="redeems-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Customer</th>
                                <th>Admin/Cashier</th>
                                <th>Points Spent</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redeems as $redeem)
                            <tr>
                                <td>{{$redeem->item->name}}</td>
                                <td>{{$redeem->user->first_name.' '.$redeem->user->last_name}} PTS</td>
                                <td>{{$redeem->redeemed_by}}</td>
                                <td>{{$redeem->points_spent}} PTS</td>
                                <td>{{ date('Y-m-d H:i:s', strtotime($redeem->created_at)+36000) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Earn Records</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter table-striped table-sm" id="earned-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Customer</th>
                                <th>Admin/Cashier</th>
                                <th>Points Earned</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($earned_points as $earned)
                            <tr>
                                <td>{{$earned->item->name}}</td>
                                <td>{{$earned->user->first_name.' '.$earned->user->last_name}} PTS</td>
                                <td>{{$earned->redeemed_by}}</td>
                                <td>{{$earned->points_redeemed}} PTS</td>
                                <td>{{ date('Y-m-d H:i:s', strtotime($earned->created_at)+36000) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Bonus Records</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter table-striped table-sm" id="bonus-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Admin/Cashier</th>
                                <th>Points Added</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bonus_points as $bonus)
                            <tr>
                                <td>{{$bonus->user->first_name.' '.$bonus->user->last_name}}</td>
                                <td>{{$bonus->added_by}}</td>
                                <td>{{$bonus->points_added}} PTS</td>
                                <td>{{ date('Y-m-d H:i:s', strtotime($bonus->created_at)+36000) }}</td>
                            </tr>
                            @endforeach
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
        $('#redeems-table').DataTable({
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50],[5, 10, 25, 50]]
        });
        $('#earned-table').DataTable({
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50],[5, 10, 25, 50]]
        });
        $('#bonus-table').DataTable({
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50],[5, 10, 25, 50]]
        });
    });
</script>
@endsection