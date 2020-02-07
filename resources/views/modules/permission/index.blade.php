@extends('layouts.dashmix')
@section('content')
<div class="block">
    <div class="block-content">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="display: inline;">Permission Lists</h5>
                        <button class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#createModal">Create New Permission</button>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped w-100" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('permission::includes._create_modal')
@include('permission::includes._edit_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('permission.datatable') }}',
            columns : [
                {data: 'name'},
                {data: 'action', orderable: false, searchable: false}
            ],
        });
          $(document).on('click', '[id=btnEditPermission]', function(){
            var id = $(this).data('id');
            var route = "{{ url('/permission') }}/"+id;
            if (id) {
                $.ajax({
                method: 'get',
                url: route,
                jsonp: false,
                success: function(result){
                    $('[id=user_id]').val(result.id);
                    $('[id=name]').val(result.name);
                    $('[id=description]').val(result.description);
                    $('[id=editModal]').modal();
                }
                });
            }
        });
    });
</script>
@endsection
