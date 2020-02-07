@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <div class="card-header">
                    <h4 class="title">Edit Role</h4>
                    <p class="category">Please fill the fields</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" class="required">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
                                </div>
                            </div>
                        </div>
                         <button type="submit" class="btn btn-success pull-right">Save</button>
                         <a href="{{route('role.index')}}" class="btn btn-default pull-left">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
