@extends('backend.admin.index')
@section('content')
<div class="container-fluid">
    @if(Session :: get('success-message'))
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header bg-white">
                    <h4 class="f-100 mt-1 mb-1" style="color:#1dbf73"><i
                            class="fa fa-check-circle mr-2"></i>{{ Session :: get('success-message') }}</h4>
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
                            <div class="f-100" style="font-weight:700; font-size:20px; color:blue">Customers</div>
                        </div>
                        <div class="col-md-4 text-right">
                            <a style="color:blue;font-weight:700" href="{{ route('admin.sales.customers.create') }}">
                                <i class="fa fa-plus-circle mr-2"></i>Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm js-dataTable-full">
                        <thead>
                            <tr class="text-center">
                                <th>Customer Name</th>
                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr class="text-center">
                                <td>{{ $customer -> name }}</td>
                                <td>{{ $customer -> email_address }}</td>
                                <td>{{ $customer -> mobile_number }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.sales.customers.view',['customer_id' => $customer -> id]) }}"
                                            class="custom-btn mr-1"><i class="fa fa-info"></i></a>
                                        <a href="#" onclick="remove('{{ $customer -> id }}',this)" class="btn btn-danger"><i
                                                class="fa fa-trash-alt"></i></a>
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
function remove(customerId, child_ref) {
    event.preventDefault();

    if (confirm('Are you sure to procced?')) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url: "{{ route('admin.sales.customers.delete') }}",
            type: "post",
            data: {
                customerId: customerId
            },
            success: function(message) {
                showSuccessWindow(message);
                $(child_ref).closest('tr').remove();
            }
        })
    }

}
</script>
@endpush