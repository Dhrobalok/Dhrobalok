@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
           <div class="card-body">
           <form id="voucher_approve_settings">
                <input type="hidden" id="voucher_type_id">
                <div class="row form-group justify-content-center">

                    <div class="col-md-4">
                        <select style="width:100%" class="form-control" id="users">
                            <option value=0>Select Approver</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="order">
                    </div>
                    <div class="col-md-2">
                        <buttonb type="submit" class="btn" style="background-color:white;" id="add_new_approver">
                            <i class="fa fa-plus"></i>
                            </button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell text-center">Approver Name</th>
                                    <th class="d-none d-sm-table-cell text-center">Order</th>
                                    <th class="d-none d-sm-table-cell text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="approvers_list">
                              @foreach($approvers as $approver)
                              <tr id ="{{ $approver -> user_id}}">
                              <td class = "text-center">{{ $approver -> user_info -> name}}</td>
                              <td class = "text-center">{{ $approver -> order }}</td>
                              <td class = "text-center">
                              <a class = "btn btn-danger" onclick = "delete_user({{ $approver -> user_id }})">X</a>
                              </td>
                              <input type = "hidden" name = "user_ids[]" value ="{{ $approver -> user_id }}">
                              <input type = "hidden" name = "order[]" value ="{{ $approver -> order }}">
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3  btn-group">

                        <button class="btn" type="submit"
                            style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Save
                            Changes</a>
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
    $("#users").select2({

        ajax: {
            url: "{{ route('admin.approvers.get-users') }}",
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
})

function approve_flow_edit(VoucherType)
{
    $('#voucher_type_id').val(parseInt(VoucherType));
    $.ajax({
        url : "{{ route('edit-voucher-approvers')}}",
        type : "GET",
        data : { VoucherType : VoucherType },
        success : function(response)
        {
            $('#approvers_list').append(response);
        }
    })
    $('#edit_voucher_approve_control').modal('show');
}

$('#add_new_approver').click(function(){
    UserName = $('#users option:selected').text();
    UserId = $('#users').val();
    Order = $('#order').val();
    Approver = '<tr id ='+ UserId + '>'+
       '<td class = "text-center">'+ UserName + '</td>' +
       '<td class = "text-center">'+ Order + '</td>' +
       '<td class = "text-center">' +
         '<a class = "btn btn-danger" onclick = "delete_user('+ UserId + ')">X</a>'+
       '</td>'+
       '<input type = "hidden" name = "user_ids[]" value ='+UserId+'>'+
       '<input type = "hidden" name = "order[]" value ='+Order+'>'+
    '</tr>';
    $('#approvers_list').append(Approver);
})

function delete_user(UserId)
{
    $('#' + UserId).remove();
}
$(document).delegate('#voucher_approve_settings','submit',(function(e){
    e.preventDefault();
    var users = document.getElementsByName('user_ids[]');
    var ordering = document.getElementsByName('order[]');
    var voucherType = $('#voucher_type_id').val();
    var user_ids = [];
    var user_ordering = [];
    for(var i = 0; i < users.length; i++)
    {
        user_ids.push(users[i].value);
        user_ordering.push(ordering[i].value);
    }
    
    $.ajaxSetup({
        headers :
        {
            'X-CSRF_Token' : "{{ csrf_token() }}"
        }
    });
    
    $.ajax({
        url : "{{ route('admin.loan.save-approvers') }}",
        type : "post",
        data : 
        {
            voucherType : voucherType,
            approvers : user_ids,
            approve_serial : user_ordering
        },
        success:function(response)
        {
            $('#voucher_approve_settings')[0].reset();
            $('#edit_voucher_approve_control').modal('hide');
            $.notify('Approval Flow Configuration updated Successfully!!','success');

        }
    })
}));
</script>
@endpush