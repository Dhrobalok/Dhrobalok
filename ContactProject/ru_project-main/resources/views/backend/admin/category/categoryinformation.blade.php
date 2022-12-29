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
               <p style="text-align:center;font-weight:bold;font-size:16px;">All Category Information</p>
    
           </div>
 

</div>
<div class="row justify-content-center">
 <div class="block-content block-content-full">
    <div class="table-responsive">

        
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Office Name</th>
                    <th>OfficeType</th>
                    <th>Category Type</th>
                    <th>Cell No</th>
                    @php
                      $id=Session::get('rollno'); 
                        
                    @endphp
                   
                    <th></th>
                        
                   
                    

                </tr>
            </thead>

            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($categoryinform as $inform )
                    
               
                @php
                
                    $name=App\Models\Categor::where('id',$inform->category_id)->first();
                    $id=Session::get('rollno'); 
                @endphp
                <tr>
                    @if ($name)
                    <td>{{ $i++}}</td>
                    <td>{{ $inform->officename }}</td>
                    <td>{{ $inform->officeno }}</td>
                    <td>{{ $name->category_name }}</td>
                    <td>{{ $inform->cell_no  }}</td>
                    @if ($id==2)
                    <td><a href=" {{ route('category.delete', ['id' => $inform->id]) }} " style="display:inline-block;"><i class="fas fa-trash" aria-hidden="true"></i></a></td>
                        
                    @endif

                    @php
                    $employee_id=Session::get('employeeid');
               
                    $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                 
                          $id=Session::get('rollno'); 
                         //  $status=App\Models\User::where('id',$id)->first();

                      
        
                   @endphp
                  

                     @foreach ( $permission as  $permission_id )
                     @if($permission_id->permission_Id==4)
                        <td>
                     <a href=" {{ route('category.delete', ['id' => $inform->id]) }} " style="display:inline-block;"><i class="fas fa-trash" aria-hidden="true"></i></a>
                        </td>
                     @endif

                     @endforeach
                   
                        
                    @endif
                   
                    
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
 </div>

</div>
  

@endsection
