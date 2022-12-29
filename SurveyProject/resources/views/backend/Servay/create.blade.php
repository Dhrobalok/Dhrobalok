
@extends('backend.Dashboard.servey')
@section('content')

<div class="row mt-5">


    <div class="col-md-4">


        <div class="border rounded" style="background-color: rgb(148, 161, 161);">

            <p class="text-center mt-5" style="font-size: 22px;color:rgb(255, 250, 250);">Create a new survey</p>
            <div class="mx-auto  mt-6 mb-4">

                <!-- first card -->
            <div class="card  m-2 shadow" id="card-head" style="background-color:#e5e5e5">
                <a href="#" id = "decline_btn2" data-target = "#decline2" data-toggle = "modal" style="text-decoration: none;">
                    <div class="card-body p-2 mt-3">

                        <p class="text-center" style="color: #555;">

                            <i class="fa fa-plus" style="font-size: 12px;"></i>
                            &nbsp;<span style="font-weight: bold; font-size:16px;">Create&nbsp;Survey&nbsp;Item</span>
                        </p>




                    </div>
                </a>

            </div>
            <!-- first card end -->


            <!-- second card -->
                <div class="card m-2 shadow" id="card-head" style="background-color:#e5e5e5 ">
                    <a href="#" id = "decline_btn" data-target = "#decline" data-toggle = "modal" style="text-decoration: none;">
                        <div class="card-body p-2 mt-3" style="background-color:#e5e5e5">

                            <p class="text-center" style="color: rgb(129, 76, 76);">

                                <i class="fa fa-plus" style="font-size: 12px;"></i>
                                &nbsp;<span style="font-weight: bold; font-size:16px;">Create&nbsp;Question</span></p>




                        </div>
                    </a>

                </div>
            <!-- second card end -->







            </div>

        </div>


    </div>
   <!--  Second column  -->

    <div class="col-md-8">

        {{-- <div align="left" class="border rounded shadow" style="background-color:#f3f3f3" > --}}
            {{-- <p class="p-4 mt-3" style="font-size: 18px;">All Survey</p> --}}




        {{-- </div> --}}





          @php
              $id=Session::get('user_id');
              $allitem=App\Models\Item::where('user_id',$id)->orderBy('id','desc')->get();
          @endphp

          <!--  new row  -->
       <div class="row" id="search_content">





             <!----  Search    -->

           <div class="border shadow p-1 mt-2" style="background-color:#ecc395">


            <div class=" col-md-2 float-left" style="width: 40%;">

                <p class="mt-3" style="font-size: 20px; color:#706b6b;">Copy&nbsp;a&nbsp;past&nbsp;survey</p>

            </div>

                  <div class=" col-md-4 float-right mt-1 p-2 rounded shadow" style="width: 40%;background-color:rgb(228, 212, 212);">

                      <input type="text" class="form-control mr-2 bg-blue-light" name="term" placeholder="Search Survey" id="myInput">

                  </div>




             </div>
               <!----  Search    -->




          @foreach ($allitem as $allitems)

        <div class="col-md-3  mt-5" >
            <a href="{{url('view.question',$allitems->id)}}" style="text-decoration: none; color:#68696a;">
                <div  class="card shadow" id="card" style="background-color:rgb(234, 225, 225);width:100%;height: 100%; object-fit: cover; ">



                    <p class="text-center p-1 mt-1" style="font-weight:500;color:#000;font-size:1.2vw;padding: 10px">{{ $allitems->name}}</p>

                    @php
                        $allquestion=App\Models\question::where('iteam_id',$allitems->id)
                        ->where('user_id',$id)

                        ->get();

                        $totalquestion=count($allquestion);
                    @endphp
                    <p class="text-center" style="font-size: 14px;"><span style="font-size: 14px;">{{$totalquestion}}</span> question</p>

                </div>
            </a>


         </div>


           @endforeach

         @php
           $id=Session::get('user_id');

           $allitems=App\Models\Copyitm::where('user_id',$id)->get();
          @endphp


          @if ( $allitems !=null)



          @foreach ($allitems as $items)

          <div class="col-md-3  mt-5">
              <a href="{{url('copy.question',$items->item_id)}}" style="text-decoration: none; color:#2c3e50;">
                  <div  class="card shadow" id="card" style="background-color:white;width:100%;height: 100%; object-fit: cover;  ">

                      @php

                      $ItemName=App\Models\Item::where('id',$items->item_id)->first();

                    @endphp

                      @if ($ItemName)

                      <p class="text-center p-1 mt-1" style="font-weight: bold;color:#785454;font-size:1.2vw;">{{ $ItemName->name}}</p>

                      @endif



                      @php
                        $allquestion=App\Models\Copyquestion::where('item_id',$items->item_id)
                              ->where('user_id',$id)

                              ->get();

                          $totalquestion=count($allquestion);
                      @endphp
                      <p class="text-center" style="font-size: 14px;"><span style="font-size: 14px;">{{$totalquestion}}</span> question</p>

                  </div>
              </a>


           </div>


     @endforeach






          @endif




       </div>

       <!--  new row  -->



    </div>


    <!--  Second column  -->


