@extends('backend.admin.index')
@section('content')
   <div class="card">
    <div class="card-header">
       <h4 class="text-center p-0 m-0 " style="color:blueviolet;">{{ $name }}</h4>
      
    </div>

         <div class="row card-body">
           
           
            <div class="col-md-10">
               <p class="text-right p-0 m-0 "><a href="{{ route('csv.upload') }}"><button class="btn btn-sm btn-primary"><i class="fa fa-upload" aria-hidden="true">&nbspCSV Upload</i></button></a></p>
            </div>

            <div class="col-md-2">
               <p class=" p-0 m-0 "><a href="{{ route('csv.download') }}"><button class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true">&nbspCSV Format</i></button></a></p>
            </div>

         </div>

       
       <div class="table-responsive">
           
          <table class="table table-bordered table-striped table-vcenter js-dataTable-full">

            <thead>
              <tr>
                <th>No</th>
                <th>Office Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
               
                    @php
                        $i=1;
                    @endphp
               @foreach ($department_information as $information)
                <tr>
                   
                    <td>{{ $i++ }}</td>
                    <td>{{ $information->dept_name }}</td>
                    <td class="text-center"><a href="{{ url('show.office',$information->office_code) }}"><button class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a></td>
                        
                    
                    
                </tr>
                @endforeach

            </tbody>

          </table>

       </div>

   </div>
@endsection