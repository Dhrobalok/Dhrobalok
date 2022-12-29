@extends('backend.admin.index')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Not Submitted Voucher</h3>

    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-sm">
            <thead>
                <tr>

                    <th class="d-none d-sm-table-cell text-center">Budget_id</th>
                    <th class="d-none d-sm-table-cell text-center">Under Allocation </th>
                    <th class="d-none d-sm-table-cell text-center">Cost</th>
                    <th class="d-none d-sm-table-cell text-center">Start Day</th>
                    <th class="d-none d-sm-table-cell text-center">End Day</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($key as $budget_number=>$employeeNmame )

                @php
                $budget=App\Models\Budget::where('id',$budget_number)->first()
                @endphp



                <tr >

                    <td class="text-center">{{ $budget_number }}</td>
                    <td class="text-center">{{ $employeeNmame }}</td>
                    <td class="text-center">{{ $budget->cost }}</td>
                    <td class="text-center">{{ $budget->start_date }}</td>
                    <td class="text-cent">{{ $budget->end_date }}</td>

                </tr>

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