</div>



<div class="modal fade" id="decline2" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">



               <div class="container">
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction4()">
                    <span aria-hidden="true"><strong style="font-size: 30px;">&times;</strong></span>
                </button>
                  <div class="row">
                     <div class="col-md-12">




                        <form id="decline_confirm2">
                            @csrf

                            <input type="hidden" name="user_id" value="{{Session::get('user_id')}}">
                            <div class="col-md-12 py-2">
                                <label>Survey&nbsp;Name<span class = "text-danger">*</span></label>
                            </div>
                            <div class="col-md-12 p-2">


                                <input type = "text" class="form-control"  name="name" placeholder="Survey Name" required>

                            </div>

                            <div class="col-md-12 py-2">
                                <label>KeyWord&nbsp;Name<span class = "text-danger">*</span></label>
                            </div>
                            <div class="col-md-12 p-2">


                                <input type = "text" class="form-control"  name="keyword" placeholder="Keyword Name" required>

                            </div>


                            {{-- <div class="col-md-12 py-2">
                                <label>Supervisor&nbsp;Name<span class = "text-danger">*</span></label>
                            </div>
                            <div class="col-md-12 p-2">


                                 @php
                                     $allteacher=App\Models\Teacher::get();
                                 @endphp

                                 <select name="teacher_id" id="" class="form-control">

                                     <option value="">Choose Teacher</option>
                                     @foreach ($allteacher as $teacher)
                                     <option value="{{$teacher->id}}">{{$teacher->name}}</option>

                                     @endforeach


                                 </select>

                            </div> --}}


                            <div class="row justify-content-center mb-2">
                                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

                            </div>


                        </form>


                     </div>

                  </div>

               </div>



        </div>
    </div>
</div>

 <!--  Add  Iteam -->








        <!--  Add  Question -->

<div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

               <div class="container">
                  <div class="row">

                     <div class="col-md-12">
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                            <span aria-hidden="true"><strong style="font-size: 30px;">&times;</strong></span>
                        </button>

                        <form id="decline_confirm" class="mt-3">
                            @csrf
                            <div class="col-md-12">
                                <label>Item<span class = "text-danger">*</span></label>
                            </div>

                            <div class="col-md-12 p-3">

                                    @php


                                        $allitem=App\Models\Item::get();
                                        // $id=Session::get('user_id');
                                        // $allitem=App\Models\Item::where('user_id',$id)->get();

                                    @endphp
                                    <input type="hidden" name="user_id" value=" {{Session::get('user_id');}}">
                                    <select name="iteam_id"  class="form-control">
                                        <option value="">Please Select Item</option>
                                        @foreach ($allitem as $allitems)
                                        <option value="{{$allitems->id}}">{{$allitems->name}}</option>

                                        @endforeach

                                    </select>


                            </div>


                            <div align="right" >

                                <button type="button" name="add" id="add" class="btn btn-secondary">Add&nbsp;More</button>
                              </div>

                              <table class="table table-bordered mt-2" id="dynamicTable">
                                <tr>
                                    <th>Question</th>
                                    <th>Type</th>

                                    <th>Action</th>

                                </tr>
                                <tr>

                                    <td><input type="text" name="question[]" placeholder="Enter your Question" class="form-control" /></td>
                                    <td>
                                        <textarea name="name[]" id="input1" hidden="hidden" cols="20" rows="4" class="form-control input1" placeholder="Please Multiple Choises Seperate with (,)"></textarea>
                                        {{-- <input id="input1" type="text" class="form-control" hidden="hidden"  name="checQuestion[]" placeholder="Checkbox question" multiple> --}}
                                       <select name="type[]"  class="form-control select1" onchange="selection()" id="select1" style="font-family: 'FontAwesome', 'sans-serif';">
                                        <option value="">Question Type</option>
                                        <option value="1"><span>&#9776; &nbsp;Text</span></option>
                                        <option value="2"><span>&#xf016; &nbsp;File Upload</span></option>

                                        <option value="3"><span>&#x1F550;&nbsp;Date/time</span></option>
                                        <option value="4"><span>&#xf0f6;&nbsp;Comment Box</span></option>
                                        <option value="5" id="input"><span>&#9745; Checkbox</span></option>
                                       
                                        <option value="7"><span>&#9745;Number</span></option>




                                       </select>
                                    </td>


                                    <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                                </tr>
                            </table>


                            <div class="row justify-content-center mb-2">
                                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

                            </div>


                        </form>


                     </div>

                  </div>

               </div>



        </div>
    </div>
</div>

 <!--  Add  Question -->





@endsection

@push('js')

<script>
    $(document).ready(function () {
    $('#myInput').keyup(function(){


        var input, filter, parent, child, a, i, txtValue;
        input = $("#myInput");
        filter = input.val().toUpperCase();

        parent = document.getElementById("search_content");

        child = parent.getElementsByClassName("col-md-3");

        // if(filter.length > 0){
        //     $('.faqs-title-box')[0].style.display = 'none';
        // }else{
        //     $('.faqs-title-box')[0].style.display = '';
        // }

        for (i = 0; i < child.length; i++) {
            a = child[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                child[i].style.display = "";
            } else {
                child[i].style.display = "none";
            }
        }
    });
});
</script>


<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="question[]" placeholder="Enter your question" class="form-control"/></td><td><textarea name="name[]" id="input2" hidden="hidden" cols="20" rows="4" class="form-control input1" placeholder="Please Multiple Choises Seperate with (,)"></textarea> <select name="type[]"  class="form-control select1 " onchange="selection()" id="select2" style="font-family:FontAwesome,sans-serif;"><option value="">Question&nbsp;Type</option><option value="1"><span>&#9776; &nbsp;Text</span></option><option value="2"><span>&#xf016; &nbsp;File Upload</span></option><option value="3"><span>&#x1F550;&nbsp;Date/time</span></option><option value="4"><span>&#xf0f6;&nbsp;Comment Box</span></option><option value="5" id="field"><span>&#9745; Checkbox</span></option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

</script>

<!-- Iteam Add   -->

<script>
    $('#decline_confirm2').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ url('Iteam.create') }}",
            type : "post",
            data:$('#decline_confirm2').serialize(),

            success:function(message)
            {

                location.reload();
                // $("#decline2").modal().hide()
               // $('#decline2').modal('hide');
                Swal.fire(
                 'Survey Item!',
                 'Successfully Saved!',
                'success'
               );

                // $('#decline2').modal('hide');
            // //    $('#d2').html('html');
            }

        })
    });
</script>
<!-- question   -->

<script>
    $('#decline_confirm').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ url('question.create') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {
                location.reload();
                // $("#decline2").modal().hide()
               // $('#decline2').modal('hide');
                Swal.fire(
                 'Question!',
                 'Successfully Saved!',
                'success'
               );

            //    $('#decline').modal('hide');
            // //    $('#decline_btn').text('Office Save');
            }

        })
    });
</script>



<!-- remove attribute-->


<script>

    $(document).ready(function(){

           $(document).on('change','.select1',function(){
                  var selected=$(this).val();

                  if(selected==5 || selected==6)
                  {

                      //document.getElementById("input1").removeAttribute("hidden");
                      $(this).siblings(".input1").removeAttr("hidden");
                     $('#field').hide();
                  }

                  else
                  {


                  }


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
