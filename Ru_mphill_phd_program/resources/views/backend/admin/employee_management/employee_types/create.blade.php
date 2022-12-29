@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
   
    <div class="block-content block-content-full">
        <form method = "post" action = "{{ route('admin.employee-management.employee-type.store') }}">
           @csrf
           <div class="card border-info">
              <div class="card-header border-info">
                 <b class = "f-100">New Employee Type/Class</b>
              </div>
             <div class="card-body">
             <div class="row justify-content-center">
                <div class="col-md-2">
                    <label>Type Name</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" value = "{{ old('name') }}">
                    @if($errors -> has('name'))
                     <small>
                         <strong>
                         {{ $errors -> first('name') }}
                         </strong>
                     </small>
                    @endif
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control"
                        style="background-color:#1dbf73">Save</button>
                </div>
            </div>
             </div>
           </div>
        </form>
    </div>
</div>
@endsection
