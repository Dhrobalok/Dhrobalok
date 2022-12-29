@extends('backend.admin.index')
@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
   
    <div class="row justify-content-center">
        <h4 style="font-size:17px;">মধ্যপাড়া গ্রানাইট মাইনিং কোম্পানী লিমিটেড</h4>
      
        {{-- <p>(পেট্টোবাংলার একটি কোম্পানি)</p> --}}

    </div>

    <div class="row justify-content-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <h5>(পেট্টোবাংলার একটি কোম্পানি)</h5>
      
        <div class="col-md-4">
              {{-- <p style="font-size:12px;display:inline-block;margin-left:89px;">কর সনাক্তকরণ সংখ্যা-৩৯৩৫৩১৬৯০৮২৫</p> --}}
              <p  style="font-size:12px;display:inline-block;margin-left:89px;">কর সনাক্তকরণ সংখ্যা-৩৯৩৫৩১৬৯০৮২৫</p>
        </div>
        
            
    </div>

    

    <div class="row justify-content-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h5 >মধ্যপাড়া,পার্বতীপুর,দিনাজপুর ।</h5>
        <div class="col-md-4">
            <p style="font-size:12px;display:inline-block;margin-left:89px;">কর সনাক্তকরণ সংখ্যা-৩৯৩৫৩১৬৯০৮২৫</p>

      </div>
        

    </div>

    <div class="row justify-content-center">
        <h6>চেক/স্থানান্তরের মাধ্যমে পরিশোধ ভাউচার</h6>
       

    </div>
    <br>
    <form action="{{ route('admin.voucher.debit.store') }}" method="post">
        @csrf
    <div class="row justify-content-sm-start">
      
             
        
            <div class="col-md-4">
                <label>টাকার পরিমাণ<span class="text-danger">*</span></label>
            </div>
            <div class="col-md-4">
                <label>ব্যাংক হিসাব নম্বর <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-4">
                <label>ভাউচার নম্বর <span class="text-danger">*</span></label>
            </div>
       

    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <input type="text" class="form-control" name="totalamount" id="totalamount" value="{{ old('email') }}" readonly>
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="acnumber" value="{{ old('email') }}">
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="voucherno" value="{{ old('password') }}">
            @if($errors -> has('password'))
            <small>{{ $errors -> first('password') }}</small>
            @endif
        </div>
       
    </div>
    
<br>
    <div class="row justify-content-sm-start">
      
             
        
        <div class="col-md-4">
            <label>চেক নম্বর<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <label>তারিখ <span class="text-danger">*</span></label>
        </div>
   

  </div>

  <div class="row justify-content-center">
    <div class="col-md-4">
        <input type="text" class="form-control" name="checkno" value="{{ old('email') }}">
        @if($errors -> has('email'))
        <small>{{ $errors -> first('email') }}</small>
        @endif
    </div>
    <div class="col-md-4">
     
    </div>
    <div class="col-md-4">
        <input type="date" class="form-control" name="date" value="{{ old('password') }}">
        @if($errors -> has('password'))
        <small>{{ $errors -> first('password') }}</small>
        @endif
    </div>
   
</div>

<br>
<br>
<div class="row justify-content-md-start">
  <p>টাকা (কথায়) :</p>


</div>

<div class="content">
    <div class="row justify-content-md-end">
          
        <div class="row">

            <div class="col-md-12 form-group text-right">
                <a href="#"  >লেনদেন
                </a>
            </div>
        </div>
    </div>

  <div class="row justify-content-md-start">
    <table class="table table-bordered table-striped" id="dynamicTable">
        <thead>
            <tr class = "text-center text-black">
                <th style="font-size:14px;">হিসাব নং</th>
                <th style="font-size:14px;">নোট</th>
                <th style="font-size:14px;">বিবরণ</th>
                <th style="font-size:14px;">টাকা</th>
                <th style="font-size:14px;"></th>
            </tr>
        </thead>
        <tbody id="entries">
          
                <tr>
                    @php
                        $chartall=App\Models\ChartOfAccount::get();
                    @endphp
                    
            <td>
                <select class="form-control chart" data="0"  name="chart[]" required>
                 
                      @foreach ($chartall as $chartalls)
                          
                     <option value="{{$chartalls->id}}">{{ $chartalls->name }}</option>
                    
                    @endforeach
    
                </select>
            </td>
            <td><input type="text" class="form-control" name="note[]"  class="js-flatpickr form-control bg-white" ></td>

            <td><input type="text" class="form-control" name="description[]" id="description0" class="js-flatpickr form-control bg-white"  readonly></td>
            <td><input type="number" value="" class="form-control amount" name="amount[]" id="amount0" class="js-flatpickr form-control bg-white" placeholder="পরিমাণ" onblur="sum()" required></td>

         <td><button type="button" name="add" id="add" class="btn btn-alt-primary">নতুন&nbsp;লেনদেন</button></td>
                </tr>

         
                
                
        </tbody>

    </table>


    <table class="table">
      
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td><td></td>
               
                
                <td>মোট</td>
                <td> =&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control"  id="total" value="" style="display: inline-block;height:50%;width:50%" readonly></td>

            </tr>

        </tbody>

        
           
        </footer>
    
    </table>

  </div>
    


