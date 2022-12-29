@extends('backend.admin.index')
@section('content')
<div class="block block-rounded" style="margin-left:22%;margin-right:2%;margin-top:7%;">
    <div class="block-header block-header-default">
        <h3 class="block-title">Provident Fund Contributions</h3>
        @can('process provident')
        <button class="btn btn-dark text-center f-100" id="process_pf" style="margin-right:10px;">Process PF.</button>
        @endcan
        @can('create provident')
        <a href="{{route('admin.pf-contribution.create')}}"><i class="fa fa-plus" style="float: right;"
                data-toggle="tooltip" title="New Contribution"></i></a>
        @endcan
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>

                <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Name</th>
                    <th class="d-none d-sm-table-cell text-center">Year</th>
                    <th class="d-none d-sm-table-cell text-center">Month</th>

                    <th class="d-none d-sm-table-cell text-center">Employee Contribution</th>
                    <th class="d-none d-sm-table-cell text-center">Company Contribution</th>
                    <th class="d-none d-sm-table-cell text-center">Total</th>
                    <!-- <th class="d-none d-sm-table-cell text-center">Actions</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr id="{{ $user -> employee_id }}">


                    @php
                    $employee = App\Models\Employee::find($user->employee_id);
                    $employee_name = $employee->name;
                    @endphp
                    <td class="text-center">{{ date('d-m-Y',strtotime($user-> date) ) }}</td>
                    <td class="text-center">{{ $employee_name }}</td>

                    <td class="text-center">{{ $user-> year }}</td>
                    <td class="text-center">{{ $user-> month }}</td>

                    <td class="text-center" style="width:5%">{{ (10/100)* $employee -> payscale}}</td>
                    <td class="text-center" style="width:5%">{{ (8.33/100)*$employee -> payscale }}</td>
                    <td class="text-center">{{ (10/100)* $employee -> payscale + (8.33/100)*$employee -> payscale}}</td>
                    <!-- <td>
                        <div class="btn-group">
                            @can('view provident')
                            <a class="btn btn-sm btn-outline-primary"
                                <!-- href="{{ route('admin.pf-contribution.view',['id' => $user -> id]) }}"
                                style="border-radius:5px 5px 5px 5px"><i class="fas fa-info-circle"></i></a>
                            @endcan
                            @can('edit provident')
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.pf-contribution.edit', ['id' => $user->id])}}"
                                style="margin-left:8%;border-radius:5px 5px 5px 5px"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete provident')
                            <a class="btn btn-sm btn-outline-primary" href="#"
                                onclick="delete_confirm({{ $user -> id}})"
                                style="color:red;border-color:red;margin-left:8%;border-radius:5px 5px 5px 5px"><i
                                    class="fas fa-trash-alt"></i></a>
                            @endcan


                        </div>
                    </td> -->

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="process_pf_modal" tabindex = "-1"  role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="process_pf_modal">Process Provident Fund</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Select Employee</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control" id='employees_list' style = "width:100%;">
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-md-4">
                        <label>Year</label>
                    </div>
                    <div class="col-md-4">
                        <label>Month</label>
                    </div>
                </div>



                <div class="row form-group">

                    <div class="col-md-4">
                        <select class="form-control" id="year">
                            @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}</option>
                                @endfor
                        </select>

                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="month">
                            @for($month = 1 ; $month <= 12; $month++) @php
                                $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                value="{{ $month_name }}">{{ $month_name }}</option>
                                @endfor
                        </select>
                    </div>
                </div>


                <hr>
                <div class="row">

                    <div class="col-md-4">
                        <label>Employe Interest Rate</label>
                    </div>

                    <div class="col-md-4">
                        <label>Company Interest Rate</label>
                    </div>


                </div>

                <div  class="row form-group">
                    <div class="col-md-4">
                        <input type="number" step="any" class="form-control" id = "e_rate">
                    </div>

                    <div class="col-md-4">
                        <input type="number" step="any" class="form-control" id = "c_rate">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label>Process By</label>
                    </div>
                    <div class="col-md-6">
                        <label>Process Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @php $user = Auth :: user(); @endphp
                        <input type="text" value="{{ $user -> name }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary f-100" id = "proceed">Proceed</button>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
function delete_confirm(employee_id) {
    Swal.fire({
        title: 'Do you want to delete this entry ?',
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
                url: "{{ route('admin.pf-contribution.delete') }}",
                type: "post",
                data: {
                    id: employee_id
                },
                success: function() {
                    Swal.fire('Deleted Successfully!', '', 'warning');
                    $('#' + employee_id).remove();
                }
            })
        }
    })
}
</script>
<script>
$('#process_pf').on('click', function() {
    $('#process_pf_modal').modal('show');
});

$(document).ready(function() {
    $("#employees_list").select2({

        ajax: {
            url: "{{ route('ajax.employees') }}",
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

   $('#proceed').click(function(){

       var employee_id = $("#employees_list").val();
       var e_rate  = $('#e_rate').val();
       var c_rate  = $('#c_rate').val();
       var year = $('#year').val();
       var month = $('#month').val();

       $.ajaxSetup({
           headers:
           {
               'X-CSRF-Token' : "{{ csrf_token() }}"
           }
       });
       $.ajax({
           url : "{{ route('admin.pf-process.save') }}",

           type : "post",
           data:
           {
               employee_id : employee_id,
               e_rate : e_rate,
               c_rate : c_rate,
               year : year,
               month : month,
           },
           success:function(response)
           {
               Swal.fire(response);
              $('#process_pf_modal').modal('hide');
           }
       })
   })
})
</script>

@endpush
