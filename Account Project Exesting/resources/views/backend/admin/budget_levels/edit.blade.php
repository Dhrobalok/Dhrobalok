@extends('backend.admin.index')
@section('content')
<div class="container-fluid" style="box-shadow:0 0 5px 2px #666;">
    @if(Session :: get('message') != NULL)
    <div class="alert alert-success">
        {{ Session :: get('message') }}
        @php
        Session :: put('message',NULL);
        @endphp
    </div>
    @endif
    <div class="block-content block-content-full">
        <form method = "post" action = "{{ route('budget-levels.update', $level -> id ) }}">
           @method('PATCH')
           @csrf
            <div class="row">
                <div class="col-md-2">
                    <label>Project Label</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" value = "{{ $level -> name }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control"
                        style="background-color:#1dbf73">Update</button>
                </div>
            </div>


        </form>
    </div>
</div>
@endsection
