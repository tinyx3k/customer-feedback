<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route ('user.update','update')}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" id="user_id">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="middle_name">Middle Name:</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="address1" class="required">House #/Building/Street:</label>
                            <input type="text" class="form-control" id="address1" placeholder="House #/Building/Street" name="address1" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="city" class="required">City:</label>
                            <input type="city" class="form-control" id="city" placeholder="City" name="city" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="province" class="required">Province:</label>
                        <input type="province" class="form-control" id="province" placeholder="Province" name="province" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="required">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="required">Role:</label>
                        <select name="role_id" class="form-control" id="role_id">
                            @foreach($roles as $role)
                            @php
                                if ($role->name === 'Super Admin' || $role->name === 'Member') continue;
                            @endphp
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
