@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row form-group">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header f-100" style="color:blue;font-weight:700">
                    
                           Upcoming Loans to complete
                       
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                               
                                <th class="d-none d-sm-table-cell text-center">Ref No.</th>
                                <th class="d-none d-sm-table-cell text-center">Base Amount</th>
                                <th class="d-none d-sm-table-cell text-center">Interest Amount</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                            <tr id="{{ $loan -> id }}" class = "text-center">
                               
                                <td>{{ $loan -> loan_ref_no }}</td>
                                <td>{{ $loan -> base_amount }}</td>
                                <td>{{ $loan -> total_amount - $loan -> base_amount }}</td>
                                @if($loan -> status == 0)
                                <td class="text-center"><span class="badge badge-danger">Not Approved</span></td>
                                @elseif($loan -> status == 1)
                                <td class="text-center"><span class="badge badge-info">Pending</span></td>
                                @elseif($loan -> status == 3)
                                <td class="text-center"><span class="badge badge-primary">Pending Approval</span></td>
                                @elseif($loan -> status == 2)
                                <td class="text-center"><span class="badge badge-success">Approved</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a class = "btn btn-primary f-100 btn-sm" href = "{{ route('admin.loan.process',['loan_id' => $loan -> id] ) }}">Proccess Now</a>
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