</div>



<footer style="padding: 50px;">

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <input type="file" class="form-control" name="DeputyGeneralManager" value="{{ old('email') }}">
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>

        <div class="col-md-4">
            <input type="file" class="form-control" name="DeputyGeneralManager2" value="{{ old('email') }}">
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>

        <div class="col-md-4">
            <input type="file" class="form-control" name="GeneralManager" value="{{ old('email') }}">
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>



    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;
                উপ-মহাব্যবস্থাপক(অর্থ/হিসাব)<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;উপ-ব্যবস্থাপক(বিএন্ডএফ/এপিএন্ডবি)<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;মহাব্যবস্থাপক(হিসাব ও অর্থ)<span class="text-danger">*</span></label>
        </div>

    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <input type="file" class="form-control" name="Manager" value="{{ old('email') }}">
            @if($errors -> has('email'))
            <small>{{ $errors -> first('email') }}</small>
            @endif
        </div>
    </div>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <hr style="height:2px;border-width:0;color:gray;background-color:gray;">
            <label>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;
                &nbsp;
                ব্যবস্থাপক(এফএন্ডএল/এপিএন্ডবি)<span class="text-danger">*</span></label>
        </div>

    </div>

</footer>

   
<div class="row justify-content-center">

    <div >
        <button class="btn btn-primary" style="text-align: center">Submit</button>

    </div>
   

 </div>
</form>
  
</div>



<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){
       

        ++i;

        $("#dynamicTable").append('<tr>@php$chartall=App\Models\ChartOfAccount::get();@endphp<td><select class="form-control chart" data="'+i+'"  name="chart[]" required>@foreach ($chartall as $chartalls)<option value="{{$chartalls->id}}">{{ $chartalls->name }}</option>@endforeach</select></td> <td><input type="text" class="form-control" name="note[]"  class="js-flatpickr form-control bg-white" ></td><td><input type="text" class="form-control" name="description[]" id="description'+i+'" class="js-flatpickr form-control bg-white"  readonly></td><td><input type="number" class="form-control amount" data="'+i+'" name="amount[]" id="amount'+i+'" onblur="sum()" class="js-flatpickr form-control bg-white" placeholder="পরিমাণ"  required></td><td><i class="fa fa-trash-o delete" onblur="delete()" style="font-size:48px;color:red"></i></td></tr>');

    });

    $(document).on('click', '.delete', function(){
         $(this).parents('tr').remove();

         sum();
    });

   </script>

<script>
    function sum()
    {
        var total=0;

        $('.amount').each(function(index,value){
         
        total+= parseFloat($(this).val());
            
        });
        document.getElementById("total").value = total;
        document.getElementById("totalamount").value = total;

   

    }
</script>





