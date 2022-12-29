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
        <form method = "post" action = "{{ route('admin.banks.store') }}">
           @csrf
           <div class="card border-info">
               <div class="card-header border-info f-100">
                 <b>New Bank</b>
               </div>
               <div class="card-body">
               <div class="row">
                <div class="col-md-2">
                    <label>Bank Name</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="bank_name" value = "{{ old('bank_name') }}">
                    @if($errors -> has('bank_name'))
                     <small>
                         <strong>
                         {{ $errors -> first('bank_name') }}
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
