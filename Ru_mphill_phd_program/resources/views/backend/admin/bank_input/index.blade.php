@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Bank Inputs</h3>
         @can('create vouchers')
        <a href = "{{ route('create-bank-input') }}">Add New</a>
        @endcan
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Voucher By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr id = "{{ $voucher -> id }}">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> voucher_by }}</td>
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
                            @can('view vouchers')
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('view-bank-input',['id' => $voucher -> id]) }}"
                                style="border-radius:5px 5px 5px 5px"><i
                                    class="fas fa-info-circle"></i></a>
                            @endcan
                            @if($voucher -> status != 2 && $voucher -> status != 3)
                            @can('edit vouchers')
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('edit-bank-input',['id' => $voucher -> id]) }}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            @endcan
                            @endif
                            <!-- @if($voucher -> status == 3)
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.voucher.download',['voucher_id' => $voucher -> id]) }}"
                                style="color:blue;border-color:blue;margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fa fa-download"></i></a>
                            @endif -->
                            @can('delete vouchers')
                            <a class="btn btn-sm btn-outline-primary" href="#" onclick = "delete_voucher({{ $voucher -> id }})"
                                style="color:red;border-color:red;margin-left:8%;border-radius:5px 5px 5px 5px"><i
                                    class="fas fa-trash-alt"></i></a>
                            @endcan
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
 function delete_voucher(id)
 {
    Swal.fire({
      
      title: "<h4 class = 'text-danger' style = 'font-family:Gentium Basic'>Do you want to delete this voucher?</h4>",
      icon:'warning',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonColor:'red',
      confirmButtonText: "Confirm",
      
  }).then((result) => {
     
      if (result.isConfirmed) {
         
          $.ajaxSetup({
              headers:
              {
                  'X-CSRF_Token' : "{{ csrf_token() }}"
              }
          })
          $.ajax({
              url:"{{ route('delete-bank-input') }}",
              type:"POST",
              data:
              {
                 id : id
              },
              success:function(response)
              {
                  console.log(response);
                  Swal.fire("<h4 style = 'font-family:Gentium Basic'>Successfully deleted</h4>", '', 'success')
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