@extends('layouts.dashmix')
@section('style')
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
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @forelse($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        <option selected disabled>Please add item categories on Categories Page</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ingredients</label>
                                    <input type="text" class="form-control" name="ingredients" required>
                                </div>
                                <div class="form-group">
                                    <label>Actual Item Price</label>
                                    <input type="text" class="form-control" name="price" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
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
@stop