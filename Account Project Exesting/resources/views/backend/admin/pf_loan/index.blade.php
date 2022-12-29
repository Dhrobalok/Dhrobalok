@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Provident Fund Loans</h3>
        <a href="{{route('admin.pf-loan.create')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="New Loan"></i></a>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Employee ID</th>
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Loan Amount</th>
                    <!-- <th class="d-none d-sm-table-cell text-center">Year</th>
                    <th class="d-none d-sm-table-cell text-center">Month</th> -->
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr id="{{ $user -> employee_id }}">
                    <td class="text-center">{{ $user -> employee_id }}</td>
                    @php
                        $employee = App\Models\Employee::find($user->employee_id);
                        $employee_name = $employee->name;
                    @endphp
                    <td class="text-center">{{ $employee_name }}</td>
                    <td class="text-center">{{ $user -> loan_amount }}</td>
                    <!-- <td class="text-center">{{ $user-> year }}</td>
                    <td class="text-center">{{ $user-> month }}</td> -->
                    <td class="text-center">{{ $user-> date }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.pf-loan.view',['id' => $user -> id]) }}"
                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-info-circle"></i></a>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.pf-loan.edit', ['id' => $user->id])}}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-primary" href="#"
                                onclick="delete_confirm({{ $user -> id}})"
                                style="color:red;border-color:red;margin-left:8%;border-radius:5px 5px 5px 5px"><i
                                    class="fas fa-trash-alt"></i></a>
                                <!--set can check-->
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('js')
<script>

    function delete_confirm(employee_id) {
        Swal.fire({
            title: 'Do you want to delete this entry ?',
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
                    url: "{{ route('admin.pf-loan.delete') }}",
                    type: "post",
                    data:
                    {
                       id : employee_id
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

