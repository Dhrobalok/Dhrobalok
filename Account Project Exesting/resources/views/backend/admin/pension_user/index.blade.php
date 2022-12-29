@extends('backend.admin.index')
@section('content')
@if(Session :: get('message'))
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <div class="block-title" style = "color:#1dbf73">{{ Session :: get('message') }}</div>

    </div>
</div>
@endif
<div class="block block-rounded">

    <div class="block-header block-header-default">
        <h3 class="block-title">Employee Wise Pensions</h3>
        @can('create pension')
        <a href="{{route('admin.pension-users.create')}}"><i class="fa fa-plus" style="float: right;"
                data-toggle="tooltip" title="New Pension"></i></a>
        @endcan
    </div>
    <div class="block-content block-content-full">
        <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Retired Date</th>
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Basic Pension</th>
                    <th class="d-none d-sm-table-cell text-center">Health Allowance</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                <tr id="{{ $user -> employee_id }}">
                    <td class="text-center">{{ date('Y-m-d',strtotime($user -> retd_date)) }}</td>
                    @php
                    $employee = App\Models\Employee::find($user->employee_id);
                    $employee_name = $employee->name;
                    @endphp
                    <td class="text-center">{{ $employee_name }}</td>
                    <td class="text-center">{{ $user -> basic_pension_amount }}</td>
                    <td class = "text-center">{{ $user -> health_fee }}</td>
                    @if($user -> status == 0)
                    <td class="text-center"><span class="badge badge-dark">Under Review</span></td>
                    @elseif($user -> status == 1)
                    <td class="text-center"><span class="badge badge-success">Approved</span></td>
                    @endif
                    <td>
                        <div class="btn-group">
                            @can('view pension')
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.pension-users.view',['id' => $user -> id]) }}"
                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-info-circle"></i></a>
                            @endcan
                            @can('edit pension')
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.pension-users.edit', ['id' => $user->id])}}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete pension')
                            <a class="btn btn-sm btn-outline-primary" href="#"
                                onclick="delete_confirm({{ $user -> id}})"
                                style="color:red;border-color:red;margin-left:8%;border-radius:5px 5px 5px 5px"><i
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
@endsection
@push('js')
<script>
function delete_confirm(employee_id) {
    Swal.fire({
        title: 'Do you want to delete the pension?',
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
                url: "{{ route('admin.pension-users.delete') }}",
                type: "post",
                data: {
                    id: employee_id
                },
                success: function() {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#' + employee_id).remove();
                }
            })
        }
    })
}
</script>
@endpush