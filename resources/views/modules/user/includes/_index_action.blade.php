@if(!$user->roles()->where('name', 'Super Admin')->first())
        @if(empty($user->deleted_at))
@ability('Super Admin', 'edit_user')
        <button type="button" data-id="{{$user->id}}" id="btnEditUser" class="btn btn-sm btn-warning">Edit</button>
@endability
@ability('Super Admin', 'delete_user')
          <form style="display:inline;" method="POST" action="{{ route('user.destroy', $user->id) }}" onsubmit="return confirm('Do you want to delete this user?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
@endability
             @else
@ability('Super Admin', 'restore_user')
            <form style="display:inline;" method="POST" action="{{route('userRestore')}}"  onsubmit="confirm('Do you want to restore this User')">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-sm btn-success">Restore</button>
@endability
        </form>
            @endif
@endif
