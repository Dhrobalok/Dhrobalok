@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Generated Vouchers</h3>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>


            {{-- <tbody>
                {{-- @if($status)


                @foreach ($generetvoucher as $generetvalue )

                @php
                   $level_id=App\Models\Budget::where('id',$generetvalue->budget_id)->first();
                @endphp
                @php
                $generet_date=App\Models\AdvanceVouchersGeneret::where('budget_id',$generetvalue->budget_id)->first();
             @endphp
                @php
                    $name=App\Models\Employee::where('id',$level_id->level_id)->first();
                @endphp

                <tr id="{{ $level_id -> id }}" class = "text-center">
                    <td class="text-center">AV/0{{ $level_id -> id }}</td>
                    <td class="text-center">{{ $generet_date->created_at }}</td>
                    <td class="text-center">{{ $name ->name  }}</td>
                    <td class="text-center"><span class="badge badge-info">{{ 'Generated' }}</span></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.voucher.advance_generated.view',['voucher_id' => $generetvalue -> budget_id]) }}"
                                ><i
                                    class="fas fa-info-circle"></i></a>

                            <a class="btn btn-sm btn-danger btn-sm text-white" href="{{ route('admin.advance_voucher.download',['voucher_id' => $generetvalue -> budget_id]) }}"
                               ><i class="fa fa-download"></i></a>

                        </div>
                    </td>
                </tr>
                @endforeach
                @endif 

            </tbody> --}}



            <tbody>
                @foreach($vouchers as $voucher)
                <tr id="{{ $voucher -> id }}" class = "text-center">
                    <td class="text-center">{{ $voucher -> voucher_no }}</td>
                    <td class="text-center">{{ $voucher -> date }}</td>
                    <td class="text-center">{{ $voucher -> posted_by_info -> name  }}</td>
                    <td class="text-center"><span class="badge badge-info">{{ 'Generated' }}</span></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.voucher.generated.view',['voucher_id' => $voucher -> id]) }}"
                                ><i
                                    class="fas fa-info-circle"></i></a>

                            <a class="btn btn-sm btn-danger btn-sm text-white" href="{{ route('admin.voucher.download',['voucher_id' => $voucher -> id]) }}"
                               ><i class="fa fa-download"></i></a>

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
        title: 'Do you sure to generate vouchers?',
        showCancelButton: true,
        confirmButtonText: "Confirm",
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url : "{{ route('admin.voucher.generate') }}",
                type : "post",
                success:function(response)
                {
                     Swal.fire('Vouchers Successfully Generated', '', 'success')
                }
            })

        }
    })
})
</script>
@endpush
