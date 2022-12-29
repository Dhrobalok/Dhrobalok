@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Salary Segments</h3>
        <a href="{{ route('admin.salary-segment.create') }}">Add New</a>
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
                    <th class="d-none d-sm-table-cell text-center">Type Name</th>
                    <th class="d-none d-sm-table-cell text-center">Type Status</th>
                    <th class="d-none d-sm-table-cell text-center">Percentage</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($segments as $segment)
                <tr id="{{ $segment -> id }}">
                    <td class="text-center">{{ $segment -> name }}</td>
                    <td class="text-center">{{ $segment -> type -> name }}</td>
                    <td class="text-center">{{ $segment -> type -> type  }}</td>
                    @if($segment -> is_percentage == 0)
                    <td class="text-center"><span class="badge badge-dark">No</span></td>
                    @else($segment -> is_percentage == 0)
                    <td class="text-center"><span class="badge badge-success">Yes</span></td>
                    @endif


                    <td>
                        <div class="btn-group">
                        <a class="btn btn-sm btn-outline-success"
                                href="{{ route('admin.salary-segment.edit',['segment_id' => $segment -> id]) }}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-danger"
                                href="#" onclick = "delete_confirm({{ $segment -> id }})"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-trash"></i></a>
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
function delete_confirm(type_id) {
    Swal.fire({
        title: 'Do you want to delete that segment?',
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
                url : "{{ route('admin.salary-segment.delete') }}",
                type : "post",
                data:
                {
                    segment_id : segment_id
                },
                success:function()
                {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#'+segment_id).remove();
                }
            })
        } 
    })
}
</script>
@endpush