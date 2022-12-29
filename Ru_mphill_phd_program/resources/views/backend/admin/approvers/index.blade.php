@extends('backend.admin.index')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="f-roboto">Approver Configuration</div>

    </div>
    <div class="card-body">
        <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr class = "text-black">

                    <th class="d-none d-sm-table-cell text-center">Voucher Type</th>
                    <th class="d-none d-sm-table-cell text-center">Voucher Code</th>
                    <th class="d-none d-sm-table-cell text-center">Approval Flow</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($voucher_types as $type)
                <tr>

                    <td class="text-center">{{ $type -> description }}</td>
                    <td class="text-center">{{ $type -> code }}</td>
                    <td class="text-center">
                    <?php $cnt = 0; ?>
                      @foreach($type -> getApprovers as $approver)
                       @if($cnt != 0)
                       <i class="fa fa-arrow-right"></i>
                       @endif
                       @php
                         $employee = $approver -> getInfo -> employeeInfo;
                         $designation = $employee -> designation;
                       @endphp
                       {{ $employee -> name }}({{ $designation -> name }})
                       <?php $cnt = $cnt + 1; ?>
                      @endforeach
                    </td>
                    <td class="text-center">
                        @can('approve_setup vouchers')
                        <a href="#" id = "{{ $type -> id . 'edit' }}" onclick = "approve_flow_edit(this.id)">Edit</a>
                        @endcan
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="edit_voucher_approve_control" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
               <div class = "f-roboto">Approval Panel Configuration</div>
            </div>
            <div class="modal-body">
                <form id="voucher_approve_settings">
                    <input type="hidden" id="voucher_type_id" name = "voucher_type_id">
                    <div class="row form-group justify-content-center">

                            <div class="col-md-6">
                                <select style="width:100%" class="form-control" id="users">
                                    <option value=0>Select Approver</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary f-100"  id = "add_new_approver">
                                    <i class="fa fa-plus mr-2"></i>
                                      Add
                                    </button>
                            </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="d-none d-sm-table-cell text-center">Approver Name</th>
                                        <th class="d-none d-sm-table-cell text-center">Designation</th>
                                        <th class="d-none d-sm-table-cell text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id = "approvers_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 btn-group">

                            <button class="btn" type="submit"
                                style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Save Changes</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
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

#delete {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    color: blue;
    border-color: blue;
    border-radius: 10%;
}

#edit {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    border-color: blue;
    color: blue;
    border-radius: 10%;
}
</style>
@endpush
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
            $('#approvers_list').html(response);
        }
    })
    $('#edit_voucher_approve_control').modal('show');
}

$('#add_new_approver').click(function(){
    console.log('hello world');
    $.ajax({

        url : "{{ route('add-new-approver') }}",
        type : "get",
        data : { user_id : $('#users').val() },
        success:function(res)
        {
            $('#approvers_list').append(res);
        }
    });
})

function delete_user(UserId)
{
    $('#' + UserId).remove();
}
$(document).delegate('#voucher_approve_settings','submit',(function(e){
    e.preventDefault();

    $.ajaxSetup({
        headers :
        {
            'X-CSRF-Token' : "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url : "{{ route('save-approver-settings') }}",
        type : "post",
        data : new FormData($('#voucher_approve_settings')[0]),
        contentType:false,
        processData:false,
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
