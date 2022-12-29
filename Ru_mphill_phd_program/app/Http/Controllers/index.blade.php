@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Cheque Books</h3>
      {{-- @can('create cheque')  --}}
        <a href="{{ route('admin.cheque-book.create') }}">Add New</a>
        {{-- @endcan  --}}
    </div>
    <div class="block-content block-content-full">
        @if(Session :: get('message') != NULL)
        <div class="alert alert-danger">
            {{ Session :: get('message') }}
            @php
            Session :: put('message',NULL);
            @endphp
        </div>
        @endif
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Cheque Book No</th>
                    <th class="d-none d-sm-table-cell text-center">Voucher Id</th>
                    <th class="d-none d-sm-table-cell text-center">Bank Name</th>
                    <th class="d-none d-sm-table-cell text-center">Issue By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($cheque_books as $cheque_book)
                @php
                    $checkbook=App\Models\VoucherMaster::where('id',$cheque_book->voucher_master_id)->first();
                    $e_name=App\Models\Employee::where('id',$checkbook->submitted_by)->first();
                @endphp
                
                
                <tr class="text-center" id = "{{ $cheque_book -> id }}">
                    <td>{{ $checkbook -> cheque_no }}</td>
                    <td>{{ $checkbook -> voucher_no }}</td>
                    <td>Agrani Bank</td>
                    <td>{{ $e_name ->name}}</td>
                    <td>
                       
                        <span class="badge badge-success">Active</span>
                     
                    </td>
                    <!--<td>-->
                    <!--    <div class="btn-group">-->
                    <!--       {{-- @can('view cheque') --}}-->
                    <!--        <a class="btn btn-info"-->
                    <!--            href="{{ route('admin.cheque-book.view',['id' => $cheque_book -> id]) }}"><i-->
                    <!--                class="fa fa-info-circle"></i></a>-->
                    <!--       {{-- @endcan --}}-->
                    <!--       {{-- @can('delete cheque') --}}-->
                    <!--        <a class="btn btn-danger"-->
                    <!--            href = "#" onclick = "delete_cheque_book({{ $cheque_book -> id}})"><i-->
                    <!--                class="fa fa-trash-alt"></i></a>-->
                    <!--      {{-- @endcan --}}-->
                    <!--    </div>-->

                    <!--</td>-->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('js')
<script>
function delete_cheque_book(chequeBookId) {
    Swal.fire({
        title: 'Do you want to delete that cheque book?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Confirm',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            $.ajax({
                url : "{{ route('admin.cheque-book.delete') }}",
                type : "GET",
                data : {
                    Id : chequeBookId
                },
                success: function(response)
                {
                    Swal.fire('Record Successfully Deleted','success');
                    $('#' + chequeBookId).remove();
                }
            })

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
</script>
@endpush