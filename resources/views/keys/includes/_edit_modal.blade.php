<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit API</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" id="search-form" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name" class="required">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Fields</label><br>
                        <button type="button" class="btn btn-success btn-sm btn-round" id="btnfieldsEdit">Add Field</button>
                    </div>
                    <div class="form-group label-floating" id="children_edit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
