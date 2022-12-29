@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header text-center f-100">
                    <b>Yearly Provident Report</b>
                </div>
                <div class="card-body bg-white">
                    <form method="get" action="{{ route('download-pf-yearly-statement') }}">
                        @csrf
                        <div class="row form-group justify-content-center">
                            <div class="col-md-4">
                                <select class="form-control" name="year">
                                    @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info f-100 text-white">PDF</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection