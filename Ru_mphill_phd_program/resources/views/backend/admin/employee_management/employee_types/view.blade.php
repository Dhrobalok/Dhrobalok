@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    @if(Session :: get('message') != NULL)
    <div class="alert alert-success">
        {{ Session :: get('message') }}
        @php
        Session :: put('message',NULL);
        @endphp
    </div>
    @endif
    <div class="block-content block-content-full">
        <form method="post"
            action="{{ route('admin.employee-management.employee-type.update',['type_id' => $employee_type -> id]) }}">
            @csrf
            <div class="card border-info">
                <div class="card-header border-info">
                    <b class="f-100">Update Employee Type/Class</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Name</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="name" value="{{ $employee_type -> name }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success form-control"
                                style="background-color:#1dbf73">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection