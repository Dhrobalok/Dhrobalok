@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="f-roboto">Add New Cost Center</div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('cost-center-index') }}" class='btn btn-sm btn-info f-100'><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cost-center.store') }}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Type </label>
                            </div>
                            <div class="col-md-5">
                                <select class = "form-control" name = "type_id">
                                    @foreach($types as $type)
                                    <option value = "{{ $type -> id }}">{{ $type -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Name </label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="name" class="form-control" placeholder="Center Name" value = "{{ old('name') }}">
                                <small class = "text-danger f-100 text-left font-weight-bold">
                                   @if($errors  -> any('name'))
                                     {{ $errors -> first('name')}}
                                   @endif
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Code</label>
                            </div>
                            <div class="col-md-5">
                                <input type = "text" name="code" class="form-control"
                                    placeholder="Code" value = "{{ old('code') }}">
                                <small class="text-danger f-100 text-left font-weight-bold">
                                    @if($errors -> any('code'))
                                    {{ $errors -> first('code') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4 text-right">
                                <label>Description</label>
                            </div>
                            <div class="col-md-5">
                                <textarea name="description" class="form-control"
                                    placeholder="Short Description">{{ old('description') }}</textarea>
                                <small class="text-danger f-100 text-left font-weight-bold">
                                    @if($errors -> any('description'))
                                    {{ $errors -> first('description') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row text-center form-group">
                            <div class="col-md-12">
                                <button class="btn btn-info pl-4 pr-4 pt-2 pb-2 f-100"><i
                                        class="fa fa-save mr-2"></i>Save Record</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection