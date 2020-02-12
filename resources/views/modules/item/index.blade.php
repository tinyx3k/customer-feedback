@extends('layouts.dashmix')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="block block-fx-shadow block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title">Item Management</h3>
                    <div class="block-options">
                        <a href="{{ route('item.create') }}" class="btn btn-success">Add New Item</a>
                    </div>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
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
                            @foreach($items as $item)
                            <tr>
                                <td><a href="{{ route('item.show', $item->id) }}">{{$item->name}}</a></td>
                                <td>PHP {{$item->price}}</td>
                                <td><img src="{{ asset('/') .'img/item_images/'. $item->image }}" alt="{{ $item->name }}" class="img-fluid"></td>
                                <td class="text-center">
                                    <a href="{{ route('item.show-expressions', $item->id) }}" class="btn btn-success"><i class="fa fa-chart-bar mr-1"></i>View Dominant Expression</a>
                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pencil-alt mr-1"></i>Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-delete" data-id="{{$item->id}}"><i class="fa fa-trash mr-1"></i>Delete</a>
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#items-table').DataTable();
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