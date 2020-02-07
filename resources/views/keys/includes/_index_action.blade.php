
   @ability('Super Admin', 'edit_key')
    <button type="button" data-id="{{$api->id}}" id="btnEditRoles" class="btn btn-sm btn-warning">Edit</button>
    @endability
    @ability('Super Admin', 'delete_key')
    <form style="display:inline;" method="POST" action="{{ route('key.destroy', $api->id) }}"  onsubmit="confirm('Do you want to delete this api?')">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
    @endability
