@extends('backend.admin.index')
@section('content')
<div class="container-fluid" style="box-shadow:0 0 5px 2px #666;">
    
    <div class="block-content block-content-full">
      
        <form method="post" action="{{ route('admin.loan.types.update',['type_id' => $type -> id]) }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label>Name</label>
                </div>
                <div class="col-md-4">
                    <label>Interest Rate</label>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                </div>
               
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" value="{{ old('name',$type -> name) }}">
                    @if($errors -> has('name'))
                    <small>
                        <strong>
                            {{ $errors -> first('name') }}
                        </strong>
                    </small>
                    @endif
                </div>
                <div class="col-md-4">
                   <input type = "number" class = "form-control" name = "interest_rate" value = "{{ old('interest_rate',$type -> interest_rate)}}">
                   @if($errors -> has('interest_rate'))
                    <small>
                        <strong>
                            {{ $errors -> first('interest_rate') }}
                        </strong>
                    </small>
                    @endif
                </div>
                <div class="col-md-4">
                    <select class="form-control" name = "status">
                        @if($type -> status == 0)
                         <option value=0 selected>Inactive</option>
                         <option value=1>Active</option>
                        @else
                        <option value=1 selected>Active</option>
                        <option value=0>Inactive</option>
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