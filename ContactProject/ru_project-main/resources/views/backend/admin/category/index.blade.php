@extends('backend.admin.index')
@section('content')
<style>
    img
    {
        width: 90px;
        height: 70px;
       
        background: #fff;
        border-radius: 40px;
        position: relative;
    }
</style>
<div class="card">
   
  <div class="row">
    <div class="col-md-12">
        {{-- <h5 style="font-size:16px; font-weight:bold;text-align: center;">Institute&nbspof&nbspBiological&nbspSciences</h5> --}}
        <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>


    </div>

        <div class="col-md-12">
            <p style="text-align: center; ">
                <img src="{{ asset('company_pic/ru-logo.png') }}" alt="">
            </p>
       </div>

       <div class="col-md-12">
           <p style="text-align:center;font-weight:bold;font-size:16px;">All Category</p>

       </div>

       <div class="col-md-12">
        <p style="float:right;font-weight:bold;font-size:16px;"><a href="{{ url('categorycreate') }}"><button class="btn btn-primary">New Category</button></a></p>

      </div>
    </div>


<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Id</th>
                <th class="d-none d-sm-table-cell text-center">Category Name</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
                {{-- <th class="d-none d-sm-table-cell text-center">FellowShip Report</th>
                <th class="d-none d-sm-table-cell text-center">Supervisor Report</th> --}}
                
            </tr>
        </thead>
        @php
        $i=1;
        @endphp
        @foreach ($categoryall as $category)
        <tbody>
           
                
            
            <tr>
              
                
                <td class="text-center">{{ $i++ }}</td>
                <td class="text-center">{{ $category->category_name }}</td>
                @php
                $employee_id=Session::get('employeeid');
            
                $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                $id=Session::get('rollno'); 
                $status=App\Models\User::where('id',$id)->first();
                $id=Session::get('rollno'); 
     
                @endphp
                {{-- @dd($permission) --}}
                @if ($id==2)

                  <td>
                    {{-- <a href="{{ url('view.category',$category->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                    <a href="{{ url('edit.category',$category->id)}}"><i class="fas fa-edit"></i></a>
                    <a href="{{ url('delete.category',$category->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                    
                @endif
               
                <td class="text-center">
                    
                @foreach ( $permission as  $permission_id )
                    {{-- @if($permission_id->permission_Id==1)
                    <a href="{{ url('view.category',$category->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        
                    @endif --}}

                    @if($permission_id->permission_Id==2)
                    <a href="{{ url('edit.category',$category->id)}}"><i class="fas fa-edit"></i></a>
                        
                    @endif

                    {{-- @if($permission_id->permission_Id==3)
                    <a href="{{ url('update.category',$category->id)}}">update</a>
                        
                    @endif --}}

                    @if($permission_id->permission_Id==4)
                    <a href="{{ url('delete.category',$category->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        
                    @endif
                {{-- <a href="">edit</a>
                <a href="">update</a>
                <a href="">delet</a> --}}
                
                @endforeach
                </td>
                
                    
                
               
            </tr>
        </tbody>
        @endforeach
    </table>
    </div>

</div>

</div>

@endsection
