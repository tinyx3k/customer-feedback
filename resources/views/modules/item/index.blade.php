@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
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
                                
                                <table class="table table-bordered table-vcenter table-striped table-sm" id="items-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th width="1%">Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category->items as $item)
                                        <tr>
                                            <td><a href="{{ route('item.show-expressions', $item->id) }}">{{$item->name}}</a></td>
                                            <td>PHP {{$item->price}}</td>
                                            <td><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid"></td>
                                            <td class="text-center">
                                                <a href="{{ route('item.show-expressions', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye mr-1"></i>View Expressions and Predictive Analysis</a>
                                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt mr-1"></i>Edit</a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-delete" data-id="{{$item->id}}"><i class="fa fa-trash mr-1"></i>Delete</a>
                                                <form id="form-delete-{{$item->id}}" method="post" action="{{ route('item.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
$('.table').DataTable();
});
$(document).on('click','.btn-delete',function(){
    var id  = $(this).data('id')
    console.log(id)
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            $('#form-delete-'+id).submit()
        }
        })
})
</script>
@endsection