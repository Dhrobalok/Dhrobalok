@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Bill Vouchers</h3>
        
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-sm table-vcenter js-dataTable-full">
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
                <tr id = "{{ $voucher -> id }}">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> posted_by_info -> name }}</td>
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
                            @can('edit vouchers')
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('edit-bill-voucher',['id' => $voucher -> id]) }}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            @endcan
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
              url:"{{ route('delete-expenditure-voucher') }}",
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