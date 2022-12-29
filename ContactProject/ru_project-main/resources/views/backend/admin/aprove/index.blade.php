@extends('backend.admin.index')
@section('content')
<div class="card-body">
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Name</th>
                <th class="d-none d-sm-table-cell text-center">Email</th>
                
                <th class="d-none d-sm-table-cell text-center">Status</th>
                <th class="d-none d-sm-table-cell text-center">Photo</th>
                <th class="d-none d-sm-table-cell text-center"></th>
            </tr>
        </thead>
           
        <tbody>
            @foreach ($alluser as $user )
            @php
                $users=App\Models\Employee::where('email',$user->email)->first();
            @endphp

            <tr>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
               @if ($user->status==1)
               <td class="text-center"><span class="badge badge-success">Active</span></td>
               @elseif ($user->status==0)
               <td class="text-center"><span class="badge badge-danger">InActive</span></td>
                @endif
                <td><img src = "{{ URL :: to($users -> employee_photo) }}" height = "50px" width = "50px"></td>
                  

                @php
                $employee_id=Session::get('employeeid');
            
                $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                $id=Session::get('rollno'); 
     
                @endphp
                  
                 @if ($id==2)
                 <td>
                    <a href="{{ url('useraprove',$user->id) }}"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;
                            
                         {{-- @endif --}}
    
             
    
                        {{-- @if($permission_id->permission_Id==4) --}}
                        <a href="{{ url('user.delete',$user->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>

                 </td>
                     
                 @endif

                <td>
                  
                
                    
                        
                    @foreach ( $permission as  $permission_id )
                        @if($permission_id->permission_Id==3)
                        <a href="{{ url('useraprove',$user->id) }}"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;
                            
                         @endif
    
             
    
                        @if($permission_id->permission_Id==4)
                        <a href="{{ url('user.delete',$user->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            
                        @endif
           
                    
                    @endforeach
                </td>
            </tr>
                
            @endforeach
            

        </tbody>
    </table>
</div>
@endsection