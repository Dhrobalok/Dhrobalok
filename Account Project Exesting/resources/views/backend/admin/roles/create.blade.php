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
                <h3 class="block-title">Create Role</h3>
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>

            <form action="{{ route('roles.store')}}" method="post">
            @csrf
               <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" name="name" placeholder="Name"/>
                    </div>
                </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center" style="width: 80px;">Module Name</th>
                            <th colspan="5">Permissions</th>
                        </tr>
                        <tr>
                            <th class="text-center">View</th>
                            <th class="text-center">Add</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                            <th class="text-center">Miscellaneous</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modules as $module)
                            <tr>
                                <td class="text-center">{{$module->name}}</td>
            
                                @foreach ($module->permissions as $value)                        
                                <td class="text-center">
                                    <label>
                                        <input type="checkbox" name="permission[]" id="permission[]" value="{{$value->id}}">
                                    </label>
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </div>
        <!-- END Dynamic Table Full -->

        </div>
    <!-- END Page Content -->

@endsection

