@extends('backend.admin.index')

@section('content')
<div class="block block-rounded block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title text-center"></h3>
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
                    <th rowspan="2" class="text-center" style="width: 80px;">User Name</th>
                    <th colspan="6"><p class="text-center">Role Permissions</p></th>
                </tr>
                <tr>
                   
                    <th class="text-center">View</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Add</th>
                    <th class="text-center">Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr> 
                 @php
                     $name=App\Models\User::find($iduser)->name;

                 @endphp
                 <td>{{ $name }}</td>
                @foreach ($allmodule as $module)
                    
                @php
                $checked=App\Models\Permission::where('employee_id',$iduser)
                    ->where('permission_Id',$module->id)
                    ->first();
                @endphp
               
                    
                    @if ($checked)
                        @if ($checked->permission_Id==1)
                        <td>
                        <label for="">
                            <input type="checkbox" name="permission[]" value="{{ $module->id }}" checked>
                        </label>
                        </td>

                        
                        <input type="hidden" name="employeeid" value="{{ $iduser }}">
                        @endif


                        @if ($checked->permission_Id==2)
                        <td>
                        <label for="">
                            <input type="checkbox" name="permission[]" value="{{ $module->id }}" checked>
                        </label>
                        </td>

                       
                        <input type="hidden" name="employeeid" value="{{ $iduser }}">
                        @endif


                        @if ($checked->permission_Id==3)
                        <td>
                        <label for="">
                            <input type="checkbox" name="permission[]" value="{{ $module->id }}" checked>
                        </label>
                        </td>
                        
                      <input type="hidden" name="employeeid" value="{{ $iduser }}">
                        @endif

                        
                        

                        @if ($checked->permission_Id==4)
                        <td>
                        <label for="">
                            <input type="checkbox" name="permission[]" value="{{ $module->id }}" checked>
                        </label>
                        </td>
                        <input type="hidden" name="employeeid" value="{{ $iduser }}">
                        @endif

                        @else
                        
                        <td>
                            <input type="checkbox" name="permission[]" value="{{ $module->id }}">

                        </td>
                        <input type="hidden" name="employeeid" value="{{ $iduser }}">
                    
                        
                           
                        
                       
                    @endif
               

                @endforeach

                
            </tr>
        
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
