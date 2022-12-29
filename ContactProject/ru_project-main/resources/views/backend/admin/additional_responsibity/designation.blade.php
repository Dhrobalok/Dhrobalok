@extends('backend.admin.index')

<style>
    .select2-container--default 
    .select2-selection--multiple
    .select2-selection__choice {
    background-color: #081824 !important;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}
</style>

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="row justify-content-center">
    <div class="col-md-7 py-2">

        <div class="card ">

        
        <div class="card-header p-0 m-0 text-center">
            <p style="text-align: center;color:#00bfff; margin-top:20px;">New Designation</p>

        </div>

        <form action="{{ route('designation.add') }}" method="post">
            @csrf
            <div class="col-md-12 py-2">
                <label>New&nbsp;Designation<span class = "text-danger">*</span></label>
            </div>
            <div class="col-md-12">
                {{-- <input type="hidden" name="category_id" value="{{ $allinformation->officename }}"> --}}
                <input type = "text" class="form-control"  name="designation" placeholder="Designation" required>
                {{-- @if($errors -> any('name') && !old('name'))
                  <strong class = "text-danger f-100">Account name required</strong>
                @endif --}}
            </div>
            
            
            <div class="col-md-12 py-2">
                <label>Designation&nbsp;Type<span class = "text-danger">*</span></label>

            </div>

            <div class="col-md-12">

                 <select name="type" id="" class="form-control">
                    <option value="">Select Option</option>

                    <option value="1">Teacher</option>
                    <option value="2">Officer</option>
                    <option value="3">Stuff</option>


                 </select>
            </div>
            


            <div class="col-md-12 py-2">
                <label>Ofice&nbsp;Name<span class = "text-danger">*</span></label>
            </div>

            <div class="table-responsive">
                <table class="table" id="dynamicTable">
              
                    <tbody>
                        <tr>
                            @php
                        
                            $degicnation=DB::table('departments')->select('office_code','dept_name')->distinct()->orderBy('dept_name')->get();
                    
                            @endphp

                            <td>
                                <select name="officename[]"  id="" class="form-control select2" multiple>
                                    <option value="">Select New Designation</option>
                                 
                                     @foreach ($degicnation as $offices)
                                     @php
                                         $name=Str::of($offices->dept_name)->limit(110)->upper();
                                     @endphp
                                      <option value="{{ $offices->office_code }}">{{ $name }}</option> 
                                      @endforeach
                                 </select>


                            </td>
                            {{-- <td><button type="button" name="add" id="add" class="btn btn-success">Add&nbspMore</button></td> --}}
                        </tr>
                    </tbody>
                </table>
                </div>

            {{-- <div class="col-md-12" id="dynamicTable">
               
                @php
                        
                        $degicnation=DB::table('departments')->select('office_code','dept_name')->distinct()->orderBy('dept_name')->get();
                
             @endphp
             
             
             <select name="officename"  id="" class="form-control select2" >
                 <option value="">Select New Designation</option>
              
                  @foreach ($degicnation as $offices)
                  @php
                      $name=Str::of($offices->dept_name)->limit(110)->upper();
                  @endphp
                   <option value="{{ $offices->office_code }}">{{ $name }}</option> 
                   @endforeach
              </select>

              <button type="button" name="add" id="add" class="btn btn-success">Add&nbspMore</button>
                
            </div> --}}

            

              <div class="row justify-content-center py-2">
                <button class="btn btn-primary">Submit</button>

              </div>
        </form>

    </div>
</div>

</div>

<div class="card">
    <div class="card-body p-5">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    @php
                        $designation=App\Models\Designation::get();
                        $id=Session::get('rollno'); 
                    @endphp
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Office Name</th>
                            <th class="text-center">Designation Name</th>
                            
                            <th></th>   
                           
                           
                        </tr>
                    </thead>
        
        
                    <tbody>
                        @foreach ($designation as  $all )
                            @php
                                 $officename=App\Models\Department::where('office_code',$all->office_id)->first();
                                 $name=Str::of($all->name)->limit(110)->upper();
                            @endphp
                       
                        <tr>
                            <td >{{ $all->id }}</td>
        
                            @if ($officename)
                            @php
                            $nameoffice=Str::of($officename->dept_name)->limit(110)->upper();
                            @endphp
                            <td class="text-center">{{ $nameoffice }}</td>
                                
                            @else
        
                            <td class="text-center">0</td>
        
                            @endif
        
        
        
                          
                            <td class="text-center">{{ $name }}</td>
                            @if ($id==2)
                            <td><a href="{{ url('deletedesignation',$all->id) }}" style="display:inline-block;"><i class="fas fa-trash" aria-hidden="true"></i></a></td>
                                
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
                                <a href="{{ url('deletedesignation',$all->id) }}" style="display:inline-block;"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                @endif

                                @endforeach
                              
                          
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
        
            </div>
        
        </div>

    </div>

</div>



{{-- <script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr>@php$degicnation=DB::table("departments")->select("office_code","dept_name")->distinct()->orderBy("dept_name")->get();@endphp<td><select name="officename[]"  id="" class="form-control select2" ><option value="">Select New Designation</option>@foreach ($degicnation as $offices)@php $name=Str::of($offices->dept_name)->limit(110)->upper();@endphp<option value="{{ $offices->office_code }}">{{ $name }}</option> @endforeach</select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

   </script> --}}




@endsection

@push('js')

<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush
