

@extends('frontend.layout')
@section('content')
<style>
    #agrani_bank
    {
        width: 50px;
        height: 40px;

        background: #fff;
        border-radius: 40px;
        position: relative;
    }

    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;

}

#profile
{
    width: 70%
}


</style>

<div class="row justify-content-center" style="padding-top:10px;">
    <div class="col-lg-12" style="">

        <div class="card pb-5" style="background:rgba(71, 51, 51, 0.7);">
            <div class="card-header">
                <nav>
                    <div id="nav-tab" role="tablist" style="background-color:#blue">

                        @php
                            $id=Session::get('employeeid');
                        @endphp

                        <a class=""  id = "decline_btn2" data-target = "#decline2" data-toggle = "modal" href="#">

                            <button class="btn btn-alt-primary" style="margin-left:30%;font-size:18px;"><Span style="font-weight: bold;color:#fff;">Edit&nbsp;Profile</Span></button>
                        </a>


                            <a class=""  id = "decline_btn" data-target = "#decline" data-toggle = "modal" href="#">

                                <button class="btn btn-alt-primary" style="margin-left:30%;font-size:18px;"><Span style="font-weight: bold;color:#fff;">Renewal&nbsp;Fee</Span></button>
                             </a>

                    </div>


                </nav>


            </div>


            <div class="card-body pt-4">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <div class="card bg-white shadow-sm" style="min-height:180px;">
                                    <div class="card-body" style="background-color:#EBF4FA;">
                                        <div class="row justify-content-center form-group">

                                            @if ($employee)

                                            <img src="{{ URL :: to($employee -> employee_photo) }}"
                                            class='rounded-circle' height="150px" width="150px;">


                                            @else
                                            <img src="#"
                                            class='rounded-circle' height="150px" width="150px;">
                                            @endif

                                        </div>
                                        <div class="row justify-content-center">
                                            @if ($employee)
                                            <h5>{{ $employee->name}}</h5>

                                            @else

                                            <h5></h5>

                                            @endif

                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-sm " >
                                    <div class="card-body" style="background-color:#EBF4FA;">
                                        <div class="row">


                                            <div class="col-lg-3">
                                                <h6>Name : </h6>
                                            </div>
                                            <div class="col-lg-9">

                                                @if ($employee)
                                                <label>{{ $employee->name }}</label>

                                                @else

                                            <label></label>

                                            @endif



                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Email : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                @if ($employee)
                                                <label>{{ $employee->email }}</label>

                                                @else

                                                <label for="">N/a</label>


                                                @endif

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Mobile : </h6>
                                            </div>
                                            <div class="col-lg-9">

                                                @if ($employee)
                                                  <label>{{ $employee->mobile_no }}</label>

                                                  @else

                                                  <label for="">N/a</label>

                                                @endif


                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Company Name : </h6>
                                            </div>
                                            <div class="col-lg-9">

                                                @if ($employee)
                                                <label>{{ $employee->company_type }}</label>

                                                @else

                                                  <label>N/a</label>
                                                @endif


                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            @php
                                            $id=Session::get('employeeid');
                                            $registration=App\Models\User::where('id',$id)->first();
                                            $staus=App\Models\Payslip::where('employee_id',$id)->where('status',1)->orderBy('id','desc')->first();

                                            $end=Carbon\Carbon::now();
                                             $start=Carbon\Carbon::parse($staus->created_at);

                                            $diffday=$start->diffInYears($end);


                                           @endphp
                                           {{-- @dd($diffday) --}}

                                            <div class="col-lg-3">

                                                <h6 style="font-size:18px;">Renewal Status:


                                                </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                @if($staus)


                                                @if ($diffday>1)

                                                <span style="color: red;">Due:&nbsp;{{ $diffday }}&nbsp;Years </span>


                                                @else
                                                    <span style="color: red;display:inline-block">Paid</span>
                                                @endif


                                                @else
                                                <span style="color: red;display:inline-block">Due</span>

                                                @endif

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>











                                    </div>








                                </div>










                    </div>


                    <!-- start pauslip nav -->


                </div>









                    </div>
                </div>
            </div>
        </div>

        {{-- reneal fees --}}
        <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-white">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                            <span aria-hidden="true">&times;</span>
                          </button>

                    </div>
                    <div class="modal-body">
                       <form  action="{{ route('renewpayslip') }}"  method="post" enctype="multipart/form-data">
                         @csrf

                        <div class="row form-group justify-content-center">


                            {{-- <div class="col-md-8">
                                <label for="">Year</label>
                                @php

                               @endphp

                                <input type="text" class="form-control" id="number" name="payslip" placeholder="year" required>


                            </div> --}}

                            <div class="col-md-8">
                                <label for="">Renewal Payslip</label>
                                @php
                                $id=Session::get('employeeid')
                               // $staus=App\Models\Payslip::where('employee_id',$id)->first();
                               @endphp
                                <input type="hidden" name="employee_id" value="{{$id}}">
                                <input type="file" class="form-control" id="number" name="payslip" placeholder="price" required>
                                {{-- <button type = "submit" class="btn btn-primary">CONFIRM</button> --}}

                            </div>








                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">

                              <button type = "submit" style = " #1dbf73;color:black;"  class = "btn f-100">CONFIRM</button>
                            </div>
                        </div>



                       </form>
                </div>
            </div>
        </div>
    </div>



    {{-- end reneal --}}


    {{-- Edit Profile --}}

    <div class="modal fade" id="decline2" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="profile">
                <div class="modal-header bg-white">
                     <p>Update Profile</p>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                        <span aria-hidden="true" style="color:rgb(43, 34, 34)">&times;</span>
                      </button>
           </div>
                <div class="modal-body">
                   <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                     @csrf

                           @php
                            $id=Session::get('employeeid');
                            $user=App\Models\Employee::where('employee_id',$id)->first();
                           // $staus=App\Models\Payslip::where('employee_id',$id)->first();
                           @endphp


                        <input type="hidden" name="id" value="{{$id}}">



                        <div class="row justify-content-center">
                            <img id="output"/>
                                <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                                </script>


                        </div>


                        <div class="row justify-content-center">

                            <input type="file" name="image">

                        </div>





                        <div class="row justify-content-center mt-4">

                             <div class="col-md-6">
                                <label for="">Name</label>

                             </div>

                        </div>


                        <div class="row justify-content-center">
                            <div class="col-md-6">

                                @if ($user)
                                 <input type="text" name="name" value="{{$user->name}}" class="form-control">

                                @endif


                            </div>

                        </div>



                        <div class="row justify-content-center mt-4">

                            <div class="col-md-6">
                               <label for="">Password</label>

                            </div>

                       </div>


                       <div class="row justify-content-center">
                           <div class="col-md-6">
                               <input type="password" name="password"  class="form-control" placeholder="************">

                           </div>

                       </div>


                       <div class="row justify-content-center mt-4">

                        <div class="col-md-6">
                           <label for="">Company Name</label>

                        </div>

                   </div>


                   <div class="row justify-content-center">
                       <div class="col-md-6">
                        @if ($user)
                        <input type="text" name="company"  class="form-control" value="{{$user->company_type}}" >

                        @endif


                       </div>

                   </div>


                   <div class="row justify-content-center mt-4">

                    <div class="col-md-6">
                       <label for="">Mobile No</label>

                    </div>

               </div>


               <div class="row justify-content-center">
                   <div class="col-md-6">

                    @if ($user)
                    <input type="text" name="mobile"  class="form-control" value="{{$user->mobile_no}}" >

                    @endif


                   </div>

               </div>







                    </div>
                    <div class="row text-center p-3">
                        <div class="col-md-12">

                          <button class="btn btn-sm btn-primary">Update Profile</button>
                        </div>
                    </div>



                   </form>
            </div>
        </div>
    </div>
</div>







    {{-- Edit Profile --}}
        @endsection


@push('js')





{{--
<script>
    $(document).ready(function ()
    {

        $(document).on('click','.#filesizecheck',function()

            {


                alert('fdfg');



            });


    });
 </script> --}}



  <script>
    $('#decline_confirm').on('submit',function(e){


         e.preventDefault();
        //  processData: false,
        // contentType: false,

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ route('updateProfile') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {
               $('#decline').modal('hide');
               $('#decline_btn').text('Payment Add');
            }

        })
    });
</script>




@endpush
