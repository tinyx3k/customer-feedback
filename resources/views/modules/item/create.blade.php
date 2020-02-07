@extends('layouts.dashmix')
@section('style')
<link rel="stylesheet" href="{{asset('js/plugins/select2/select2.min.css')}}">
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-bordered block-rounded block-fx-shadow">
                <div class="block-header">
                    <h3 class="block-title">Add New Item</h3>
                </div>
                <div class="block-content">
                    <form method="post" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Item Type</label>
                                    <select name="item_type" id="item_type" class="form-control" required>
                                        <option value="Single">Single</option>
                                        <option value="Combo">Combo</option>
                                    </select>
                                </div>
                                <div class="form-group" id="items_container" disabled="disabled" hidden="hidden">
                                    <label>Select Items in Combo</label>
                                    <select name="items_combo[]" id="items_combo" multiple class="form-control" style="width: 100%">
                                        @forelse($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                        <option value="" selected disabled>No items available</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Equivalent Points</label>
                                    <input type="number" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="points" required>
                                </div>
                                <div class="form-group">
                                    <label>Redeem Points Price</label>
                                    <input type="number" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="points_price" required>
                                </div>
                                <div class="form-group">
                                    <label>Actual Item Price</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label>Item Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="item_image" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success"><i class="fa fa-save mr-1"></i>Save New Item</button>
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
<script src="{{asset('js/plugins/select2/select2.min.js')}}"></script>
<script>
    $('#items_combo').select2();
    $('#item_type').on('change', function() {
        if($(this).val() == 'Combo'){
            $('#items_container').removeAttr('disabled');
            $('#items_container').removeAttr('hidden');
        }else{
            $('#items_container').attr('hidden', 'hidden');
            $('#items_container').attr('disabled', 'disabled');
        }
    });
</script>
@stop