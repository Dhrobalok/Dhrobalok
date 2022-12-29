<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>






<div class="card shadow mt-4">







               <?php if( Session::has("delete") ): ?>
               <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Question Deleted !',

                    })

               </script>


              <?php endif; ?>

              <?php if($titlename): ?>

              <div class="border text-center" style="width: 100%; height:auto; background-color:#d5e3eb;">
                <p class="mt-3" style="color: #505354;font-size:1rem;"><?php echo e(ucwords($titlename->name)); ?> <span>Information</span></p>
               </div>

              <?php endif; ?>



              <?php if(session()->has('msg')): ?>

              <div align="center" class="alert alert-success mt-3">
                <?php echo e(session()->get('msg')); ?>

              </div>

            <?php endif; ?>


            <?php if(session()->has('Alert')): ?>

            <div align="center" class="alert alert-success mt-3">
              <?php echo e(session()->get('Alert')); ?>

            </div>

          <?php endif; ?>


            <form action="<?php echo e(route('survey.save')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                            <table class="table table-borderless mt-3" style="display:inline-table;">
                                <tbody class="text-center" id="table-item">

                                    <tr>
                                        <td style="text-align:left;">Sample&nbsp;Number:</td>

                                        <td><input type= "text" class="form-control"  name="surve_id"  required></td>
                                    </tr>

                                    <input type="hidden" name="long" ID="long" VALUE="">
                                    <input type="hidden" name="lat" ID="lat" VALUE="">

                                <?php $__currentLoopData = $questionall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hide<?php echo e($questions->id); ?>">


                                    <?php if($questions->type==1): ?>

                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">
                                       <?php
                                          $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                       ?>

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>

                                          

                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                            <input type= "text" class="form-control"  name="Q_value[]">
                                          </td>



                                          


                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    <?php elseif($questions->type==2): ?>

                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">
                                    
                                      <?php
                                       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                       ?>

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>
                                        

                                        <td>
                                            <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                            <input type="file" class="form-control"  name="file[]" >

                                        </td>




                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>


                                    <?php elseif($questions->type==3): ?>

                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">

                                      <?php
                                          $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                        ?>

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>


                                        <td>
                                            <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                            <input type= "date" class="form-control"  name="Q_value[]" >
                                        </td>

                                         

                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    <?php elseif($questions->type==4): ?>
                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">

                                        <?php
                                           $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                         ?>


                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>



                                          <td style="width: 100%">
                                            <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                            <textarea  id="" name="Q_value[]" class="form-control"></textarea>
                                          </td>


                                          

                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>


                                    <?php elseif($questions->type==5): ?>

                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">
                                    <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                       <?php
                                          // $name=App\Models\question('id',$questions->id)->first();
                                          $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
                                          $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$iteam_id)->first();

                                       ?>





                                      <td class="head"><label><?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>




                                        <td style="width: 80%;">

                                        <?php $__currentLoopData = $questionAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                          <?php
                                             $checkbox=App\Models\Checkboxe::where('q_id',$question->q_id)->get();

                                          ?>


                                           <?php if($question->name): ?>

                                              <input type="checkbox" name="Q_value[]" class="input" value="<?php echo e($question->name); ?>"><span>&nbsp;<?php echo e(ucwords($question->name)); ?></span>


                                            <?php endif; ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </td>

                                        <td>
                                            <a  class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                        <?php elseif($questions->type==6): ?>

                                        <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">
                                        <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                           <?php
                                              // $name=App\Models\question('id',$questions->id)->first();
                                              $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
                                              $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$iteam_id)->first();

                                           ?>





                                          <td class="head"><label><?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>




                                            <td style="width: 80%;">

                                            <?php $__currentLoopData = $questionAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                              <?php
                                                 $checkbox=App\Models\Checkboxe::where('q_id',$question->q_id)->get();

                                              ?>


                                               <?php if($question->name): ?>

                                                  <input type="radio" name="Q_value[]"   value="<?php echo e($question->name); ?>"><span>&nbsp;<?php echo e(ucwords($question->name)); ?></span>


                                                <?php endif; ?>

                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </td>





                                        <td>
                                            <a  class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>





                                    <?php elseif($questions->type==7): ?>

                                    <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">

                                      <?php
                                          $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

                                        ?>

                                        <td class="head"><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>


                                        <td>
                                            <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
                                            <input type= "number" class="form-control"  name="Q_value[]" >
                                        </td>

                                         

                                        <td>
                                            <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                        </td>



                                    <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php echo csrf_field(); ?>


                                     <div align="right" class="p-2">

                                       <button type="button" name="add" id="add" class="btn btn-sm btn-secondary">Add&nbsp;More</button>
                                    </div>


                                    <input type="hidden" name="user_id" value=" <?php echo e(Session::get('user_id')); ?>">

                                   <input type="hidden" name="iteam_id" value="<?php echo e($iteam_id); ?>">


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






    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                 <form method="post" id="update_confirm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>


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
                'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
            }
        });
        $.ajax({


            url : "<?php echo e(url('question.create')); ?>",
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





<!--  Save data without refresh  --->

<script>

  $("#input").on("click", function(){


    // var id = $(this).attr("data-id");
    //  var remove=$(this).closest('.row');
    // // console.log($(this).closest('.row'))

    // //$(this).attr("data-id");

    $.ajax({

      url: "<?php echo e(route('New.field')); ?>",
    //   data: {"id": id,"_token": "<?php echo e(csrf_token()); ?>"},
       type: 'get',
      success: function(result)
      {

        $('#table-item').html(response.html);
      }
    });
  });
</script>







  <script>


    function initGeolocation()
    {



    if( navigator.geolocation )
    {

        // Call getCurrentPosition with success and failure callbacks
        navigator.geolocation.getCurrentPosition( success, fail );
    }
    else
    {
        alert("Sorry, your browser does not support geolocation services.");
    }
    }

    function success(position)
    {


        document.getElementById('long').value = position.coords.longitude;
       document.getElementById('lat').value = position.coords.latitude;

    }

    function fail()
    {
    // Could not obtain location
    }


</script>

<script>
    function myFunction2()
    {
      location.reload();
    }
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.Dashboard.servey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/viewQuestion.blade.php ENDPATH**/ ?>