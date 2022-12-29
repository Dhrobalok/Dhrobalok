@extends('backend.admin.index')
@section('content')

<div class="container">
    <div class="row form-group">
        <div class="col-lg-12">
            @if(Session :: get('message') != NULL)
            <div class="alert alert-success f-100">
                {{ Session :: get('message') }}
                @php
                Session :: put('message',NULL);
                @endphp
            </div>
            @endif
            <div class="card shadow-lg">

                <div class="card-header f-100" style="color:blue;font-weight:700">
                    <div class="row">
                        <div class="col-md-6">
                            Pending Loans
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                              
                                <th class="d-none d-sm-table-cell text-center">Employee Name</th>
                                <th class="d-none d-sm-table-cell text-center">Loan Amount</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                             @php 
                               $already_approved = App\Models\ProvidentLoanApprove :: where('loan_id',$loan -> id)->where('status',1)->count();
                               $current_approver_order = App\Models\ProvidentLoanApprove :: where('loan_id',$loan -> id)
                                                                                  ->where('user_id',Auth :: user() -> id)
                                                                                  ->first();
                                
                             @endphp
                            
                             @if($current_approver_order && $already_approved + 1 == $current_approver_order -> approve_order)
                            <tr id="{{ $loan -> id }}">
                               
                                <td class="text-center"> {{ $loan -> employee -> name }}</td>
                                <td class="text-center">{{ $loan -> loan_amount }}</td>
                                
                               
                                @if($loan -> status == 0)
                                <td class="text-center"><span class="badge badge-danger">Not Approved</span></td>
                                @elseif($loan -> status == 1)
                                <td class="text-center"><span class="badge badge-info">Pending</span></td>
                                @elseif($loan -> status == 3)
                                <td class="text-center"><span class="badge badge-primary">Pending Approval</span></td>
                                @elseif($loan -> status == 2)
                                <td class="text-center"><span class="badge badge-success">Active</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">

                                        <div class="btn-group">
                                           @can('approve loans')
                                            <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('admin.pf-loan.approve',['loan_id' => $loan -> id]) }}"
                                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-eye"></i></a>
                                           @endcan
                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="review_interest_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="review_interest_modal">Change Interest Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="interest_rate_change">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label>New Interest Rate</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="any" class="form-control" id="new_interest_rate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <button type="sumbit" class="btn btn-primary f-100">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
