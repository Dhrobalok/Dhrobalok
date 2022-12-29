@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    @if(Session :: get('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header bg-white">
                    <h4 class="f-100 mt-1 mb-1" style="color:#1dbf73"><i
                            class="fa fa-check-circle mr-2"></i>{{ Session :: get('message') }}</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="f-100" style="font-weight:700; font-size:20px; color:blue">Cost Center Types
                            </div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a style="color:blue;font-weight:700" href="{{ route('admin.cost-center.type.create') }}">
                                <i class="fa fa-plus-circle mr-2"></i>Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered bg-white js-dataTable-full">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Description</th>
                                <th>Centers</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $type)
                            <tr class="text-center">
                                <td>{{ $type -> name }}</td>
                                <td>{{ $type -> description }}</td>
                                <td>
                                    @foreach($type -> getCostCenters as $cost_center)
                                    {{ $cost_center -> name }} |
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="custom-btn mr-1"
                                            href="{{ route('admin.cost-center.type.view',['id' => $type -> id]) }}"><i
                                                class="fa fa-info"></i></a>
                                        <button class="btn btn-danger" onclick="remove(this,'{{ $type -> id }}')"><i
                                                class="fa fa-trash-alt"></i></button>
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
function remove(ref, type_id) {

    if (confirm('Are you sure to delete?')) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: "{{ route('admin.cost-center.type.delete') }}",
            type: "post",
            data: {
                type_id: type_id
            },
            success: function() {}
        }).done(function(message) {

            $(ref).closest('tr').remove();
            Swal.fire({
                'title': message,
                'icon': 'success'
            });
        })
    }
}
</script>
@endpush