@extends('backend.admin.index')

@section('content')
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title">Create Role</h3>
        {{-- <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a> --}}
    </div>

     <form action="{{ route('roles.store')}}" method="post">
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
                    <th class="text-center">Role</th>
                </tr>
                
            </thead>
            <tbody>
                
                
               
                @foreach ($roles as $role)
                @php
                $users = App\Models\User::role($role->name)->first(); 

               @endphp
               {{-- @dd($users) --}}
                <tr> 
                <td class="text-center">{{ $role->name }}</td>
                {{-- <td>{{ $users-> }}</td> --}}
                    
                {{-- @php
                $checked=App\Models\Permission::where('employee_id',$iduser)
                    ->where('permission_Id',$module->id)
                    ->first();
                @endphp --}}
               
                    
                    @if ($users)
                        @if ($users->id)
                        <td class="text-center">
                        <label for="">
                            <input type="hidden" name="employeeid" value="{{ $usersid }}">
                            <input type="checkbox" name="permission[]" value="{{ $role->id }}" checked >
                        </label>
                    </td>
                        
                     
                       
                       

                        
                        @endif 

                        @else

                        <td class="text-center">
                            <label for="">
                                <input type="hidden" name="employeeid" value="{{ $usersid }}">
                                <input type="checkbox" name="permission[]" value="{{ $role->id }}" >
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