@extends('backend.admin.index')
@section('content')
<div class="container-fluid" style="box-shadow:0 0 5px 2px #666;">
    
    <div class="block-content block-content-full">
      
        <form method="post" action="{{ route('admin.salary-segment.update',['segment_id' => $segment -> id]) }}">
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
                    <input type="text" class="form-control" name="name" value="{{ old('name',$segment -> name) }}">
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
                       @if($segment -> type_id == $type -> id)
                       <option value = {{ $type -> id }} selected>{{ $type -> name }}</option>
                       @else
                      <option value = {{ $type -> id }}>{{ $type -> name }}</option>
                      @endif
                      @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name = "is_percentage">
                        @if($segment -> is_percentage == 0)
                         <option value=0 selected>No</option>
                         <option value=1>Yes</option>
                        @else
                        <option value=1 selected>Yes</option>
                        <option value=0>No</option>
                        @endif
                       
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control"
                        style="background-color:#1dbf73">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection