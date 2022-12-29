@extends('backend.admin.index')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <div class="f-roboto">Payment Voucher</div>
            </div>
            <div class="col-md-4 text-right">
                {{-- @can('create vouchers') --}}
                <a href="{{ route('admin.voucher.debit.create') }}"><i class="fa fa-plus-circle mr-2"></i>Add New</a>
                {{-- @endcan --}}
            </div>
        </div>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                @php
                    //   $allvoucher= App\Models\VoucherMaster::where('id',$voucher_iteam->voucher_master_id)->first();
                      $name=App\Models\Employee::where('id',$voucher->posted_by)->first();
                   @endphp
                   @if ($name)
                       
                   
                  <tr id="{{ $voucher -> id }}" class="text-center">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $name->name }}</td>
                    @php
                    $status = App\Models\VoucherStatus :: find($voucher->status)
                    @endphp
                    @if($status -> name == 'Posted')
                    <td class="text-center"><span class="badge badge-info">{{ $status -> name}}</span></td>
                    @elseif($status -> name == 'Rejected')
                    <td class="text-center"><span class="badge badge-danger">{{ $status -> name}}</span></td>
                    @elseif($status -> name == 'Approved')
                    <td class="text-center"><span class="badge badge-success">{{ $status -> name}}</span></td>
                    @else
                    <td class="text-center"><span class="badge badge-primary">{{ $status -> name}}</span></td>
                    @endif
                    <td>
                        <div class="btn-group">
                           
                            {{-- @can('view vouchers') --}}
                            <a class=" btn btn-info mr-1"
                                href="{{ route('admin.voucher.debit.view',['id' => $voucher -> id]) }}"><i
                                    class="fas fa-info"></i></a>
                            {{-- @endcan --}}

                            {{-- @can('delete vouchers') --}}
                            <a class="btn btn-sm btn-danger" href="#" onclick="delete_voucher({{ $voucher -> id }})"><i
                                    class="fas fa-trash-alt"></i></a>
                            {{-- @endcan --}}
                        </div>
                    </td>
                </tr>
                @endif
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

#delete {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    color: blue;
    border-color: blue;
    border-radius: 10%;
}

#edit {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    border-color: blue;
    color: blue;
    border-radius: 10%;
}
</style>
@endpush
@push('js')
<script>
function delete_voucher(id) {
    Swal.fire({

        title: "<h4 class = 'text-danger' style = 'font-family:Gentium Basic'>Do you want to delete this voucher?</h4>",
        icon: 'warning',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Confirm",

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('admin.voucher.debit.delete') }}",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    showSuccessWindow('Voucher deleted successfully');
                    $("#" + id).remove();
                }
            })

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
</script>
@endpush
