@extends('backend.Dashboard.AdminDashUser')

@section('css')
<style>
 #myTable th
 {
     color:rgb(250, 235, 235);
 font-size:13px;

 /* text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important; */
 background-color: rgb(129, 152, 212)
 }

 #myTable td
 {

 font-size:14px;
 line-height: 17px;
 text-transform:capitalize;
 font-weight: 400px !important;
 width: 20px !important;

 }

/* .table-responsive
{
    overflow-x: hidden !important;
} */

#myTable_filter
{
    float: right !important;
}

#list
{
    width: 340px !important;
}

#model_content3 {
    position: relative;
    display: -ms-flexbox;
    display: middle !important;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 450px!important;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 50%);
    outline: 0;
}
</style>

@endsection

 @section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="col-md-11">


     <form action="{{url('assignRole')}}" method="POST">
        @csrf

           <div class="table-responsive">
               <div class="card shadow p-2 mt-2">

                   <div class="card-header">

                    <h4 class="p-2 m-0">Permission</h4>
                    <div class="text-right">

                        <a href="#" class="btn btn-sm btn-primary addrole">Add Role</a>

                        <a href="{{route('assign.role')}}" class="btn btn-sm btn-success">Assign&nbsp;Role</a>

                    </div>






                   </div>


                   <div class="card-body">

                       <table class="table table-striped" id="myTable">

                           <thead>
                               <tr>

                                   <th rowspan="2">Role</th>
                                   <th colspan="8">Permissions</th>
                                   {{-- <th rowspan="2" class="text-center" style="width: 80px;">Role</th>
                                   <th colspan="6"><p class="text-center">Role Permissions</p></th> --}}
                               </tr>
                               {{-- <tr>

                                   <th class="text-center">View</th>
                                   <th class="text-center">Edit</th>
                                   <th class="text-center">Add</th>
                                   <th class="text-center">Delete</th>

                               </tr> --}}
                           </thead>
                           <tbody>
                               @php
                                   $allrole=Spatie\Permission\Models\Role::all();
                                   $permission=Spatie\Permission\Models\Permission::all();
                               @endphp


                                   @foreach ($allrole as $role)
                                   <tr>
                                       <td>

                                        {{$role->name}}
                                         <input type="hidden" name="role_id[]" value="{{$role->id}}">


                                       </td>




                               @foreach ($permission as $permissions)

                                 @php
                                   $permissionall=App\Models\Role_has_permission::where('role_id',$role->id)
                                   ->where('permission_id',$permissions->id)
                                   ->first();

                                 @endphp



                                   @if ($permissionall)
                                   <td><input type="checkbox" name="permission[{{ $role -> id }}][]" value="{{ $permissions->id }}" checked>&nbsp;{{ $permissions->name}}</td>







                                 @else

                                   <td><input type="checkbox" name="permission[{{ $role -> id }}][]" value="{{ $permissions->id }}">&nbsp;{{ $permissions->name}}</td>


                                   @endif









                                       {{-- <td>{{ $permissions->name}}</td> --}}
                               @endforeach
                               </tr>

                               @endforeach


                           </tbody>


                       </table>

                   </div>

               </div>

           </div>

           <div class="row justify-content-center">

               <button class="btn btn-primary">Change</button>

           </div>


   </form>


  </div>


  {{-- Modal --}}
    {{-- Update Edit Role Modal --}}

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content" id="model_content3">
        <div class="modal-header">
            <center><h4 style="color:red">Role</h4></center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body border shadow">


            <form action="{{route('create.role')}}" method="post">
                @csrf



                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <label for="">Role Name *</label>

                    </div>

                </div>

                <div class="row form-group justify-content-start">

                    <div class="col-md-12">
                      <input type="text" name="name"  class="form-control" required>

                    </div>

                </div>




                <div class="row justify-content-center">

                    <button class="btn btn-primary">Submit</button>

                </div>
            </form>







        ...
        </div>

        </div>
        </div>
        </div>



       {{-- Update  Role Modal --}}

 @endsection

 @push('js')

 <script>
    $(document).ready(function ()
    {

        $(document).on('click','.addrole',function()
            {




                const val=$(this).parent().closest('.cancel').attr('id');
                 const id = $(this).attr("data-id");









                event.preventDefault();
                jQuery.noConflict();

                $.ajax({

                        url : "{{ route('AddRole') }}",
                        type : "get",

                      success: function(response)
                       {

                        $("#exampleModal3").modal('show');


                       }
               });

            });


    });
 </script>

<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>


 @endpush
