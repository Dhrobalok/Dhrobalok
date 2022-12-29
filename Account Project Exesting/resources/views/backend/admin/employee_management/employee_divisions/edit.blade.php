@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="row">
                        <div class="col-md-8">
                           <div class="f-roboto">Update Division</div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href = "{{ route('admin.employees.division.index') }}" class = "btn btn-primary btn-sm f-100 text-white"><i class = "fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.employees.division.update',['division_id' => $division -> id]) }}" method="post">
                        @csrf
                        <div class="row text-center form-group">
                            <div class="col-md-4 text-right">
                                <label>Division Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6 text-left">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name',$division -> name) }}">
                                @if($errors -> has('name'))
                                <small>{{ $errors -> first('name') }}</small>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row text-center form-group">
                            <div class="col-md-4 text-right">
                                <label>Description<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-6 text-left">
                                <textarea class="form-control"
                                    name="description">{{ old('description',$division -> description) }}</textarea>
                                @if($errors -> has('description'))
                                <small>{{ $errors -> first('description') }}</small>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-block f-100 text-white"
                                    style="background:#1dbf73;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
 <style>
     small
     {
         color:red;
         font-size:18px;
         font-family:'Gentium Basic'
     }
 </style>
@endpush