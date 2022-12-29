@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-center f-100">
                    <b>Code Wise Report</b>
                </div>
                <div class="card-body bg-white">
                    <form method="post" action="{{ route('code-wise-report-pdf') }}">
                        @csrf
                        <div class="row justify-content-center">
                           <div class="col-md-4">
                             <label>General Code</label>
                           </div>
                          <div class="col-md-4">
                            <label>Start Date</label>
                          </div>
                          <div class="col-md-4">
                            <label>End Date</label>
                          </div>
                          
                        </div>
                        <div class="row form-group justify-content-center">
                            <div class="col-md-4">
                               <select class = "form-control" name = "coa_id">
                                @foreach($accounts as $account)
                                  <option value = {{ $account -> id }}>{{ $account -> general_code }}</option>
                                @endforeach
                               </select>
                            </div>
                            <div class="col-md-4">
                            <input type="text"  name = "start_date" class="js-flatpickr form-control bg-white" placeholder="Start Date" name = "start_date">
                            </div>
                            <div class="col-md-4">
                            <input type="text"  name = "end_date" class="js-flatpickr form-control bg-white" placeholder="End Date" name = "end_date">
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
