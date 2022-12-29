@extends('backend.admin.index')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-6">
                             <div class = "f-roboto">Cost Center Type</div>
                         </div>
                         <div class="col-md-6 text-right">
                             <div class="btn-group">
                               <a class = "btn btn-primary btn-sm f-100 mr-1" href = "{{ route('admin.cost-center.type.index') }}"><i class = "fa fa-arrow-left mr-2"></i>Back</a>
                               <a class = "btn btn-info btn-sm f-100" href = "{{ route('admin.cost-center.type.edit',['id' => $type -> id] ) }}"><i class ="fa fa-pencil-alt mr-2"></i>Edit</a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="row text-center form-group">
                         <div class="col-md-12">
                           <div class = "f-roboto">Basic Identity</div>
                         </div>
                     </div>
                     <div class="row text-center">
                         <div class="col-md-6 text-right">
                            <p class = "f-100">Name : </p>
                         </div>
                         <div class="col-md-6 text-left">
                             <p class = "f-100">{{ $type -> name }}</p>
                         </div>
                     </div>
                     <div class="row text-center">
                         <div class="col-md-6 text-right">
                            <p class = "f-100">Description : </p>
                         </div>
                         <div class="col-md-6 text-left">
                             <p class = "f-100">{{ $type -> description }}</p>
                         </div>
                     </div>
                     <div class="row text-center form-group">
                         <div class="col-md-12">
                           <div class = "f-roboto">Cost Centers</div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <table class = "table table-sm table-striped table-bordered">
                                 <thead>
                                     <tr class = "text-center text-black">
                                         <td>Code</td>
                                         <td>Name</td>
                                         <td>Description</td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($type -> getCostCenters as $cost_center)
                                       <tr class = "text-center">
                                           <td>{{ $cost_center -> code }}</td>
                                           <td>{{ $cost_center -> name }}</td>
                                           <td>{{ $cost_center -> description }}</td>
                                       </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection