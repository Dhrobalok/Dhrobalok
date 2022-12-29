@extends('backend.admin.index')
@section('content')
<div class="container-fluid" style="box-shadow:0 0 5px 2px #666;">
    
    <div class="block-content block-content-full">
      
        <form method="post" action="{{ route('admin.salary-segment.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label>Name</label>
                </div>
                <div class="col-md-4">
                    <label>Type</label>
                </div>
                <div class="col-md-4">
                    <label>Is Percentage</label>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if($errors -> has('name'))
                    <small>
                        <strong>
                            {{ $errors -> first('name') }}
                        </strong>
                    </small>
                    @endif
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="type_id">
                      @foreach($types as $type)
                      <option value = {{ $type -> id }}>{{ $type -> name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name = "is_percentage">
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control"
                        style="background-color:#1dbf73">Save</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection