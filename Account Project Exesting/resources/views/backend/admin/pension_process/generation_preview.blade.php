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

        <form id="accounts_form_create" action="{{ route('admin.pension-process.generate', $user->id) }}" method="post">
            @csrf
            <!-- @method('PATCH') -->
            <div class="card border-info">
                <div class="card-header border-info">
                    <h5 class="f-100 text-center">Pension Generation</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Employee(ID)</label>
                        </div>
                        <div class="form-group col-md-4" style="float:left; background-color: white;">
                            @php
                            $employee_name = App\Models\Employee::find($user->employee_id)->name;
                            @endphp
                            <label>{{$employee_name}}({{$user->employee_id}})</label>
                        </div>
                        @php
                            $retd_date = substr($user->retd_date, 0, 10);
                            $pension_start_date = substr($user->pension_start_date, 0, 10);
                        @endphp
                        <div class="col-md-2 form-group" style="float:right;">
                            <label>Retire Date</label>
                        </div>
                        <div class="col-md-3 form-group" style="float:right; background-color: white;">
                            <label>{{$retd_date}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Pension Start Date</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$pension_start_date}}</label>
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
                            <label>Basic Pension Amount</label>
                        </div>
                        <div class="col-md-4" style="background-color: white;">
                            <label>{{$user->basic_pension_amount}} Tk.</label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Health Fee</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            <label>{{$user->health_fee}} Tk.</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 form-group">
                            <label>Bangla New Year Bonus</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$user->bangla_new_year_bonus}} Tk.</label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>First Eid Bonus</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            <label>{{$user->first_eid_bonus}} Tk.</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 form-group">
                            <label>Second Eid Bonus</label>
                        </div>
                        <div class="col-md-4 form-group" style="background-color: white;">
                            <label>{{$user->second_eid_bonus}} Tk.</label>
                        </div>

                        <div class="col-md-2 form-group">
                            <label>Grand Total</label>
                        </div>
                        <div class="col-md-3 form-group" style="background-color: white;">
                            <label>{{$total_amount}} Tk.</label>
                        </div>
                    </div>

                    <div class="card  border-info">
                        <div class="card-body">
                        <div class="row form-group justify-content-center">
                                <div class="col-md-3">
                                    <label>Year</label>
                                    <select class="form-control" id="year" name="year">
                                        @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Month</label>
                                    <select class="form-control" id="month" name="month">
                                        @for($month = 1 ; $month <= 12; $month++) @php
                                            $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                            value="{{ $month_name }}">{{ $month_name }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Pension Date</label>
                                    <input type="text" class="js-flatpickr form-control bg-white"
                                        placeholder="Pension Date" name="pension_date" required>
                                </div>
                            </div>
                            <div class="row  justify-content-center">
                                <div class="col-md-3">
                                    <button type="submit" class="form-control btn btn-primary">Generate</button>
                                </div>
                            </div>
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