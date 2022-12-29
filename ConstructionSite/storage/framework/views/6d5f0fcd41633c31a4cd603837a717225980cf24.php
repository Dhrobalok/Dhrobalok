<?php $__env->startSection('content'); ?>
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

                        <?php
                            $id=Session::get('employeeid');
                        ?>

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

                                            <?php if($employee): ?>

                                            <img src="<?php echo e(URL :: to($employee -> employee_photo)); ?>"
                                            class='rounded-circle' height="150px" width="150px;">


                                            <?php else: ?>
                                            <img src="#"
                                            class='rounded-circle' height="150px" width="150px;">
                                            <?php endif; ?>

                                        </div>
                                        <div class="row justify-content-center">
                                            <?php if($employee): ?>
                                            <h5><?php echo e($employee->name); ?></h5>

                                            <?php else: ?>

                                            <h5></h5>

                                            <?php endif; ?>

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

                                                <?php if($employee): ?>
                                                <label><?php echo e($employee->name); ?></label>

                                                <?php else: ?>

                                            <label></label>

                                            <?php endif; ?>



                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Email : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <?php if($employee): ?>
                                                <label><?php echo e($employee->email); ?></label>

                                                <?php else: ?>

                                                <label for="">N/a</label>


                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Mobile : </h6>
                                            </div>
                                            <div class="col-lg-9">

                                                <?php if($employee): ?>
                                                  <label><?php echo e($employee->mobile_no); ?></label>

                                                  <?php else: ?>

                                                  <label for="">N/a</label>

                                                <?php endif; ?>


                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Company Name : </h6>
                                            </div>
                                            <div class="col-lg-9">

                                                <?php if($employee): ?>
                                                <label><?php echo e($employee->company_type); ?></label>

                                                <?php else: ?>

                                                  <label>N/a</label>
                                                <?php endif; ?>


                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <?php
                                            $id=Session::get('employeeid');
                                            $registration=App\Models\User::where('id',$id)->first();
                                            $staus=App\Models\Payslip::where('employee_id',$id)->where('status',1)->orderBy('id','desc')->first();

                                            $end=Carbon\Carbon::now();
                                             $start=Carbon\Carbon::parse($staus->created_at);

                                            $diffday=$start->diffInYears($end);


                                           ?>
                                           

                                            <div class="col-lg-3">

                                                <h6 style="font-size:18px;">Renewal Status:


                                                </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <?php if($staus): ?>


                                                <?php if($diffday>1): ?>

                                                <span style="color: red;">Due:&nbsp;<?php echo e($diffday); ?>&nbsp;Years </span>


                                                <?php else: ?>
                                                    <span style="color: red;display:inline-block">Paid</span>
                                                <?php endif; ?>


                                                <?php else: ?>
                                                <span style="color: red;display:inline-block">Due</span>

                                                <?php endif; ?>

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

        
        <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-white">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                            <span aria-hidden="true">&times;</span>
                          </button>

                    </div>
                    <div class="modal-body">
                       <form  action="<?php echo e(route('renewpayslip')); ?>"  method="post" enctype="multipart/form-data">
                         <?php echo csrf_field(); ?>

                        <div class="row form-group justify-content-center">


                            

                            <div class="col-md-8">
                                <label for="">Renewal Payslip</label>
                                <?php
                                $id=Session::get('employeeid')
                               // $staus=App\Models\Payslip::where('employee_id',$id)->first();
                               ?>
                                <input type="hidden" name="employee_id" value="<?php echo e($id); ?>">
                                <input type="file" class="form-control" id="number" name="payslip" placeholder="price" required>
                                

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
                   <form action="<?php echo e(route('updateProfile')); ?>" method="post" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>

                           <?php
                            $id=Session::get('employeeid');
                            $user=App\Models\Employee::where('employee_id',$id)->first();
                           // $staus=App\Models\Payslip::where('employee_id',$id)->first();
                           ?>


                        <input type="hidden" name="id" value="<?php echo e($id); ?>">



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

                                <?php if($user): ?>
                                 <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control">

                                <?php endif; ?>


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
                        <?php if($user): ?>
                        <input type="text" name="company"  class="form-control" value="<?php echo e($user->company_type); ?>" >

                        <?php endif; ?>


                       </div>

                   </div>


                   <div class="row justify-content-center mt-4">

                    <div class="col-md-6">
                       <label for="">Mobile No</label>

                    </div>

               </div>


               <div class="row justify-content-center">
                   <div class="col-md-6">

                    <?php if($user): ?>
                    <input type="text" name="mobile"  class="form-control" value="<?php echo e($user->mobile_no); ?>" >

                    <?php endif; ?>


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







    
        <?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>









  <script>
    $('#decline_confirm').on('submit',function(e){


         e.preventDefault();
        //  processData: false,
        // contentType: false,

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
            }
        });
        $.ajax({
            url : "<?php echo e(route('updateProfile')); ?>",
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




<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/frontend/profile.blade.php ENDPATH**/ ?>