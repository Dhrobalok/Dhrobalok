@extends('backend.Dashboard.servey')

@push('styles')
<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .card
    {
        width: 100%;
    }

    .head
    {
        text-align: left;
    }

/* .modal-content
{
    width: 500px !important;
} */

.modal {
    --bs-modal-zindex: 1055;
    --bs-modal-width: 60% !important;
    --bs-modal-padding: 1rem;
    --bs-modal-margin: 0.5rem;
    --bs-modal-color: ;
    --bs-modal-bg: #fff;
    --bs-modal-border-color: var(--bs-border-color-translucent);
    --bs-modal-border-width: 1px;
    --bs-modal-border-radius: 0.5rem;
    --bs-modal-box-shadow: 0 0.125rem 0.25remrgba(0, 0, 0, 0.075);
    --bs-modal-inner-border-radius: calc(0.5rem - 1px);
    --bs-modal-header-padding-x: 1rem;
    --bs-modal-header-padding-y: 1rem;
    --bs-modal-header-padding: 1rem 1rem;
    --bs-modal-header-border-color: var(--bs-border-color);
    --bs-modal-header-border-width: 1px;
    --bs-modal-title-line-height: 1.5;
    --bs-modal-footer-gap: 0.5rem;
    --bs-modal-footer-bg: ;
    --bs-modal-footer-border-color: var(--bs-border-color);
    --bs-modal-footer-border-width: 1px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: var(--bs-modal-zindex);
    display: none;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
}


</style>
@endpush

@section('content')






<div class="card shadow mt-4">







               @if( Session::has("delete") )
               <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Question Deleted !',

                    })

               </script>


              @endif

              @if ($titlename)

              <div class="border text-center" style="width: 100%; height:auto; background-color:#d5e3eb;">
                <p class="mt-3" style="color: #505354;font-size:1rem;">{{ucwords($titlename->name)}} <span>Information Copy</span></p>
               </div>

              @endif



              @if(session()->has('msg'))

              <div align="center" class="alert alert-success mt-3">
                {{ session()->get('msg') }}
              </div>

            @endif


            @if(session()->has('Alert'))

            <div align="center" class="alert alert-success mt-3">
              {{ session()->get('Alert') }}
            </div>

          @endif


            <form action="{{route('survey.save')}}" method="POST" enctype="multipart/form-data">
                @csrf

                            <table class="table table-borderless mt-3" style="display:inline-table;">
                                <tbody class="text-center" id="table-item">

                                    <tr>
                                        <td style="text-align:left;">Sample&nbsp;Number:</td>

                                        <td><input type= "text" class="form-control"  name="surve_id"  required></td>
                                    </tr>
                                @foreach ($questionall as $questions)
                                    <tr class="hide{{$questions->id}}">


                                    @if ($questions->type==1)

                                    <input type="hidden" name="iteam_id" value="{{$iteam_id}}">
                                       @php
                                          $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                       @endphp

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

                                          {{-- @if ($SurveVALUE)

                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type= "text" class="form-control"  name="Q_value[]" value="{{$SurveVALUE->value}}">
                                          </td>

                                          @else --}}

                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type= "text" class="form-control"  name="Q_value[]">
                                          </td>



                                          {{-- @endif --}}


                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    @elseif ($questions->type==2)

                                    <input type="hidden" name="iteam_id" value="{{$iteam_id}}">
                                    {{-- <input type="hidden" name="q_id[]" value="{{$questions->id}}"> --}}
                                      @php
                                       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                       @endphp

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>
                                        {{-- @if ($SurveVALUE)

                                        <td>
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type="file" class="form-control"  name="image[]">
                                            <span>{{$SurveVALUE->value}}</span>

                                        </td>

                                        @else --}}

                                        <td>
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type="file" class="form-control"  name="file[]" >

                                        </td>

