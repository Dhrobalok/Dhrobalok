@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-info">
               <div class="card-header">
                  <div class = "f-roboto">Account Configuration for House Building Loan</div>
               </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Loan</label>
                        </div>
                        <div class="col-md-4">
                            <label>Principal Account</label>
                        </div>
                        <div class="col-md-4">
                            <label>Interest Rate Account</label>
                        </div>
                    </div>
                    <form id="loan_account_setup">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <select class="form-control" id="loans">
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="principal_account">
                                    <option>Select Account</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="interest_account">
                                    <option>Select Account</option>
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-md-3">
                            <button type = "submit" class  = "btn btn-primary f-100">Save</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$(document).ready(function() {
    $("#principal_account").select2({

        ajax: {
            url: "{{ route('ajax.search-term-matched-accounts') }}",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term,
                    '_token': "{{  csrf_token() }}"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $("#interest_account").select2({

        ajax: {
            url: "{{ route('ajax.search-term-matched-accounts') }}",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term,
                    '_token': "{{  csrf_token() }}"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $("#loans").select2({

        ajax: {
            url: "{{ route('ajax.loans') }}",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term,
                    '_token': "{{  csrf_token() }}"
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

   $('#loan_account_setup').submit(function(e){
       e.preventDefault();

       $.ajaxSetup({
           headers:
           {
               'X-CSRF-Token' : "{{ csrf_token() }}",

           }
       });

       $.ajax({
            
            url : "{{ route('admin.loan.save-loan-account') }}",
            type : "post",
            data:
            {
                loan_id : $('#loans').val(),
                principal_account : $('#principal_account').val(),
                interest_account : $('#interest_account').val()
            },
            success:function(response)
            {
                $.notify('Record Save Successfully!!','success');
            }
       });
   })
})
</script>
@endpush