@extends('backend.admin.index')
@section('content')
@if(Session :: get('message'))
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <div class="block-title" style="color:#1dbf73">{{ Session :: get('message') }}</div>

    </div>
</div>
@endif
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Gratuity</h3>
        <a href="{{route('admin.gratuity-users.created')}}"><i class="fa fa-plus" style="float: right;"
                data-toggle="tooltip" title="New Gratuity"></i></a>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Total Gratuity Amount </th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                <tr id="{{ $user -> employee_id }}" class="text-center">
                    @php
                        $total=App\Models\Gratuity::where('employee_id',$user -> employee_id)->get()->sum('contribution');
                    @endphp


                    <td class="text-center">{{ $user -> getEmployee -> name }}</td>
                    <td class="text-center">{{ $total }}</td>
                    @if($user -> status == 0)
                    <td class="text-center"><span class="badge badge-dark">Under Review</span></td>
                    @elseif($user -> status == 1)
                    <td class="text-center"><span class="badge badge-success">Approved</span></td>
                    @else
                    <td class="text-center"><span class="badge badge-info">Completed</span></td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-info mr-2"
                                href="{{ route('admin.gratuity-users.view',['id' => $user -> id]) }}"><i
                                    class="fas fa-info-circle"></i></a>
                            @if($user -> status == 0)
                            <a class="btn btn-sm btn-primary mr-2"
                                href="{{ route('admin.gratuity-users.edit', ['id' => $user->id])}}"><i
                                    class="fas fa-edit"></i></a>
                            @endif
                            <a class="btn btn-sm btn-danger mr-2" href="#" onclick="delete_confirm({{ $user -> id}})"><i
                                    class="fas fa-trash-alt"></i></a>
                            <!--set can check-->
                            @if($user -> status == 1)
                            <button class="btn btn-sm btn-info f-100"
                                onclick="mark_as_complete(this,'{{ $user -> id }}')">Mark As Complete</button>
                            @endif
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
        title: 'Do you want to delete the entry?',
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
                url: "{{ route('admin.gratuity-users.delete') }}",
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

function mark_as_complete(ref, user_id) {

    if (confirm('Are you sure to proceed your action?')) {
        $(ref).html('<i class = "fa fa-spinner fa-spin"></i>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "{{ route('admin.gratuity-user.complete') }}",
            type: "post",
            data: {
                user_id: user_id
            },
            success: function() {

            }
        }).done(function() {
            $(ref).html('Completed');
            $(ref).attr('disabled',true);
        })
    }
}
</script>
@endpush