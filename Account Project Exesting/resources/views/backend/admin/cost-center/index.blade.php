@extends('backend.admin.index')
@section('content')
@if(Session :: get('message'))
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">{{ Session :: get('message') }}</h3>
    </div>
</div>
@endif
<div class="block block-rounded">

    <div class="block-header block-header-default">
        <h3 class="block-title">Cost Centers</h3>

        @can('create cost')
        <i class="fa fa-plus-circle" style="color:blue;margin-right:8px;"></i>
        <a href="{{ route('create-cost') }}">Add New</a>
        @endcan
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-sm table-striped js-dataTable-full">
            <thead>
                <tr class="text-center">

                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cost_centers as $cost_center)
                <tr class="text-center">
                    <td>{{ $cost_center -> code }}</td>
                    <td>{{ $cost_center -> name }}</td>
                    <td>{{ $cost_center -> description }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="custom-btn mr-1"
                                href="{{ route('admin.cost-center.view',['id' => $cost_center -> id] ) }}">
                                <i class = "fa fa-info"></i>
                            </a>
                            <a class="btn btn-danger" onclick = "remove(this,'{{ $cost_center -> id}}')"
                                href="#">
                                <i class = "fa fa-trash-alt"></i>
                            </a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('css')

<style>
td,
th,
.dataTables_info,
.page-link,
.form-control {
    font-size: 18px;
    font-family: 'Gentium Basic';
}

.block-title,
a {
    font-size: 18px;
    font-family: 'Gentium Basic';
    color: blue;
    font-weight: bolder;
}

.btn-outline-primary {
    font-size: 15px;
    font-family: 'Gentium Basic';
    margin-left: 2px;
}

input.custom-checkbox {
    transform: scale(1.5);
    margin-right: 9%;
    margin-top: 5%;
}

label,
h5 {
    font-family: 'Gentium Basic'
}

.list-group {
    font-family: 'Gentium Basic';
    font-size: 20px;
    line-height: 10px;
    background: white;
}
</style>
@endpush
@push('js')
<script>
function remove(ref, cost_center_id) {

if (confirm('Are you sure to delete?')) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url: "{{ route('admin.cost-center.delete') }}",
        type: "post",
        data: {
            cost_center_id: cost_center_id
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