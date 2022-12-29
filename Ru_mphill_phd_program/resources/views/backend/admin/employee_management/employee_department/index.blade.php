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
              <div class="f-roboto">Employee Departments</div>
            </div>
            <div class="col-md-8 text-right">
                <a href = "{{ route('admin.employees.department.create') }}" class = "f-100" style = "color:blue;font-weight:bold"><i class = "fa fa-plus-circle mr-2"></i>Add New</a>
                
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr class = "text-center text-black">
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Description</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($departments as $department)
                <tr class = "text-center text-black">
                    <td>{{ $department -> name }}</td>
                    <td>{{ $department -> description }}</td>
                    <td>
                        <div class="btn-group" role = "group">
                            <a href = "{{ route('admin.employees.department.edit',['department_id' => $department -> id]) }}" class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-alt"></i></a>
                            <a href = "#" onclick = "remove(this,event,{{ $department -> id }})" class = "btn btn-danger text-white btn-sm"><i class = "fa fa-trash-alt"></i></a>
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
    function remove(ref,event,department_id)
    {
       event.preventDefault();
       Swal.fire({
            title: 'Do you want to delete the department?',
            showCancelButton: true,
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('admin.employees.department.delete') }}",
                    type: "post",
                    data:
                    {
                        department_id : department_id
                    },
                    success: function() {
                        Swal.fire('Deleted Successfully!', '', 'success');
                        $(ref).closest('tr').remove();
                    }
                })
            }
        })
    }
</script>
@endpush