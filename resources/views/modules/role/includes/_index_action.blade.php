
    @if(empty($role->deleted_at))
   {{--   @if(empty($role->deleted_at) && auth()->user()->where('role_id','!=', '')) --}}
   @ability('Super Admin', 'edit_role')
    <button type="button" data-id="{{$role->id}}" id="btnEditRoles" class="btn btn-sm btn-warning">Edit</button>
    @endability
    @ability('Super Admin', 'delete_role')
    <form style="display:inline;" method="POST" action="{{ route('role.destroy', $role->id) }}"  onsubmit="confirm('Do you want to delete this role?')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
    @endability
   {{--  @elseif(empty($role->deleted_at) && Auth::user()->where('role_id','==', 'Member'))

     <button type="button" data-id="{{$role->id}}" id="btnEditRoles" class="btn btn-sm btn-warning">Edit</button> --}}

    @else
    @ability('Super Admin', 'restore_role')
    <form style="display:inline;" method="POST" action="{{ route('roleRestore') }}"  onsubmit="confirm('Do you want to restore this role?')">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="id" value="{{$role->id}}">
        <button type="submit" class="btn btn-sm btn-success">Restore</button>
    </form>
    @endability
    @endif

