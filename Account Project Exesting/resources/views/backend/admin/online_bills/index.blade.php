@extends('backend.admin.index')
@section('content')

<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            @if(Session :: get('message') != NULL)
            <div class="alert alert-success f-100">
                {{ Session :: get('message') }}
                @php
                Session :: put('message',NULL);
                @endphp
            </div>
            @endif
            <div class="card shadow-lg">

                <div class="card-header f-100" style="color:blue;font-weight:700">
                    <div class="row">
                        <div class="col-md-6">
                         Online Bill Users
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell text-center">Name</th>
                                <th class="d-none d-sm-table-cell text-center">Email</th>
                                <th class="d-none d-sm-table-cell text-center">Contact No</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>

                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bill_users as $bill_user)
                            <tr id="{{ $bill_user -> id }}">
                                <td class="text-center">{{ $bill_user -> user_info ->  name }}</td>
                                <td class="text-center">{{ $bill_user -> user_info ->  email }}</td>
                                <td class="text-center">{{ $bill_user -> contact_no }}</td>
                               
                                @if($bill_user -> status == 0)
                                <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                                @else($bill_user -> status == 1)
                                <td class="text-center"><span class="badge badge-success">Active</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">

                                        <div class="btn-group">
                                          <a href = "{{ route('admin.bill-user.view',['id' => $bill_user -> id]) }}" class = "btn btn-outline-success p-2"><i class = "fa fa-eye"></i></a>
                                          <a class = "btn btn-outline-primary"><i class = "fa fa-edit"></i></a>
                                          <a class = "btn btn-outline-danger"><i class = "fa fa-trash"></i></a>
                                        </div>
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
function delete_confirm(festival_id) {
    Swal.fire({
        title: 'Do you want to delete that festival?',
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
                url: "{{ route('admin.festival.delete') }}",
                type: "post",
                data: {
                    festival_id: festival_id
                },
                success: function() {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#' + festival_id).remove();
                }
            })
        }
    })
}
</script>
@endpush