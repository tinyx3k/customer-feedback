@extends('layouts.dashmix')
@section('content')
<div class="block">
    <div class="block-content">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="content-heading">
          <i class="fa fa-angle-right text-muted mr-1"></i> Role Permission
          </h2>
           @forelse ($roles as $role)
          <form action="{{ route('role_permission.store') }}" method="post" >
            @csrf
             <input type="hidden" name="role_id" value="{{$role->id}}">
           <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{$role->name}} <small>Permission</small></h3>
                        <a href="#" class="pull-right select_all" data-selected="true" data-id="{{$role->id}}"> Select All</a>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-10">
                        <span class="badge badge-pill badge-success">Role</span>
                        <span class="badge badge-pill badge-warning">Permission</span>
                        <span class="badge badge-pill badge-danger">User</span>
                        <span class="badge badge-pill badge-primary">Article</span>
                        <span class="badge badge-pill bg-primary-light" style="color: white">Spin Wizard</span>
                        <span class="badge badge-pill badge-secondary">Video</span>
                        <span class="badge badge-pill bg-danger-light">Submission Cost</span>
                        <span class="badge badge-pill bg-warning-light">Social Media</span>
                        <span class="badge badge-pill bg-primary-darker" style="color: white">Activity Log</span>
                        <span class="badge badge-pill bg-muted" style="color: white">Credit</span>
                        <span class="badge badge-pill bg-xmodern-lighter" style="color: white">Web</span>
                        <span class="badge badge-pill bg-xeco-dark" style="color: white">Key</span>
                        <span class="badge badge-pill bg-xsmooth-light" style="color: white">PDF</span>
                        <span class="badge badge-pill bg-gd-aqua" style="color: white">Press Release</span>
                        <span class="badge badge-pill bg-xeco-light" style="color: white">Blog Posting</span>
                        </div>
                    </div><br>
                    <div class="block-content">
                      <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-1"></div>
                          <div class="col-md-3">
                            <div id="checkboxlist">
                              @php
                                $results = $role_permissions->where('permission_id', $permission->id)->where('role_id', $role->id)->first();
                                $checked = $results ? 'checked' : '';
                              @endphp
                              @if(strpos($permission, 'article') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill badge-primary">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'role') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill badge-success">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'permission') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill badge-warning">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'user') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill badge-danger">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'video') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill badge-secondary">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'submission-cost') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-danger-light">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'social-media') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-warning-light">{{$permission->name}}</span></label>
                              </div>
                               @elseif(strpos($permission, 'spinwizard') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-primary-light" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'activity') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-primary-darker" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'credit') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-muted" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'web') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-xmodern-lighter" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'key') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-xeco-dark" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'pdf') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-xsmooth-light" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'pressrelease') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-gd-aqua" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @elseif(strpos($permission, 'blog-posting') == true)
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill bg-xeco-light" style="color: white">{{$permission->name}}</span></label>
                              </div>
                              @else
                              <div class="custom-control custom-checkbox custom-control-primary mb-1">
                                  <input type="checkbox" class="custom-control-input select_all_{{$role->id}}" id="role-permission-{{$role->id . $permission->id}}" {{$checked}} name="permissions[]" value="{{$permission->id}}">
                                  <label class="custom-control-label" for="role-permission-{{$role->id . $permission->id}}"><span class="badge badge-pill">{{$permission->name}}</span></label>
                              </div>
                              @endif
                            </div>
                          </div><br><br>
                        @endforeach
                      </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light">
                        @ability('Super Admin', 'create_role_permission')
                        <button type="submit" onClick="return confirm('Are the details correct?');" class="btn btn-sm btn-primary fa-pull-right">Save</button>
                        @endability
                    </div>
                </div>
            </div>
          </form>
        @empty
          <p>No Roles defined</p>
        @endforelse
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
  $('.select_all').on('click', function(){
    var select_id = $(this).data('id');
    if ($(this).data('selected') == 'false') {
        $(this).data('selected', 'true');
        $('.select_all_'+select_id).prop('checked', true);

    } else {
        $(this).data('selected', 'false');
         $('.select_all_'+select_id).prop('checked', false);
    }

  })
  // $(":checkbox").on("click", function() {
  //     var that = this;
  //     $(this).parent().css("background-color", function() {
  //         return that.checked ? "#00bcd45c" : "";
  //     });
  // });


  // function myFunction() {
  //   var str = $(this).data('id');
  //   var n = str.search("article");
  //   document.getElementById("select_id").innerHTML = n;
// }

</script>
@endsection
