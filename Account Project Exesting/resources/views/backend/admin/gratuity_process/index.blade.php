@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header text-left f-100" style="color:blue;font-weight:700">

                    <div class="row">
                        <div class="col-md-6">
                            Gratuity
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell text-center">Year</th>
                                <th class="d-none d-sm-table-cell text-center">Month</th>
                                <th class="d-none d-sm-table-cell text-center">Employee(ID)</th>
                                <th class="d-none d-sm-table-cell text-center">Grand Total</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gratuity_processes as $gratuity_process)
                            <tr>
                                @php
                                    $gratuity_user = App\Models\GratuityUser::find($gratuity_process->gratuity_user_id);
                                    $employee = App\Models\Employee::find($gratuity_user->employee_id);
                                @endphp
                                <td class="text-center">{{ $gratuity_process -> year}}</td>
                                <td class="text-center">{{ $gratuity_process -> month }}</td>
                                <td class="text-center">{{ $employee -> name }}({{$employee->id}})</td>
                                <td class="text-center">{{ $gratuity_user -> total_amount }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.gratuity-process.view',['id'  => $gratuity_process -> id])}} "><i class="fas fa-eye"></i></a>
                                    <!-- <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.gratuity-process.download',['id' => $gratuity_process -> id])}}"><i class="fas fa-download"></i></a> -->
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
