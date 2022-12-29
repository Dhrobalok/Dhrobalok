@extends('backend.admin.index')
@section('content')

<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            @if(Session :: get('message') != NULL)
            <div class="alert f-100" style = "background:#1dbf73;color:white;font-size:18px;">
                {{ Session :: get('message') }}
            </div>
            @endif
            <div class="card">

                <div class="card-header f-100" style="color:blue;font-weight:700">
                    <div class="row">
                        <div class="col-md-6">
                        Festivals
                        </div>
                        <div class="col-md-6 text-right">
                        @can('create festivals')
                        <a href="{{ route('admin.festival.create') }}" style = "color:blue" class="text-right"><i class = "fa fa-plus-circle mr-2"></i>Add New</a>
                        @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr class = "text-center">
                                <th class="d-none d-sm-table-cell text-center">Name</th>
                                <th class="d-none d-sm-table-cell text-center">Percentage</th>
                                <th class="d-none d-sm-table-cell text-center">Year</th>
                                <th class="d-none d-sm-table-cell text-center">Month</th>
                                <th class="d-none d-sm-table-cell text-center">Segment</th>
                                <th class="d-none d-sm-table-cell text-center">Festival Date</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($festivals as $festival)
                            <tr id="{{ $festival -> id }}" class = "text-center">
                                <td class="text-center">{{ $festival -> name }}</td>
                                <td class = "text-center">{{ $festival -> percentage }} %</td>
                                <td class="text-center">{{ $festival -> year }}</td>
                                <td class="text-center">{{ $festival -> month }}</td>
                                <td class="text-center">{{ $festival -> segment -> name }}</td>
                                <td class="text-center">{{ $festival -> festival_date }}</td>
                                @if($festival -> status == 0)
                                <td class="text-center"><span class="badge badge-dark">Inactive</span></td>
                                @else($festival -> status == 1)
                                <td class="text-center"><span class="badge badge-success">Active</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">

                                        <div class="btn-group">
                                           @can('edit festivals')
                                            <a class="btn btn-sm btn-primary mr-2"
                                                href="{{ route('admin.festival.edit',['festival_id' => $festival -> id]) }}"
                                                ><i class="fa fa-pencil-alt"></i></a>
                                            @endcan
                                            @can('delete festivals')
                                            <a class="btn btn-sm btn-danger" href="#"
                                                onclick="delete_confirm({{ $festival -> id }})"
                                                ><i
                                                    class="fas fa-trash-alt"></i></a>
                                            @endcan
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