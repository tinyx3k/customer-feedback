@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Item Records</h3>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter table-striped table-sm" id="items-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Equivalent Points</th>
                                <th>Redeem Price</th>
                                <th>Actual Price</th>
                                <th width="1%">Image</th>
                                <th>Item Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->points}} PTS</td>
                                <td>{{$item->points_price}} PTS</td>
                                <td>$ {{$item->price}}</td>
                                <td><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid"></td>
                                <td>{{ $item->created_at }}</td>
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
        $('#items-table').DataTable();
    });
</script>
@endsection