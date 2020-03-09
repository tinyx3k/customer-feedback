@extends('layouts.dashmix')
@section('styles')
<style type="text/css">
</style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        @foreach($categories as $key => $category)
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="block block-rounded mb-1">
                <div class="block-header block-header-default" role="tab" id="accordion_h_{{$category->id}}">
                    <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q_{{$category->id}}" aria-expanded="true" aria-controls="accordion_q_{{$category->id}}">{{ $category->name }}</a>
                </div>
                <div id="accordion_q_{{$category->id}}" class="collapse {{ $key == 0 ? 'show':'' }}" role="tabpanel" aria-labelledby="accordion_h_{{$category->id}}" data-parent="#accordion">
                    <div class="block-content">
                        <div class="row">
                            @foreach($category->items as $item)
                            <div class="col-6 col-lg-4 col-md-4">
                                <a href="{{ auth()->user()->email == 'admin@admin.com' ? 'javascript:void(0);' : route('item.question', $item->id) }}" class="block block-rounded block-fx-shadow block-bordered text-center bg-primary-op" {{ auth()->user()->email == 'admin@admin.com' ? 'data-toggle=modal data-target=#modal-'.$item->id : '' }}>
                                    <div class="block-content block-content-full aspect-ratio-1-1 d-flex justify-content-center align-items-center">
                                        <div>
                                            <div class="font-size-h1 font-w300 text-white"><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-avatar img-avatar96"></div>
                                            <div class="font-w600 mt-2 text-uppercase text-white-75">{{ $item->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="modal" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="block block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">{{$item->name}}</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <h2>Ingredients</h2>
                                                <div class="bordered rounded">
                                                    @php
                                                    $ingredients = explode(',', $item->ingredients)
                                                    @endphp
                                                    <ul>
                                                    @foreach($ingredients as $ingredient)
                                                    <li>{{ $ingredient }}</li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="block-content block-content-full text-right bg-light">
                                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('modal')
@include('modules.home.includes._google_search_modal')
@endsection
@section('scripts')
@endsection