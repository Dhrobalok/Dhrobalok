@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Approval Pendings</h3>

    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr id="{{ $voucher -> id }}">

                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> posted_by_info -> name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn" href = "{{ route('approve-voucher',['voucher_id'=>$voucher -> id]) }}"
                                style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Approve</a>
                            <a class="btn btn-info" href = "{{ route('backward-voucher',['voucher_id'=>$voucher -> id]) }}"
                                style="margin-left:2%;font-family:'Gentium Basic';color:white;">Decline</a>

                        </div>
                    </td>

                </tr>
                @endforeach



                @if($status==7)

               @foreach ($advancceid as $value)


                @php
                $advancevoucher = App\Models\AdvanceVoucher::where('budget_id',$value->budget_id)->first();
                @endphp

                @php
                $label = App\Models\Employee::find( $advancevoucher->level_id);
                @endphp

                <tr id="{{ $advancevoucher -> id }}">

                    <td class="text-center">AV/0{{ $advancevoucher -> budget_id }}</td>
                    <td class="text-center">{{ $advancevoucher -> voucher_date }}</td>

                    <td class="text-center">{{ $label -> name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn" href = "{{ route('AdvanceVoucherAprove',['voucher_id'=>$advancevoucher -> budget_id]) }}"
                                style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Approve</a>
                            <a class="btn btn-info" href = "{{ route('AdvanceVoucherDecline',['voucher_id'=>$advancevoucher -> budget_id]) }}"
                                style="margin-left:2%;font-family:'Gentium Basic';color:white;">Decline</a>

                        </div>
                    </td>

                </tr>

                @endforeach


               @endif


            </tbody>
        </table>
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