{{--
                                        @endif --}}


                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>


                                    @elseif ($questions->type==3)

                                    <input type="hidden" name="iteam_id" value="{{$iteam_id}}">

                                      @php
                                          $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                        @endphp

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

                                         {{-- @if ($SurveVALUE)

                                         <td>
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type= "date" class="form-control"  name="Q_value[]" value="{{$SurveVALUE->value}}">
                                        </td>

                                        @else --}}

                                        <td>
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type= "date" class="form-control"  name="Q_value[]" >
                                        </td>

                                         {{-- @endif --}}

                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    @elseif ($questions->type==4)
                                    <input type="hidden" name="iteam_id" value="{{$iteam_id}}">

                                        @php
                                           $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                         @endphp


                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>

                                          {{-- @if ($SurveVALUE)



                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <input type="text" name="Q_value[]" value="{{$SurveVALUE->value}}" class="form-control">


                                          </td>

                                          @else --}}

                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                            <textarea  id="" name="Q_value[]" class="form-control"></textarea>
                                          </td>


                                          {{-- @endif --}}

                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="{{ $questions->id }}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>


                                    @elseif ($questions->type==5)

                                    <input type="hidden" name="iteam_id" value="{{$iteam_id}}">
                                    <input type="hidden" name="q_id[]" value="{{$questions->id}}">
                                       @php
                                          // $name=App\Models\question('id',$questions->id)->first();
                                          $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
                                          $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$iteam_id)->first();

                                       @endphp





                                      <td class="head"><label>{{ucwords($questions->name)}}<span class = "text-danger"></span></label></td>


                                        {{-- @if ($CheckboxVal) --}}



                                            {{-- <td>
                                               <input type="input" class="form-control" name="Q_value[]" class="input" value="{{$CheckboxVal->value}}">


                                            </td> --}}


                                        {{-- @else --}}

                                        <td style="width: 80%;">

                                        @foreach ( $questionAll as $question)

                                          @php
                                             $checkbox=App\Models\Checkboxe::where('q_id',$question->id)->get();

                                          @endphp


                                           @if ($question->name)

                                              <input type="checkbox" name="Q_value[]" class="input" value="{{$question->name}}"><span>&nbsp;{{ucwords($question->name)}}</span>


                                            @endif

                                         @endforeach

                                        </td>





                                        <td>
                                            <a  class="delete" data-id="{{$questions->id}}"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>







                <div class="row justify-content-center form-group">

                    <div class="col-md-12 mt-4 p-2">

                        <div class="col-md-9">

                            <a href="#" id = "decline_btn" data-target = "#decline" data-toggle = "modal" style="text-decoration: none;">

                                <button class="btn btn-secondary"><i class="fa fa-plus" style="font-size: 12px;"></i>&nbsp;Add Question</button>
                            </a>




                        </div>


                    </div>

                    <div class="col-md-3">

                    </div>


                </div>



                <div class="text-center mt-5 p-2">


                    <button class="btn btn-success">Submit&nbsp;Survey </button>




               </div>
            </form>


         </div>





        {{-- <div class="border shadow text-center p-5 mt-5">
            <p>Powerd By</p>

            <a href="https://rajit.net/">
                <img src="https://rajit.net/wp-content/themes/websdevrajit/images/logo.png" alt="" class="img-responsive" style="width: 120px;;background-color:rgb(107, 88, 75);">
            </a>

        </div> --}}








        <!--  Add  Question -->

        <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">



                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction3()">
                        <span  aria-hidden="true" style="font-size: 60px;color:rgb(90, 73, 73);float:right">&times;</span>
                      </button>



                       <div class="container2">

                          <div class="row">
                             <div class="col-md-12">


                                <form id="decline_confirm3">
                                    @csrf


                                     <div align="right" >

                                       <button type="button" name="add" id="add" class="btn btn-secondary">Add&nbsp;More</button>
                                    </div>


                                    <input type="hidden" name="user_id" value=" {{Session::get('user_id');}}">

                                   <input type="hidden" name="iteam_id" value="{{$iteam_id}}">


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
                                        <input id="input1" type="text" class="form-control" hidden="hidden"  name="checQuestion[]" placeholder="Checkbox question" multiple>
                                        <select name="type[]"  class="form-control select1" onchange="selection()" id="select1" style="font-family: 'FontAwesome', 'sans-serif';">
                                            <option value="">Question Type</option>
                                            <option value="1"><span>&#9776; &nbsp;Text</span></option>
                                            <option value="2"><span>&#xf016; &nbsp;File Upload</span></option>

                                            <option value="3"><span>&#x1F550;&nbsp;Date/time</span></option>
                                            <option value="4"><span>&#xf0f6;&nbsp;Comment Box</span></option>
                                            <option value="5" id="input"><span>&#9745; Checkbox</span></option>




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






    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                 <form method="post" id="update_confirm" enctype="multipart/form-data">
                    @csrf

                    <div class="card" id="tableContent">


                    </div>

                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary" style="width: 15%;"> Submit</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>

<!-- checkbox  -->
</div>
@endsection

@push('js')


<script>

  $(document).ready(function(){

         $(document).on('change','.select1',function(){
                var selected=$(this).val();

                if(selected==5)
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

$(document).ready(function() {



    $(document).on('click','.delete',function(){



    var tr = $(this).attr('data-id');

       $('.hide'+tr).remove();


  });
});



</script>


<!-- add question -->


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

 <!--  Add  Question -->


 <script>
    $('#decline_confirm3').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({


            url : "{{ url('copyquestion.create') }}",
            type : "post",
            data:$('#decline_confirm3').serialize(),

            success:function(message)
            {
                $('#table-item').append(message.html);
                $("#decline_confirm3").trigger("reset");
                $('#decline').hide();
                $("body").removeClass("modal-open");
                $('.modal-backdrop').hide();



                Swal.fire(
                 'Question!',
                 'Successfully Saved!',
                'success'
               );


            }

        })
    });
</script>


<!--- delete with ajax without remove data -->


{{-- <script>
     $(document).on("click",'.delete', function(){

        var id = $(this).attr("data-id");
     var remove=$(this).closest('tr');
    // console.log($(this).closest('.row'))

    //$(this).attr("data-id");

    $.ajax({

      url: "{{ route('question.delete') }}",
      data: {"id": id,"_token": "{{ csrf_token() }}"},
      type: 'post',
      success: function(result){
        remove.remove();
      }
    });

     });


</script> --}}


<!--  Save data without refresh  --->

<script>

  $("#input").on("click", function(){


    // var id = $(this).attr("data-id");
    //  var remove=$(this).closest('.row');
    // // console.log($(this).closest('.row'))

    // //$(this).attr("data-id");

    $.ajax({

      url: "{{ route('New.field') }}",
    //   data: {"id": id,"_token": "{{ csrf_token() }}"},
       type: 'get',
      success: function(result)
      {

        $('#table-item').html(response.html);
      }
    });
  });
</script>


{{-- <script>

    $(".edit").on("click", function(){


       var id = $(this).attr("data-id");

      //  var remove=$(this).closest('.row');
      // // console.log($(this).closest('.row'))

      // //$(this).attr("data-id");

      $.ajax({

        url: "{{ route('survey.edit') }}",
         data: {"id": id,"_token": "{{ csrf_token() }}"},
         type: 'post',
        success: function(result)
        {

          $('#exampleModal').modal('show');
          $('#tableContent').html(result.html);
        }
      });
    });
  </script> --}}







@endpush
