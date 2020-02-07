
{{--     @if(empty($role->deleted_at)) --}}
   {{--   @if(empty($role->deleted_at) && empty($user->id)) --}}
@ability('Super Admin', 'edit_permission')
    <button type="button" data-id="{{$permission->id}}" id="btnEditPermission" class="btn btn-sm btn-warning">Edit</button>
@endability
@ability('Super Admin', 'delete_permission')
    <form style="display:inline;" method="POST" action="{{ route('permission.destroy', $permission->id) }}"  onsubmit="confirm('Do you want to delete this Permission?')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
@endability
    {{-- @elseif(empty($role->deleted_at) && Auth::user()->roles()->first() ))

     <button type="button" data-id="{{$role->id}}" id="btnEditRoles" class="btn btn-sm btn-warning">Edit</button> --}}
    {{-- @else
    <form style="display:inline;" method="POST" action="{{ route('roleRestore') }}"  onsubmit="confirm('Do you want to restore this role?')">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="id" value="{{$role->id}}">
        <button type="submit" class="btn btn-sm btn-success">Restore</button>
    </form>
    @endif --}}
