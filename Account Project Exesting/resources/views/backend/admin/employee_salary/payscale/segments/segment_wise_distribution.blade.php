@extends('backend.admin.index')
@section('content')

<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header text-left f-roboto">
                Grade Wise Employees
            </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell text-center">Employee Name</th>
                                <th class="d-none d-sm-table-cell text-center">Employee ID</th>
                                <th class="d-none d-sm-table-cell text-center">Grade</th>
                                <th class="d-none d-sm-table-cell text-center">Payscale</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr class = "text-center">
                                <td class="text-center">{{ $employee -> employee -> name }}</td>
                                <td class="text-center">{{ $employee -> employee_id }}</td>
                                <td class="text-center">{{ $employee -> grade -> name }}</td>
                                <td class="text-center">{{ $employee -> payscale -> name }}</td>

                                <td>
                                    <div class="btn-group">
                                       @can('salary_config payroll')
                                        <a class="btn btn-sm btn-danger f-100"
                                            href="{{ route('admin.salary-segment.assign-segment-amount',['employee_id' => $employee -> employee -> id]) }}">Setup</a>
                                       @endcan

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
