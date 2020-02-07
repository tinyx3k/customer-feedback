@extends('layouts.dashmix')
@section('content')
<div class="block">
    <div class="block-content">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="display: inline;">Api Lists</h5>
                        <button class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#createModal">Create New Api</button>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="datatable">
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
@include('key::includes._create_modal')
@include('key::includes._edit_modal')
@endsection
@section('scripts')
<script>

    var field_count = $('.field_count').length;
    $(function(){
        $('#btnfields').click(function(){
            var childRow =  '<div class="row">'+
                                '<div class="col-md-12">'+
                                    '<input type="text" id="field_count_'+field_count+'" class="form-control field_count" name="fields[]">'+
                                    '<a href="#" id="btnRemoveField">Remove</a>'+
                                '</div>'+
                            '<hr></div>';
            $('#children').prepend(childRow);
            field_count++;
        });
    });


    var field_count_edit = $('.field_count_edit').length;
    $(function(){
        $('#btnfieldsEdit').click(function(){
            var childRowx =  '<div class="row fx">'+
                                '<div class="col-md-12">'+
                                    '<input type="text" id="edit_field_count_'+field_count+'" class="form-control field_count_edit" name="fields[]">'+
                                    '<a href="#" id="btnRemoveField">Remove</a>'+
                                '</div>'+
                            '<hr></div>';
            $('#children_edit').prepend(childRowx);
            field_count_edit++;
        });
    });

    $(document).on('click','[id=btnRemoveField]', function(){
        $(this).parent().parent().remove();
    });

    $(document).ready(function(){
        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('key.datatable') }}',
            columns : [
                {data: 'name'},
                {data: 'action', orderable: false, searchable: false}
            ],
        });
          $(document).on('click', '[id=btnEditRoles]', function(){
            var id = $(this).data('id');
            var route = "{{ url('/key') }}/"+id;
            if (id) {
                $.ajax({
                method: 'get',
                url: route,
                jsonp: false,
                success: function(result){

                    $('.fx').remove();

                    $('#search-form').attr('action', '/key/' + result.id);

                    $('[id=name]').val(result.name);

                    var field_count = 0;

                    $.each(result.fields, function(key, val){

                            var childRow =  '<div class="row fx">'+
                                '<div class="col-md-12">'+
                                    '<input type="text" id="edit_field_count_'+field_count+'" value="'+val+'" class="field_count_edit form-control" name="fields[]">'+
                                    '<a href="#" id="btnRemoveField">Remove</a>'+
                                '</div>'+
                            '<hr></div>';
                            $('#children_edit').prepend(childRow);
                            field_count++;
                    });

                    $('[id=editModal]').modal();
                }
                });
            }
        });
    });
</script>
@endsection
