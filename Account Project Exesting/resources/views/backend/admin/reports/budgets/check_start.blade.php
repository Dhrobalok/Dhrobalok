@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-center f-100">
                    <b>Under Process Budget Check</b>
                </div>
                <div class="card-body bg-white">
                    <form method="post" action="{{ route('budget-check-report-pdf') }}">
                        @csrf
                        <div class="row justify-content-center">
                           <div class="col-md-4">
                             <label>Budget</label>
                           </div>
                          <div class="col-md-4">
                            <label>Year</label>
                          </div>
                          <div class="col-md-4">
                            <label>Month</label>
                          </div>
                        </div>
                        <div class="row form-group justify-content-center">
                            <div class="col-md-4">
                               <select class = "form-control" name = "budget_id">
                                @foreach($budgets as $budget)
                                  <option value = {{ $budget -> id }}>{{ $budget -> name }}</option>
                                @endforeach
                               </select>
                            </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="year" name="year">
                                        @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}</option>
                                            @endfor
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="month" name="month">
                                        @for($month = 1 ; $month <= 12; $month++) @php
                                            $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                            value="{{ $month_name }}">{{ $month_name }}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                           <div class="col-md-7">
                              <button type = "submit" class = "btn btn-primary f-100">Download Pdf</button>
                           </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
