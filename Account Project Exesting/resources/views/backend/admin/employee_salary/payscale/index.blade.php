@extends('backend.admin.index')
@section('content')
<div class="container">
@if(Session :: get('success-message'))
 <div class="card mb-2">
     <div class="card-header bg-white">
        <div class = "f-100 font-weight-bold" style = "color:#1dbf73;font-size:20px;">{{ Session :: get('success-message') }}</div>
     </div>
 </div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-roboto">PayScales</div>
                        </div>
                        <div class="col-md-4 text-right">
                            @can('create payroll')
                            <a href="{{ route('admin.salary-management.payscale.create') }}" style = "color:blue;font-weight:700"><i class = "fa fa-plus-circle mr-2"></i>Add New</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell text-center">Title</th>
                                <th class="d-none d-sm-table-cell text-center">Grade</th>
                                <th class="d-none d-sm-table-cell text-center">Start Salary</th>
                                <th class="d-none d-sm-table-cell text-center">Increment rate(%)</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pay_scales as $pay_scale)
                            <tr id="{{ $pay_scale -> id }}">
                                <td class="text-center">{{ $pay_scale -> name }}</td>
                                <td class="text-center">{{ $pay_scale -> grade -> name }}</td>
                                <td class="text-center">{{ $pay_scale -> start_salary }}</td>
                                <td class="text-center">{{ $pay_scale -> increment_percentage }}</td>
                                @if($pay_scale -> status == 0)
                                <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                                @else($pay_scale -> status == 1)
                                <td class="text-center"><span class="badge badge-success">Active</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        @can('view payroll')
                                        <a class="btn btn-sm btn-primary mr-2"
                                            href="{{ route('admin.salary-management.payscale.view',['pay_scale_id' => $pay_scale -> id]) }}"><i class="fas fa-info-circle"></i></a>
                                        @endcan
                                        @can('delete payroll')
                                        <a class="btn btn-sm btn-danger" href="#"
                                            onclick="delete_confirm(event,{{ $pay_scale -> id }})"><i
                                                class="fas fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
function delete_confirm(event,pay_scale_id) {

    event.preventDefault();
    
    Swal.fire({
        title: 'Do you want to delete that payscale?',
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
                url: "{{ route('admin.salary-management.payscale.delete') }}",
                type: "post",
                data: {
                    pay_scale_id: pay_scale_id
                },
                success: function() {
                    Swal.fire('Deleted Successfully!', '', 'success');
                    $('#' + pay_scale_id).remove();
                }
            })
        }
    })
}
</script>
@endpush