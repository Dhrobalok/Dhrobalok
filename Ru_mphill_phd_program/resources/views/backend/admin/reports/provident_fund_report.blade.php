@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class = "f-roboto">Provident Fund Report</div>
                </div>
                <div class="card-body bg-white">
                    <form method="get" action="{{ route('download-pf-monthly-statement') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-3">
                                <select class="form-control" name="year">
                                    @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="month">
                                    
                                    @for($month = 1 ; $month <= 12; $month++) @php
                                        $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                        value="{{ $month_name }}">{{ $month_name }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                               <select class = "form-control" name = "report_type" id = "report_type">
                                   <option value = "all">All</option>
                                   
                               </select>
                            </div>
                            <div class="col-md-3" style = "display:none" id = "employee_tab">
                                <select class = "form-control" name = "employee_id">
                                    @foreach($employees as $employee)
                                      <option value = "{{ $employee -> id }}">{{ $employee -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                               <button type = "submit" class = "btn btn-danger f-100"><i class = "fa fa-file-pdf mr-2"></i>Print</button>
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
    $('#report_type').change(function(){
        
        if($(this).val() == 'individual')
         $('#employee_tab').show();
         else 
         $('#employee_tab').hide();
    });
</script>
@endpush