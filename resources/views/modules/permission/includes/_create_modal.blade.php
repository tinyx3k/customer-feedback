<div class="modal fade" id="createModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create New Permission</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <form action="{{route ('permission.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="required">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter permission name" required><br>
            <label for="description" class="required">Descrition:</label>
            <input type="text" class="form-control" name="description" placeholder="Enter permission description" required><br>
            @php
            // <small>
            //   Note: Permission name should match with the url/routes name. Example:
            //   <strong><i>http://payment-gateway.com/user.</i></strong>
            //   Permission name should be
            //   <strong>show_<i>user</i></strong>,
            //   <strong>store_<i>user</i></strong>,
            //   <strong>update_<i>user</i></strong>,
            //   and <strong>delete_<i>user</i></strong>
            // </small>
            @endphp
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
