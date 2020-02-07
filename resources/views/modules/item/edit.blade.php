@extends('layouts.dashmix')
@section('style')
<link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-bordered block-fx-shadow block-rounded">
                <div class="block-header">
                    <h3 class="block-title">
                        Edit Item
                    </h3>
                </div>
                <div class="block-content">
                    <form method="post" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Equivalent Points</label>
                                    <input type="number" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="points" value="{{ $item->points }}" required>
                                </div>
                                @if($item->item_type == 'Combo')
                                <div class="form-group" id="items_container">
                                    <label>Select Items in Combo</label>
                                    <select name="items_combo[]" id="items_combo" multiple class="form-control" style="width: 100%">
                                        @forelse($items as $item_i)
                                        <option value="{{ $item_i->id }}" {{ in_array($item_i->id, $items_content) ? 'selected' : '' }}>{{ $item_i->name }}</option>
                                        @empty
                                        <option value="" selected disabled>No items available</option>
                                        @endforelse
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Redeem Points Price</label>
                                    <input type="number" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="points_price" value="{{ $item->points_price }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Actual Item Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                                </div>
                                <div class="form-group">
                                    <label>Item Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="item_image">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info"><i class="fa fa-save mr-1"></i>Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="{{asset('js/plugins/select2/js/select2.min.js')}}"></script>
@if($item->item_type == 'Combo')
<script>
    $('#items_combo').select2();
</script>
@endif
@stop
