@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Types of Loan</h3>
        <a href="{{ route('admin.loan.types.create') }}">Add New</a>
    </div>
    <div class="block-content block-content-full">
        @if(Session :: get('message') != NULL)
        <div class="alert alert-success f-100">
            {{ Session :: get('message') }}
            @php
            Session :: put('message',NULL);
            @endphp
        </div>
        @endif
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Interset Rate</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr id="{{ $type -> id }}">
                    <td class="text-center">{{ $type -> name }}</td>
                    <td class="text-center">{{ $type -> interest_rate.'%' }}</td>
                    
                    @if($type -> status == 0)
                    <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                    @else($type -> status == 1)
                    <td class="text-center"><span class="badge badge-success">Active</span></td>
                    @endif


                    <td>
                        <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success"
                                href="{{ route('admin.loan.types.edit',['type_id' => $type -> id]) }}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-danger"
                                href="#" onclick = "delete_confirm({{ $type -> id }})"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-trash"></i></a>
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
function delete_confirm(type_id) {
    Swal.fire({
        title: 'Do you want to delete that type?',
        showCancelButton: true,
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url : "{{ route('admin.loan.types.delete') }}",
                type : "post",
                data:
                {
                    type_id : type_id
                },
                success:function()
                {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#'+type_id).remove();
                }
            })
        } 
    })
}
</script>
@endpush