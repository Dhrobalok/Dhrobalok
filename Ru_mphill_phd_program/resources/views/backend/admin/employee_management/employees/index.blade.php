@extends('backend.admin.index')
@section('content')
@if(Session :: get('success-message'))
 <div class="card mb-2">
     <div class="card-header bg-white">
        <div class = "f-100 font-weight-bold" style = "color:#1dbf73;font-size:20px;">{{ Session :: get('success-message') }}</div>
     </div>
 </div>
@endif
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
              <div class="f-roboto">Employees</div>
            </div>
            <div class="col-md-8 text-right">
              {{-- @can('report employees')
              <a href = "{{ route('employee-list-excel') }}" class = "btn  f-100 mr-2" style = "background:green;color:white"><i class = "fa fa-file-excel mr-2"></i>Employees List(Excel)</a>
              <a href = "{{ route('export-employee-list-pdf') }}" class = "btn btn-danger f-100"><i class = "fa fa-file-pdf mr-2"></i>Employees List(PDF)</a>
              @endcan --}}
              {{-- @can('create employees') 
                <a href = "{{ route('admin.employees.create') }}" class = "f-100" style = "color:blue;font-weight:700"><i class = "fa fa-plus-circle mr-2"></i>Add New</a>
              @endcan
              --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Email</th>
                    <th class="d-none d-sm-table-cell text-center">Mobile No</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Photo</th>
                    <th class="d-none d-sm-table-cell text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                @php
                    $update=App\Models\User::where('student_id',$employee->roll)->first();
                @endphp
                <tr id="{{ $employee -> id }}" class = "text-center">
                    <td class="text-center">{{ $employee -> name }}</td>
                    <td class="text-center">{{ $employee  -> email }}</td>
                    <td class="text-center">{{ $employee -> mobile_no }}</td>
                    @if($update -> status == 0)
                    <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                    @elseif($update -> status == 1)
                    <td class="text-center"><span class="badge badge-success">Active</span></td>
                    @else($employee -> name == 2)
                    <td class="text-center"><span class="badge badge-info">Retired</span></td>
                    @endif
                    <td>
                        <img src = "{{ URL :: to($employee -> employee_photo) }}" height = "100px" width = "100px">
                    </td>
                    <td>
                    <div class="list-group">
                        <a href="#" onclick = "toggle_items(this)" class="list-group-item list-group-item-action active bg-light text-black border-info" aria-current="true">
                            Actions
                        </a>
                        {{-- @can('aprove employees') --}}
                        <a href="{{ route('admin.employees.aprove',['employee_id' => $employee -> roll]) }}" class="list-group-item list-group-item-action" style = "color:green;display:none"><i style = "color:green" class = "fa fa-pencil-alt mr-2"></i>Aprove</a>
                        {{-- @endcan --}}

                        {{-- @can('view employees') --}}
                        <a href="{{ route('admin.employee-management.employees.view',['employee_id' => $employee -> id]) }}" class="list-group-item list-group-item-action" style = "color:blue;display:none"><i style = "color:blue" class = "fa fa-info-circle mr-2"></i>View</a>
                        {{-- <a href="{{ route('admin.employees.details.pdf',['employee_id' => $employee -> id]) }}" class="list-group-item list-group-item-action" style = "color:black;display:none"><i style = "color:black" class = "fa fa-print mr-2"></i>Print</a> --}}
                        {{-- @endcan --}}
                        {{-- @can('edit employees') --}}
                        {{-- <a href="{{ route('admin.employees.edit',['employee_id' => $employee -> id]) }}" class="list-group-item list-group-item-action" style = "color:green;display:none"><i style = "color:green" class = "fa fa-pencil-alt mr-2"></i>Edit</a> --}}
                        {{-- @endcan --}}
                        {{-- @can('delete employees') --}}
                        <a href="{{ route('employees.delete',['employeeid'=>$employee->id]) }}"  class="list-group-item list-group-item-action" style = "color:red;display:none"><i style = "color:red" class = "fa fa-trash-alt mr-2"></i>Delete</a>
                        {{-- @endcan --}}
                        {{-- @can('salary_config payroll') --}}
                        <a href="{{ route('admin.salary-management.payscale.set-employee-payscale',['employee_id' => $employee -> id]) }}"  class="list-group-item list-group-item-action" style ="color:#1dbf73;display:none"><i style ="color:#1dbf73" class = "fa fa-cog mr-2"></i>Configure PayScale</a>
                        {{-- @endcan --}}
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
<script>

    // function delete_confirm(event,employee_id) {

    //     event.preventDefault();
    //     Swal.fire({
    //         title: 'Do you want to delete the employee?',
    //         showCancelButton: true,
    //         confirmButtonText: 'Confirm'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-Token': "{{ csrf_token() }}"
    //                 }
    //             })
    //             $.ajax({
    //                
    //                 type: "post",
    //                 data:
    //                 {
    //                    employee_id : employee_id
    //                 },
    //                 success: function() {
    //                     Swal.fire('Deleted Successfully!', '', 'success');
    //                     $('#' + employee_id).remove();
    //                 }
    //             })
    //         }
    //     })
    // }
function toggle_items(ref)
 {
     $(ref).siblings().toggle();
 }
</script>
@endpush
