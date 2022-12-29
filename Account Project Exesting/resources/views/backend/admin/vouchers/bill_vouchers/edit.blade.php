@extends('backend.admin.index')
@section('content')
<div class="container-fluid shadow-sm bg-white">
    <div class="block-content block-content-full">

       <div class="card border-info">
          <div class="card-header border-info f-100">
             <b>Online Bill Update</b>
          </div>
          <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-3">
                <label>Voucher Date</label>
            </div>
            <div class="col-md-3">
                <label>Posted By</label>
            </div>
            <div class="col-md-3">
              <label>Voucher By</label>
            </div>
        </div>
        <div class="row form-group justify-content-center">
            <div class="col-md-3 form-group">
                <input type="text" id="voucher_date" name="voucher_date" class="js-flatpickr form-control bg-white"
                    placeholder="Voucher Date" value="{{ $voucher -> date }}" readonly>
            </div>
          
            <div class="col-md-3 form-group">
                <select class="form-control" id="posted_by" name="posted_by" id = "posted_by">
                    <option value="{{ $voucher -> submitted_by }}" selected hidden>{{ $voucher -> submitted_by }}
                    </option>
                    <option>abc</option>
                    <option>bcd</option>
                </select>
            </div>
            <div class="col-md-3">
               <input type = "text" class = "form-control" readonly value = "{{ $voucher -> voucher_by }}">
            </div>
        </div>

        <div class="row justify-content-center">
           <div class="col-md-3">
              <label>Transaction COA</label>
           </div>
           <div class="col-md-3">
             <label>COA</label>
           </div>
           <div class="col-md-3">
             <label>Transaction method</label>
           </div>
        </div>
        <div class="row justify-content-center form-group">
           <div class="col-md-3">
              <select class = "form-control" id = "transaction_coa">
              </select>
           </div>
           <div class="col-md-3">
             <select class = "form-control" id = "coa">
             </select>
           </div>
           <div class="col-md-3">
              <select class = "form-control" id = "transaction_method">
                       
                        <option value = {{ $voucher -> transaction_method_id }} selected hidden>{{ $voucher -> transaction_method -> name }}</option>
                        <option value=0>N/A</option>
                        <option value=1>Cash</option>
                        <option value=2>Bank</option>
              </select>
           </div>
        </div>
        
       
        @csrf
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                    <th style="font-size:14px;">Description</th>
                    <th style="font-size:14px;">Amount</th>

                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                 <tr>
                       <td>{{ $detail -> description }}</td>
                       <td>{{ $detail -> credit_amount }}</td>
                 </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row form-group">
            <div class="col-md-12">
                <table class="table table-striped bg-white">
                    <thead>
                        <tr>
                            <th style="font-size:14px;">Approved/Rejected By</th>
                            <th style="font-size:14px;">Comment</th>
                            <th style="font-size:14px;">Status</th>
                            <th style="font-size:14px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr class = "bg-white">

                            <td>{{ App\Models\User :: find($log -> user_id) -> name }}</td>
                            <td>{{ $log -> comment }}</td>
                            <td>{{ App\Models\VoucherStatus :: find($log -> status) -> name }}</td>
                            <td>{{ $log -> created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       <div class="row justify-content-center">
         <div class="col-md-2">
           <button type = "button" id = "save_changes" class = "btn btn-info form-control">Post</button>
         </div>
       </div>
          </div>
       </div>
    </div>
</div>

@endsection

@push('js')
<script>
window.Details = '';
$(document).ready(function() {

    $("#coa").select2({

        ajax: {
            url: "{{ route('get-accounts') }}",
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
    $("#transaction_coa").select2({

        ajax: {
            url: "{{ route('get-accounts') }}",
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
});

</script>

<script>
$(document).ready(function() {
    $('#add_new').click(function(e) {
        e.preventDefault();
        $('#add_new_container').css({
            'display': 'block'
        })
    });

    $('#save_changes').click(function(e){

       var voucher_date = $('#voucher_date').val();
       var posted_by = $('#posted_by').val();
       
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ route('update-bill') }}",
            type : "POST",
            data :
            {
                id : "{{ $voucher -> id }}",
                voucher_date : voucher_date,
                posted_by : posted_by,
                transaction_coa : $("#transaction_coa").val(),
                coa : $("#coa").val(),
                transaction_method : $("#transaction_method").val()
            },
            success : function(response)
            {
                $.notify(response,'success');
            }
        })
    });
})
</script>

@endpush