@extends('layouts.dashmix')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="block block-rounded block-bordered block-fx-shadow">
            <div class="block-header bg-info-op">
                <h3 class="block-title">Users List</h3>
                <div class="block-options">
                    <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-plus-circle mr-1"></i>Create New User</a>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created By:</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user::includes._edit_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.datatable') }}',
            columns : [
                {data: 'name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'status'},
                {data: 'created_by'},
                {data: 'action', orderable: false, searchable: false}
            ],
        });
        $(document).on('click', '[id=btnEditUser]', function(){
            var id = $(this).data('id');
            var route = "{{ url('/user') }}/"+id;
            if (id) {
                $.ajax({
                method: 'get',
                url: route,
                jsonp: false,
                success: function(result){
                    $('[id=user_id]').val(result.id);
                    $('[id=first_name]').val(result.first_name);
                    $('[id=last_name]').val(result.last_name);
                    $('[id=middle_name]').val(result.middle_name);
                    $('[id=address1]').val(result.address1);
                    $('[id=city]').val(result.city);
                    $('[id=province]').val(result.province);
                    $('[id=email]').val(result.email);
                    $('[id=mobile]').val(result.mobile);
                    $('[id=role_id]').val(result.role_id);
                    $('[id=editModal]').modal();
                }
                });
            }
        });
    });
</script>
@endsection
