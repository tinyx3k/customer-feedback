<div class="modal fade" id="createModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create New Role Permission</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <form action="{{route ('role_permission.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="required">Select Role:</label>
               <select class="form-control" name="role_id" required>
                  <option selected disabled>Select Role</option>
                  @foreach($role as $roles)
                  <option value="{{$roles->id}}">{{$roles->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
             @foreach($permission as $permissions)
                <div class="form-check col-md-3">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="role_id" value="{{$permissions->id}}">
                  <label class="form-check-label" for="exampleCheck1">{{$permissions->name}}</label>
                </div>
             @endforeach
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
