<div class="modal fade" id="createModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create API</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{route ('key.store')}}" method="POST">
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="name" class="required">Name:</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label>Fields</label><br>
            <button type="button" class="btn btn-success btn-sm btn-round" id="btnfields">Add Field</button>
          </div>
          <div class="form-group label-floating" id="children">
            <div class="row">
              <div class="col-md-12">
                <input type="text" id="field_count" class="form-control field_count" name="fields[]"><a href="#" id="btnRemoveField">Remove</a>
              </div>
              <hr>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
