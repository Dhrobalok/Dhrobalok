@extends('backend.admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info f-100 text-white">
                    <b>{{ $role  -> name }}</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered role-assign">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Mobile No.</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employee)
                            <tr>
                               <td>{{ $employee -> name }}</td>
                               <td>{{ $employee -> user_info -> email }}</td>
                               <td>{{ $employee -> mobile_no }}</td>
                               <td>{{ $employee -> designation -> name }}</td>
                               <td>
                                   
                                  @if($employee -> user_info -> hasRole($role))
                                  <a class = "btn btn-primary" onclick = "remove_role({{$employee -> user_id}},{{ $role -> id }})"><i class="fas fa-minus"></i></a>
                                  @else
                                  <a class = "btn btn-primary" onclick = "assign_role({{$employee -> user_id}},{{ $role -> id }})"><i class="fas fa-plus"></i></a>
                                  @endif
                               </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
 <script>
    $(document).ready(function(){
        
         $('.role-assign').dataTable();
    });

    function assign_role(user_id,role_id)
    {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url : "{{ route('assign-role') }}",
            type : "post",
            data:
            {
                user_id : user_id,
                role_id : role_id
            },
            success:function(res)
            {
               $.notify('Role successfully assigned',"success");
            }
        });
    }
    function remove_role(user_id,role_id)
    {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });

        $.ajax({
            url : "{{ route('remove-role') }}",
            type : "post",
            data:
            {
                user_id : user_id,
                role_id : role_id
            },
            success:function(res)
            {
               $.notify('Role successfully removed',"success");
            }
        });
    }
 </script>
@endpush
@push('css')
<style>
  .fa-plus,.fa-minus 
  {
      color:white;
  }
</style>
@endpush