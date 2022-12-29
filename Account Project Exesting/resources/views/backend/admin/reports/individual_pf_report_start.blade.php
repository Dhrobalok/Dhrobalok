@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header text-center f-100">
                    <b>Employee Provident Fund Report</b>
                </div>
                <div class="card-body bg-white">
                    <form method = "get" action = "{{ route('download-individual-pf-report') }}">
                       @csrf
                       <div class="row form-group justify-content-center">
                         <div class="col-md-3">
                            <label class = "f-100">Select Employee</label>
                         </div>
                         <div class="col-md-5">
                            <select class = "form-control" name = "employee_id">
                              @foreach($employees as $employee)
                                <option value = {{ $employee -> id }}>{{ $employee -> name }}</option>
                              @endforeach
                            </select>
                         </div>
                         <div class="col-md-3">
                           <button type = "submit" class = "btn btn-info f-100 text-white">PDF</button>
                         </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection