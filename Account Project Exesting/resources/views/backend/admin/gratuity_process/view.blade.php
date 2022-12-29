@extends('backend.admin.index')

@section('content')
<!-- Page Content -->
<div class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Dynamic Table Full -->
    <div class="block-content block-content-full">

        <form id="accounts_form_create" action="{{ route('admin.gratuity-process.index') }}" method="get">
            @csrf
            <!-- @method('PATCH') -->
            <div class="card border-info">
                <div class="card-header">
                    <h4 class="text-center f-100">Generated Gratuity</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Employee(ID)</label>
                        </div>
                        <div class="form-group col-md-4" style="float:left; background-color: white;">
                            @php
                            $employee_name = App\Models\Employee::find($user->employee_id)->name;
                            $retd_date = substr($user->retd_date, 0, 10);
                            $gratuity_date = substr($user->gratuity_date, 0, 10);
                            @endphp
                            <label>{{$employee_name}}({{$user->employee_id}})</label>
                        </div>
                        <div class="col-md-2">
                            <label>Retire Date</label>
                        </div>
                        <div class="col-md-3" style="background-color: white;">
                            <label>{{$retd_date}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Gratuity Date</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$gratuity_date}}</label>
                        </div>
                        <div class="col-md-2">
                            <label>Status</label>
                        </div>
                        <div class="col-md-3" style="background-color: white;">
                            @if($user->status == 1)
                            <label>Generated</label>
                            @else
                            <label>Pending</label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Total Service Year</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$user->total_service_year}} Year(s)</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Grade</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            @php
                            $grade_name = App\Models\Grade::find($user->grade_id)->name;
                            @endphp
                            <label>{{$grade_name}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Payscale</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            @php
                            $name = App\Models\Payscale::find($user->payscale_id)->name;
                            @endphp
                            <label>{{$name}}</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Payscale Detail</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            @php
                            $name = App\Models\PayscaleDetails::find($user->payscale_detail_id)->name;
                            @endphp
                            <label>{{$payscale_detail_index}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Last Basic Pay</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$user->last_basic_pay}} Tk.</label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Percentage Basic Pay</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            <label>{{$user->percentage_basic_pay}} %</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Mandatory PF per Taka</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$user->mandatory_pf_per_tk}} Tk.</label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Total Amount</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            <label>{{$user->total_amount}} Tk.</label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button type="submit" class="f-100 btn btn-info">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

@endsection
@push('js')
@endpush