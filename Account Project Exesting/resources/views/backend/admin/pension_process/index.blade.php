@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-left f-100" style="color:blue;font-weight:700">

                    <div class="row">
                        <div class="col-md-6">
                            Generated Pensions
                        </div>
                        <div class="col-md-6 text-right">
                            <a  class = "btn btn-info f-100" href = "{{ route('admin.pension.generate') }}">Generate New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                            <th class="d-none d-sm-table-cell text-center">Generation Date</th>
                                <th class="d-none d-sm-table-cell text-center">Year</th>
                                <th class="d-none d-sm-table-cell text-center">Month</th>
                                
                                <th class="d-none d-sm-table-cell text-center">Generated By</th>
                                <th class="d-none d-sm-table-cell text-center">Grand Total</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($generated_pensions as $generated_pension)
                            <tr class = "text-center">
                               
                                <td class="text-center">{{ date('Y-m-d',strtotime($generated_pension -> process_date)) }}</td>
                                <td class="text-center">{{ $generated_pension -> year}}</td>
                                <td class="text-center">{{ $generated_pension -> month }}</td>
                                
                                <td class="text-center">{{ $generated_pension -> getEmployee -> name }}</td>
                                <td class="text-center">{{ $generated_pension -> total_amount }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-sm btn-primary f-100" href="{{ route('admin.pension-process.view',['id'  => $generated_pension -> id])}} ">View</a>
                                   
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