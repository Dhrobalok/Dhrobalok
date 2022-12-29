@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="f-roboto">Cost Center Report</div>
                </div>
                <div class="card-body bg-white">
                    <form id="cost_center_report" action = "{{ route('admin.report.cost-center.pdf') }}" method = "post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label>Report Type</label>
                            </div>
                            <div class="col-md-3">
                                <label>Select Head / Code</label>
                            </div>
                            <div class="col-md-3">
                                <label>Start Date</label>
                            </div>
                            <div class="col-md-3">
                                <label>End Date</label>
                            </div>

                        </div>
                        
                        <div class="row form-group text-center">
                            <div class="col-md-3">
                                <select class="form-control" name="report_type" id = "report_type">
                                    <option value="none">Select Type</option>
                                    <option value="head">Head Wise</option>
                                    <option value="code">Code Wise</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="item_id" id="items">
                                   
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="start_date" class="js-flatpickr form-control bg-white"
                                    placeholder="Start Date" name="start_date">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="end_date" class="js-flatpickr form-control bg-white"
                                    placeholder="End Date" name="end_date" required>
                            </div>
                        </div>


                        <div class="row text-center form-group">
                            <div class="col-md-12">
                                <button type="submit" id="go" class="btn btn-primary f-100">Go</button>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 text-right">
                                <button type = "submit" id = "print" class = "btn btn-danger btn-sm text-white f-100"><i class = "fa fa-print mr-2"></i>Print</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12" id="fillter_results">

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
$('#go').click(function(event) {

    event.preventDefault();
    $('#go').html('<i class = "fa fa-spinner fa-spin"></i>');
    const Data = new FormData($('#cost_center_report')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        }
    });

    $.ajax({

        url: "{{ route('admin.report.cost-center.generate') }}",
        type: "post",
        data: Data,
        processData: false,
        contentType: false,
        success: function(res) {
           $('#fillter_results').html(res);
        }
    }).done(function() {
        $('#go').text('Go');
    });
});

$('#print').click(function() {

    $('#cost_center_report').submit();
});

$('#report_type').change(function(){
    
    const type = $(this).val();
    $.ajax({
        url : "{{ route('ajax.get-cost-center-options') }}",
        type:"get",
        data:{ type : type },
        success:function(options)
        {
            $('#items').html(options);
        }
    });
});
</script>
@endpush