@extends('backend.admin.index')
@section('content')
@include('backend.admin.Rumaster.master')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Backward Voucher</h3>

    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Comment</th>

                </tr>
            </thead>
            <tbody>
                @foreach($backward as $voucher_iteam)
                {{-- @dd($voucher_iteam) --}}
                   @php
                      $allvoucher= App\Models\VoucherMaster::where('id',$voucher_iteam->voucher_id)->first();

                   @endphp
                   @if ($allvoucher)

                   <tr id="{{ $allvoucher->id }}">

                    <td class="text-center">{{ $allvoucher -> voucher_no }}</td>
                    <td class="text-center">{{ $allvoucher -> date }}</td>
                    <td class="text-center"><span style="background-color:solid-gray;">{{ $allvoucher -> posted_by_info -> name }}</span></td>
                    <td class="text-center">{{$voucher_iteam ->comment }}</td>
                    

                </tr>
                @endif

                @endforeach


                       
                  
               

             


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
