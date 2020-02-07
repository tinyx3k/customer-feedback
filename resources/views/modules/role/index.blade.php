@extends('layouts.dashmix')
@section('content')
<div class="block">
    <div class="block-content">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="display: inline;">Role Lists</h5>
                        <button class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#createModal">Create New Role</button>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
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
@include('role::includes._create_modal')
@include('role::includes._edit_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('role.datatable') }}',
            columns : [
                {data: 'name'},
                {data: 'status'},
                {data: 'action', orderable: false, searchable: false}
            ],
        });
          $(document).on('click', '[id=btnEditRoles]', function(){
            var id = $(this).data('id');
            var route = "{{ url('/role') }}/"+id;
            if (id) {
                $.ajax({
                method: 'get',
                url: route,
                jsonp: false,
                success: function(result){
                    $('[id=user_id]').val(result.id);
                    $('[id=name]').val(result.name);
                    $('[id=editModal]').modal();
                }
                });
            }
        });
    });
</script>
@endsection