{{-- <div class="container-fluid px-0">
    <div class="card mb-2">
            <div class="card-header bg-white">
               <div class="row">
                   <div class="col-md-6">
                     <a class = "mr-4" href = "{{ route('admin.voucher.debit.index') }}" style = "color:blue;font-weight:500;font-size:22px"><i class = "fa fa-arrow-circle-left mr-2"></i>Back</a>
                   </div>

               </div>
            </div>
        </div>
    <div class="card" id="create-tab">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col-md-8">
                    <strong class="f-roboto mt-3">Payment Voucher</strong>
                </div>
                <div class="col-md-4 text-right">
                    <a href="#" id="preview">
                        Preview</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <form id="debit_voucher_form">

                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Vendor Name </label>
                    </div>
                    <div class="col-md-10">
                        <select class = "form-control" name = "voucher_for" id = "voucher_for">
                            @foreach($vendors as $vendor)
                            <option value= "{{ $vendor -> id }}">{{ $vendor -> name  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <?php $row_cnt = 0; ?>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Voucher Date</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" id="voucher_date" name="voucher_date"
                            class="js-flatpickr form-control bg-white" placeholder="Voucher Date" required>
                        <small>
                            @if($errors->has('voucher_date'))
                            <h5>{{ $errors -> first('voucher_date') }}</h5>
                            @endif
                        </small>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Posted By</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="posted_by" name="posted_by">
                            <option value="{{ $logged_employee -> id }}" selected hidden>
                                {{ $logged_employee -> name }}</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Paid By</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <select class="form-control" id="paid_by" name="paid_by">
                            <option value="1">Cash</option>
                            <option value="2">Bank</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Submitted By</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="submitted_by" name="submitted_by">
                            <option value="{{ $logged_employee -> id }}" selected hidden>
                                {{ $logged_employee -> name }}</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee -> id }}">{{ $employee -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2 form-group">
                        <label>Bank Name</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <select class="form-control" id="bank_name" name="bank_name">
                            <option value="0">Select Bank</option>
                            @foreach($banks as $bank)
                            <option value="{{ $bank -> id }}">{{ $bank -> bank_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Cheque Number</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <select class="form-control" id="cheque_number" name="cheque_number">

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <label>Credit Account</label>
                    </div>
                    <div class="col-md-5 form-group">
                        <select class="form-control" id="select_credit_account" name="select_credit_account">
                            <option value="0">--Credit Account--</option>
                        </select>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 form-group text-right">
                        <a href="#"  id="add_transaction">Add
                            New Transaction</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="all_records">
                    <thead>
                        <tr class = "text-center text-black">
                            <th style="font-size:14px;">Account</th>
                            <th style="font-size:14px;">Description</th>
                            <th style="font-size:14px;">Amount</th>
                            <th style="font-size:14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="entries">

                    </tbody>
                </table>

                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block f-100"
                            style="background-color:blue;color:white">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card" id="preview-tab" style = "display:none">
        <div class="card-body">
            <div class="row text-right">
                <div class="col-md-12">
                    <a href = "#" id = "back"><i class = "fa fa-angle-left mr-2"></i>Back</a>
                </div>
            </div>
            <div class="row text-center text-black">
                <div class="col-md-12">
                    <label class="f-roboto" style="font-size:25px;">Debit Voucher</label>
                </div>
            </div>
            <div class="row text-center text-black">
                <div class="col-md-12">
                    <label class="f-100" style="font-size:25px;">{{ $company_details -> company_name }}</label>
                </div>
            </div>
            <div class="row text-center text-black form-group">
                <div class="col-md-12">
                    <label class="f-100" style="font-size:20px;">{{ $company_details -> company_address }}</label>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Voucher No : </strong>Not Set Yet</p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Date : </strong><span id="voucher_date_2"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Paid By : </strong><span id="paid_by_2"></span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Cheque No : </strong><span id="cheque_no"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <p class="text-black"><strong>Paid To : </strong><span id="paid_to"></span></p>
                </div>
                <div class="col-md-6">
                    <p class="text-black"><strong>Prepared By : </strong><span id="prepared_by"></span></p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <table class="table table-striped table-sm table-bordered bg-white">
                        <thead>
                            <tr class="text-black text-center">
                                <th>Account</th>
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                            </tr>
                        </thead>
                        <tbody id="voucher_entries">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

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

input.custom-checkbox {
    transform: scale(1.5);
    margin-right: 9%;
    margin-top: 5%;
}

label,
h5 {
    font-family: 'Gentium Basic'
}

.list-group {
    font-family: 'Gentium Basic';
    font-size: 20px;
    line-height: 14px;
    background: white;
}
</style>

@endpush

{{-- <script>
$(document).ready(function() {

//     // $("#select_credit_account").select2({

//     //     ajax: {
//     //         url: "{{ route('ajax.search-term-matched-accounts') }}",
//     //         type: "post",
//     //         dataType: 'json',
//     //         delay: 250,
//     //         data: function(params) {
//     //             return {
//     //                 searchTerm: params.term,
//     //                 '_token': "{{  csrf_token() }}"
//     //             };
//     //         },
//     //         processResults: function(response) {
//     //             return {
//     //                 results: response
//     //             };
//     //         },
//     //         cache: true
//     //     }
//     // });

//     $('#add_transaction').click(function(e) {

//         e.preventDefault();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-Token': "{{ csrf_token() }}"
//             }
//         })
//         $.ajax({
//             url: "{{ route('ajax.get-accounts') }}",
//             type: "get",
//             data: {
//                 applyType : 0
//             },
//             success: function(options) {

//                 $('#entries').append(options);
//             },
//             error: function(data) {}
//         });
//     });

// //     $('#debit_voucher_form').submit(function(e) {
// //         e.preventDefault();
// //         $(document).find('.help-block').remove();
// //         $(document).find('.form-control').removeClass('form-error');
// //         const voucherData = new FormData($(this)[0]);

// //         if(confirm('Are you sure to post that voucher?'))
// //         {
// //             $.ajaxSetup({
// //                 headers: {
// //                     'X-CSRF-TOKEN': "{{ csrf_token() }}"
// //                 }
// //             });
// //             $.ajax({
// //                 url: "{{ route('admin.voucher.debit.store') }}",
// //                 type: "post",
// //                 data: voucherData,
// //                 processData:false,
// //                 contentType:false,
// //                 success: function(message) {
// //                     $('#debit_voucher_form')[0].reset();
// //                     $('#entries').html('');
// //                     showSuccessWindow(message);
// //                 },
// //                 error: function(data) {
// //                     var errors = data.responseJSON;
// //                     if ($.isEmptyObject(errors) == false) {
// //                         $.each(errors.errors, function(key, value) {
// //                             $('#' + key)
// //                                 .closest('.form-control')
// //                                 .addClass('form-error')
// //                             $('<span class="help-block"><strong>' +
// //                                 value + '</strong></span>').insertAfter('#' +
// //                                 key);
// //                         });
// //                     }
// //                 }
// //             });
// //         }
// //     });
// // });

// function remove(child_ref) {

//     event.preventDefault();
//     $(child_ref).closest('tr').remove();
// }

// $('#bank_name').on('change', function() {

//     const bank_id = $(this).val();
//     if (bank_id == 0)
//         return;
//     $.ajax({
//         url: "{{ route('ajax.cheque-pages') }}",
//         type: "get",
//         data: {
//             bank: bank_id,
//             credit_account: $('#select_credit_account').val()
//         },
//         success: function(options) {
//             $('#cheque_number').html(options);
//         }
//     })
// })

// $('#preview').click(function(e) {
//     e.preventDefault();

//     var amounts = document.getElementsByName('amounts[]');
//     var descriptions = document.getElementsByName('descriptions[]')
//     var coa_ids = document.getElementsByName('coa_ids[]');
//     var total_amount = 0;

//     for (i = 0; i < descriptions.length; i++) {
//         total_amount += parseInt(amounts[i].value);
//     }
//     var all_records = '';
//     all_records += '<tr>' +
//         '<td>' + $('#select_credit_account option:selected').text() + '</td>' +
//         '<td>Purchase Materials</td>' +
//         '<td></td>' +
//         '<td>' + total_amount + '</td>' +
//         '</tr>';
//     for (i = 0; i < amounts.length; i++) {
//         all_records += '<tr>' +
//             '<td>' + coa_ids[i].options[coa_ids[i].selectedIndex].text + '</td>' +
//             '<td>' + descriptions[i].value + '</td>' +
//             '<td>' + amounts[i].value + '</td>' +
//             '<td></td>' +
//             '</tr>';
//     }
//     $('#voucher_entries').html('');
//     $('#voucher_entries').append(all_records);
//     $('#prepared_by').html($('#posted_by option:selected').text());
//     $('#voucher_date_2').html($('#voucher_date').val());
//     $('#paid_to').html($('#voucher_for option:selected').text());
//     $('#paid_by_2').html($('#paid_by option:selected').text());
//     $('#cheque_no').html($('#cheque_number option:selected').text());

//     $('#preview-tab').css({'display': ''});
//     $('#create-tab').css({'display': 'none'})
// })

// $('#back').click(function(e){

//    e.preventDefault();
//    $('#preview-tab').css({ 'display' : 'none' });
//    $('#create-tab').css({ 'display' : '' });
// });
</script> --}}

@push('js')
<script>
     $(document).on('change','.chart',function(){
       
    // let i=$(this).attr('data');
    // var total=$('#amount'+i).val()+total;
    

    let index=$(this).attr('data');
   
    // var x=document.getElementById("amount").value;
    //   alert(total);
       
    // var total=total+x;
    // document.getElementById("total").innerHTML = total;


    const student_id = $(this).val();
    $.ajax({
        url : "{{ route('description.find') }}",
        type : "get",
        data : { student_id : student_id },
        success:function(res)
        {
          // designationsalert(res)
           $('#description'+index).val(res['description']);
           
           $("#total").text(total);

        //    $('#name').val(res['teacher_name']);
        //    $('#designations').val(res['teacher_designation']);
           
           
        
      
        }
    });
})
</script>




{{-- <script>
$('.amount').on('click', function(e) {
    // e.preventDefault();
    var index=$(this).attr('data');
    // var index=[];
    // var index=100;
    // x=$('#amount'+index).val();
    y=index+200;
    $("#total").val(index);
});

// //     $(document).on('change','.amount',function(){
    
// //     var index=$(this).attr('data');
// //      x=$('#amount'+index).val()
     
// //     y=67;
// //     total = x +y;
   
// //       alert(total)
// // //    let index=$(this).attr('data');
  
// //    // var x=document.getElementById("amount").value;
// //    //   alert(total);
      
// //    // var total=total+x;
// //    // document.getElementById("total").innerHTML = total;


  
  
// })
</script> --}}





    
@endpush


