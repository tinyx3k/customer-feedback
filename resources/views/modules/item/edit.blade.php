@extends('layouts.dashmix')
@section('style')
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
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @forelse($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @empty
                                        <option selected disabled>Please add item categories on Categories Page</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ingredients</label>
                                    <input type="text" class="form-control" name="ingredients" value="{{ $item->ingredients }}">
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
@stop
