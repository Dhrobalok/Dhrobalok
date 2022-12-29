@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">

        <h3 class="block-title">Approved Vouchers</h3>
        <!--advance aprove-->


        {{-- @can('generate vouchers') --}}
        <a class="btn btn-sm f-100" style="background-color: #1dbf73;color:white" id="generate_vouchers">Generate Vouchers</a>
        {{-- @endcan --}}
    </div>

    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Amount(In Tk.)</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>

                </tr>
            </thead>
            <tbody>

                {{-- @if($status==7)
                @foreach($aprove as $voucher)


                <tr id="{{ $voucher->id }}">
                    @php
                    $advance_v=App\Models\AdvanceVouchersDetail::where('budget_id',$voucher->budget_id)->first();
                  @endphp

                  @php
                  $level_id=App\Models\Budget::where('id',$advance_v->budget_id)->first();
                @endphp

                 @php
                  $employee=App\Models\Employee::find($level_id->level_id);
                 @endphp


                 @php
                  $total= App\Models\AdvanceAprove::where('budget_id',$voucher->budget_id)->first();
                 @endphp

                    <td class="text-center">AV/0{{  $advance_v -> budget_id }}</td>
                    <td class="text-center">{{ $advance_v -> created_at }}</td>
                    <td class="text-center">{{ $employee ->name  }}</td>


                    <td class = "text-center">{{ $total->total_cost }}</td>

                    <td class="text-center"><span class="badge badge-success">{{ 'Approved' }}</span></td>

                </tr>
               
            

                <!--advance voucher -->
                @endforeach
                @endif --}}

                @foreach($vouchers as $voucher)
                <tr id="{{ $voucher -> id }}">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> posted_by_info -> name  }}</td>
                    <td class = "text-center">{{ number_format($voucher -> voucher_details -> sum('credit_amount')) }}</td>
                    <td class="text-center"><span class="badge badge-success">{{ 'Approved' }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="generation_confirm" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">
                <h4 class = "f-roboto mt-4" style = "color:#1dbf73"><i class = "fa fa-spinner fa-spin mr-2"></i>Please wait, it takes some couple of seconds.</h4>
            </div>
        </div>
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
$('#generate_vouchers').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: '<h4 class = "f-roboto">Are you sure to generate these vouchers?</h4>',
        showCancelButton: true,
        confirmButtonText: "CONFIRM",
        cancelButtonText: "CANCEL",
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('admin.voucher.generate') }}",
                type: "post",
                beforeSend:function(){

                  $('#generation_confirm').modal('show');
                },
            }).done(function(message){

                setTimeout(function(){
                    $('#generation_confirm').modal('hide');
                    showSuccessWindow(message);
                }, 3000);
            })
        }
    })
})
</script>
@endpush
