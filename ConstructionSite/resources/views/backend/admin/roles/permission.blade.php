@extends('backend.admin.index')

@section('content')
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">Create Role</h3>
        {{-- <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a> --}}
    </div>

     <form action="{{ route('permission.store')}}" method="post">
    @csrf
    {{-- @php
    $employee=App\Models\Employee::where('email',$user->email)->first();
  @endphp --}}
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{-- <strong>Name:</strong>
                <input type="text" class="form-control" name="name" placeholder="Name"/> --}}
            </div>
        </div>

    <div class="block-content block-content-full">
        
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">User Name</th>
                    <th class="text-center">Select Option</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               
                @foreach ($permissions as $permission)
                @php
                $users = App\Models\Role_has_permission::where('permission_id',$permission->id)
                ->where('role_id',$userids)
                ->first(); 

               @endphp
               {{-- @dd($users) --}}
                <tr> 
                <td class="text-center">{{ $permission->name }}</td>
                {{-- <td>{{ $users-> }}</td> --}}
                    
                {{-- @php
                $checked=App\Models\Permission::where('employee_id',$iduser)
                    ->where('permission_Id',$module->id)
                    ->first();
                @endphp --}}
               
                    
                     @if ($users)
                        @if ($users->permission_id)
                        <td class="text-center">
                        <label for="">
                            <input type="hidden" name="employeeid" value="{{ $userids }}">
                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}" checked >
                        </label>
                    </td>
                        
                     
                       
                       

                        
                        @endif 

                        @else 

                         <td class="text-center">
                            <label for="">
                                <input type="hidden" name="employeeid" value="{{ $userids }}">
                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}" >
                            </label>
                            </td> 

                     @endif   


                       
                </tr>

                @endforeach

                
            
        
           </tbody>
        </table>
    </div>
    <div class="row form-group justify-content-center">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" class="form-control btn btn-primary">Save Change</button>
        </div>
        <div class="col-md-5">

        </div>
    </div>
</form>
</div>
@endsection