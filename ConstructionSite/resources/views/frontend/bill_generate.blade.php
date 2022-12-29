@extends('frontend.layout')
@section('content')
<div class="row justify-content-center" style="padding-top:10px;">
    <div class="col-lg-12">

        <div class="card shadow-lg">
            <div class="card-header bg-white">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background-color:#blue">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                        @if($user -> bill_user -> status == 1)
                        <a class="nav-item nav-link" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab"
                            aria-controls="nav-loan" aria-selected="false">Create New Bill</a>
                        @endif
                    </div>
                </nav>
            </div>
            <div class="card-body">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        
                                        <div class="row justify-content-center">
                                            <h5>{{ $user -> name }}</h5>
                                        </div>
                                        <div class="row justify-content-center">
                                            <label>{{ $user -> email }}</label>
                                        </div>
                                        <div class="row justify-content-center">
                                            <label>{{ $user -> bill_user -> contact_no }}</label>
                                        </div>
                                        <div class="row justify-content-center">
                                            <label>{{ $user -> bill_user -> address }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                       <h6>Previous Bills</h6>
                                       <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                

                    <!-- Loan nav starts here -->
                    <div class="tab-pane fade" id="nav-loan" role="tabpanel" aria-labelledby="nav-loan-tab">

                        <div class="row form-group justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-sm">
                                    
                                    <div class="card-body">
                                        <form id="bill_submit">
                                           <div class="row form-group">
                                              <div class="col-lg-2">
                                                  <label>Date</label>
                                              </div>
                                              <div class="col-lg-5">
                                                <input type = "date" class = "form-control" id = "bill_date">
                                              </div>
                                              <div class="col-lg-5 text-right">
                                                <button type = "button" class = "btn btn-dark" id = "add_new_record">+</button>
                                              </div>
                                           </div>
                                           <div class="row">
                                              <div class="col-lg-8">
                                                <labe>Description</labe>
                                              </div>
                                              <div class="col-lg-4">
                                                <label>Amount</label>
                                              </div>
                                           </div>
                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-8">
                                                   <input type = "text" class = "form-control" name = "description[]">
                                                   
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="number" class="form-control" step="any"
                                                        id="amount" name = "amount[]">
                                                </div>
                                            </div>

                                           
                                           
                                            
                                           
                                            <div class="row justify-content-center" id = "submit_form_area">
                                                <div class="col-lg-3">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('js')
<script>
  $('#add_new_record').click(function(){
        
        var new_content = '<div class="row justify-content-center form-group">'+
                                                '<div class="col-lg-8">'+
                                                   '<input type = "text" class = "form-control" name = "description[]">'+
                                                   
                                                '</div>'+
                                                '<div class="col-lg-4">'+
                                                    '<input type="number" class="form-control" step="any"'+
                                                        'id="amount" name = "amount[]">'+
                                                '</div>'+
                                            '</div>';
       
        $(new_content).insertBefore('#submit_form_area');

  });

  $('#bill_submit').submit(function(e){
      e.preventDefault();
      var descriptions = document.getElementsByName('description[]');
      var amount = document.getElementsByName('amount[]');
      var date = $('#bill_date').val();
      var des_array = [];
      var amount_arr = [];

      for(var i = 0; i < descriptions.length; i++)
      {
          des_array.push(descriptions[i].value);
          amount_arr.push(amount[i].value);
      }

      $.ajaxSetup({
          headers:
          {
              'X-CSRF-Token' : "{{ csrf_token() }}"
          }
      });

      $.ajax({
          url : "{{ route('save-bill-voucher') }}",
          type : "post",
          data:
           {
               date : date,
               descriptions : des_array,
               amounts : amount_arr
           },
           success:function(response)
           {
              $('#bill_submit').trigger("reset");
              toastr.success('Bill submitted successfully');
           }
      })
      
  })
</script>
@endpush