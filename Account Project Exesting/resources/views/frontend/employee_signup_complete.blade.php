@extends('frontend.layout')
@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                         <h3 class = "f-100" style = "color:#1dbf73"><i class = "fa fa-check-circle"></i> Congratulations!!! You registration has been completed. Please download the document and contact with administration.</h4>
                       </div>
                   </div>
                   <div class="row text-center">
                       <div class="col-md-12">
                         <a href = "{{ route('admin.employees.details.pdf',['employee_id' => Session :: get('employee_id') ? Session :: get('employee_id') : 0]) }}" class = "btn btn-primary btn-sm text-white font-weight-bold">Download PDF</a>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection