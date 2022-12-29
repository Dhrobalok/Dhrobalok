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

    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <div class="f-roboto">Roles and Permissions</div>
            <!-- <a href="{{ route('roles.create') }}"><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Role"></i></a> -->
        </div>

        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">SL No.</th>
                        <th class="text-center">Role</th>
                        <th class="d-none d-sm-table-cell text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td class="text-center">{{$role->id}}</td>
                        <td class="text-center">
                            {{ $role->name }}
                        </td>
                       
                        <td class="d-none d-sm-table-cell text-center">
                           <div class = "btn-group">
                               @can('edit roles') 
                              <a href = "{{ route('permission-settings',['role_id' => $role -> id]) }}" class = "btn btn-sm btn-primary custom-space"><i class="fa fa-cog"></i></a>
                               {{-- <a href = "{{ route('roles.edit',['role' => $role -> id]) }}" class = "btn btn-success custom-space"><i class="far fa-edit"></i></a>  --}}
                              <a href = "{{ route('role-base-user-assign',['role_id' => $role -> id]) }}" class = "btn btn-sm btn-dark custom-space"><i class="fas fa-user"></i></a>
                               @endcan 
                           </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection

@push('css')
  <style>
    .custom-space
    {
       margin-right:10px;
    }
  </style>
@endpush