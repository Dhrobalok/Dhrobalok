@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->

    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title">Update Category</h3>
            <a class="btn btn-primary f-100" href="{{ route('category.index') }}"><i
                    class="fa fa-angle-left mr-2"></i>Back</a>
        </div>

        <form action="{{ route('category.update',['category' => $account_category -> id])}}" method="post">
            @method('PATCH') 
            @csrf

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="category_name" value = "{{ $account_category -> category_name }}">
                    @if($errors -> any('category_name'))
                      <strong class = "text-danger f-100">Account category name is required</strong>
                    @endif
                </div>
            </div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Category Belongs To</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="category_type" name="category_type" required>
                        <option value = "{{ $account_category -> category_type }}" selected hidden>{{ $account_category -> category_type}}</option>
                        <option value="Revenue">Revenue</option>
                        <option value="Asset">Asset</option>
                        <option value="Expense">Expense</option>
                        <option value="Liability">Liability</option>
                        <option value="Equity">Equity</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit"  class="btn btn-primary f-100">Save Changes</button>
                </div>
            </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->
@endsection