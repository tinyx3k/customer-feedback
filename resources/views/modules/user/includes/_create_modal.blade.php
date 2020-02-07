<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route ('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="required">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input type="mobile" class="form-control" name="mobile" placeholder="Enter email mobile">
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="required">Role:</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                            @php
                                if ($role->name === 'Super Admin' || $role->name === 'Admin' || $role->name === auth()->user()->roles()->first()->name) continue;
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
