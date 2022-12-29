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
            <div class="card">

                <div class="card-header f-100" style="color:blue;font-weight:700">
                    <div class="row">
                        <div class="col-md-6">
                           House Building Loans
                        </div>
                        <div class="col-md-6 text-right">
                            @can('view loans')
                            <a href = "{{ route('house-building-loan-report') }}" class = "btn btn-sm btn-danger f-100" style = "color:white">Export Pdf</a>
                            @endcan
                            @can('edit loans')
                            <button class="btn btn-dark btn-sm f-100" id="review_interest">Review Interest Rate</button>
                            @endcan
                        </div>
                        
                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full  bg-white">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="d-none d-sm-table-cell text-center">Employee</th>
                                <th class="d-none d-sm-table-cell text-center">Interest Rate</th>
                                <th class="d-none d-sm-table-cell text-center">Tenure Yr.</th>
                                <th class="d-none d-sm-table-cell text-center">Amount</th>
                                <th class="d-none d-sm-table-cell text-center">EMI</th>
                                <th class="d-none d-sm-table-cell text-center">Ref. No</th>
                                <th class="d-none d-sm-table-cell text-center">Status</th>
                                <th class="d-none d-sm-table-cell text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                            <tr id="{{ $loan -> id }}" class = "text-center">
                                <td>
                                    <input type="checkbox" name="checked_loans[]">
                                    <input type="hidden" name="loan_ids[]" value="{{ $loan -> id }}">
                                </td>
                                <td class="text-center">{{ $loan -> employee_info -> name }}</td>
                                <td class="text-center">{{ $loan -> interest_rate }} %</td>
                                <td class="text-center">{{ $loan -> tenure_year }} Years</td>
                                <td class = "text-center">{{ $loan -> base_amount }}</td>
                                <td class="text-center">{{ $loan -> emi_amount }} Tk.</td>
                                <td class="text-center">{{ $loan -> loan_ref_no }}</td>
                                @if($loan -> status == 0)
                                <td class="text-center"><span class="badge badge-danger">Not Approved</span></td>
                                @elseif($loan -> status == 1)
                                <td class="text-center"><span class="badge badge-info">Pending</span></td>
                                @elseif($loan -> status == 3)
                                <td class="text-center"><span class="badge badge-primary">Pending Approval</span></td>
                                @elseif($loan -> status == 2)
                                <td class="text-center"><span class="badge badge-success">Approved</span></td>
                                @elseif($loan -> status == 4)
                                <td class="text-center"><span class="badge badge-success">Running</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">

                                        <div class="btn-group">
                                           @can('edit loans')
                                            <a class="btn btn-sm btn-outline-success"
                                                href="{{ route('admin.loan.edit',['loan_id' => $loan -> id]) }}"
                                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('delete loans')
                                            <a class="btn btn-sm btn-outline-danger" href="#"
                                                onclick="delete_confirm({{ $loan -> id }})"
                                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i
                                                    class="fas fa-trash"></i></a>
                                            @endcan
                                        </div>
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
@push('js')

<script>
$('#review_interest').on('click', function() {

    var checked_loans = document.getElementsByName('checked_loans[]');
    var loan_ids_input = document.getElementsByName('loan_ids[]');
    var loan_ids = [];

    for (var i = 0; i < checked_loans.length; i++) {
        if (checked_loans[i].checked == true) {
            loan_ids.push(loan_ids_input[i].value);
        }
    }
    if (!loan_ids.length) {
        alert('At least one loan must be in selected');
    } else {
        $('#review_interest_modal').modal('show');
    }
});
</script>
<script>
$('#interest_rate_change').on('submit', function(e) {
    e.preventDefault();

    var checked_loans = document.getElementsByName('checked_loans[]');
    var loan_ids_input = document.getElementsByName('loan_ids[]');
    var loan_ids = [];

    for (var i = 0; i < checked_loans.length; i++) {
        if (checked_loans[i].checked == true) {
            loan_ids.push(loan_ids_input[i].value);
        }
    }
    
    $.ajaxSetup({
        headers:
        {
            'X-CSRF-Token' : "{{ csrf_token() }}"
        }
    });
    $.ajax({
        url : "{{ route('admin.loan.update-interest-rate') }}",
        type : "post",
        data:
        {
           new_rate : $('#new_interest_rate').val(),
           loan_ids : loan_ids,
        },
        success:function(response)
        {
             Swal.fire('Interest rate save successfully!!');
             $('#review_interest_modal').modal('hide');
        }
    });
});

function delete_confirm(loan_id)
{
    Swal.fire({
        title: 'Do you want to delete that loan?',
        showCancelButton: true,
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('admin.loan.delete-loan') }}",
                type: "post",
                data: {
                    festival_id: festival_id
                },
                success: function() {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#' + festival_id).remove();
                }
            })
        }
    })
}
</script>
@endpush