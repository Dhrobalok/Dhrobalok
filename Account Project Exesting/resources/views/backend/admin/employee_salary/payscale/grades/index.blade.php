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
              <div class="f-roboto">Employee Grades</div>
            </div>
            <div class="col-md-8 text-right">
                <a href = "{{ route('admin.salary-management.grade.create') }}" class = "f-100" style = "color:blue;font-weight:bold"><i class = "fa fa-plus-circle mr-2"></i>Add New</a>
                
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr class = "text-center text-black">
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Description</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($grades as $grade)
                <tr class = "text-center text-black">
                    <td>{{ $grade -> name }}</td>
                    <td>{{ $grade -> description }}</td>
                    <td>
                        @if($grade -> status == 1)
                          <span class = "badge badge-success">Active</span>
                        @else
                        <span class = "badge badge-dark">Deactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role = "group">
                            <a href = "{{ route('admin.salary-management.grade.edit',['grade_id' => $grade -> id]) }}" class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-alt"></i></a>
                            <a href = "#" onclick = "remove(this,event,{{ $grade -> id }})" class = "btn btn-danger text-white btn-sm"><i class = "fa fa-trash-alt"></i></a>
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
    function remove(ref,event,grade_id)
    {
       event.preventDefault();
       Swal.fire({
            title: 'Do you want to delete the grade?',
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
                    url: "{{ route('admin.salary-management.grade.delete') }}",
                    type: "post",
                    data:
                    {
                        grade_id : grade_id
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