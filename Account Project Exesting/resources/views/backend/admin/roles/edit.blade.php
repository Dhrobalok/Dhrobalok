@extends('backend.admin.index')

@section('content')
    <!-- Hero -->
    <!-- <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">DataTables Example</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Examples</li>
                        <li class="breadcrumb-item active" aria-current="page">Plugin</li>
                    </ol>
                </nav>
            </div>
       </div>
    </div> -->
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

        <!-- Dynamic Table Full -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Role</h3>
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>

            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @method('PATCH') 
                @csrf

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}"/>
                    </div>
                </div>

           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center py-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
        <!-- END Dynamic Table Full -->

        </div>
    <!-- END Page Content -->

@endsection

