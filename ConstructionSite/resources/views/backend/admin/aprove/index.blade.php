@extends('backend.admin.index')
@section('content')
<style>
    * {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(4.5); /* IE 9 */
  -webkit-transform: scale(4.5); /* Safari 3-8 */
  transform: scale(4.5); 
}
</style>
<div class="card">


<div class="card-body">
  <div class="table-responsive">

  
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead class="bg-info">
            <tr>
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Name</span></th>
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Email</span></th>
                
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Status</span></th>
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Photo</span></th>
                <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Payslip</span></th>
                <th class="d-none d-sm-table-cell text-center"></th>
            </tr>
        </thead>
           
        <tbody>
            @php
                $i=1
            @endphp
            @foreach ($alluser as $user )
            @php
                $users=App\Models\Employee::where('employee_id',$user->id)->first();
            @endphp
            
                 
             @if ($users)
                 
             
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ ucwords($users->name) }}</td>
                <td>{{ $users->email }}</td>
               @if ($user->status==1)
               <td class="text-center"><span class="badge badge-success">Active</span></td>
               @elseif ($user->status==0)
               <td class="text-center"><span class="badge badge-danger">InActive</span></td>
                @endif
                <td class="text-center"><img  src = "{{ URL :: to($users -> employee_photo) }}" height = "50px" width = "50px"></td>
                <td class="text-center"><img class="zoom" src = "{{ URL :: to($users -> payslip) }}" height = "10px" width = "10px"></td>

                <td class="text-center">
                    
                        <a href="{{ url('useraprove',$user->id) }}"><button type="button" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i></button></a>
                                               
                        <a href="{{ url('user.delete',$user->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            
                      
           
                  
                </td>
            </tr>
            @endif
         
                
            @endforeach
            

        </tbody>
    </table>
</div>
</div>
</div>
@endsection