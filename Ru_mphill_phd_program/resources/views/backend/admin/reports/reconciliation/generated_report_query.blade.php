@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="f-roboto">Reconciliation Report</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reports.reconciliation.pdf') }}" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Year</label>
                            </div>
                            <div class="col-md-4">
                                <label>Month</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" name="year">
                                    @for($year = 2021; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="month">
                                    @for($months = 1; $months <= 12; $months++) @php $month_name=date('F', mktime(0, 0,
                                        0, $months, 10));@endphp <option value="{{ $months  }}">{{ $month_name }}
                                        </option>
                                        @endfor

                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-danger text-white f-100"><i
                                        class="fa fa-file-pdf mr-2"></i>Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection