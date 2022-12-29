@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Backwarded Vouchers</h3>

    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Voucher By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>

                </tr>
            </thead>
            <tbody>
                @if($title==7)
                  @foreach ($decline as $value)
                  @php
                  $Budget=App\Models\Budget::where('id',$value)->first();
                  @endphp

                  @php
                  $date=App\Models\AdvanceVouchersDetail::where('budget_id',$value)->first();
                  @endphp

                  @php
                  $employee=App\Models\Employee::where('user_id',$Budget->level_id)->first();
                  @endphp
                  <tr id="{{ $Budget -> id }}">
                    <td class="text-center">AV/0{{ $Budget -> id }}</td>
                    <td class="text-center">{{ $date -> voucher_date }}</td>
                    <td class="text-center">{{ $employee -> name }}</td>
                    <td class="text-center"><span class="badge badge-success">{{ 'Backward' }}</span></td>
                </tr>

                  @endforeach

                @endif

                @foreach($vouchers as $voucher)
                <tr id="{{ $voucher -> id }}">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> voucher_by }}</td>
                    <td class="text-center"><span class="badge badge-success">{{ 'Backward' }}</span></td>
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
