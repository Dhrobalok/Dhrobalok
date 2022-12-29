<?php $__env->startSection('content'); ?>


<style>
    .card{
        width: 60%;
    }
</style>


  <section class="row justify-content-center">

    <div class="card shadow p-2" style="background-color: #f3f7f9;">

        <div class="card-header text-center py-1">

            <h4 style="font-family: inherit;">Update <?php echo e(ucwords($id)); ?></h4>

        </div>

           <form action="<?php echo e(url('update.servey')); ?>" method="post"  enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <input type="hidden" name="survey_id" value="<?php echo e($id); ?>">

            <?php $__currentLoopData = $surve_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $QuestionId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <?php
                   $question=App\Models\question::where('id',$QuestionId->q_id)->first();
               ?>


               <?php if( $question->type==2): ?>


                  <div class="row justify-content-start ">

                     <div class="col-md-6">
                           <label style="color:rgb(56, 142, 142);"><?php echo e(ucwords($question->name)); ?></label><span class="text-danger"></span></label>
                     </div>



                  </div>


                  <div class="row form-group justify-content-center">

                    <div class="col-md-12">
                        <input type="hidden" name="q_id[]" value="<?php echo e($QuestionId->q_id); ?>">

                        <input type="file" class="form-control"  name="file[]">
                        <span style="align:center;"><?php echo e($QuestionId->value); ?></span>

                   </div>

                </div>



                 <?php else: ?>

                 <div class="row justify-content-start">

                    <div class="col-md-6">
                          <label style="color:rgb(56, 142, 142);"><?php echo e(ucwords($question->name)); ?></label><span class="text-danger"></span></label>
                    </div>



                 </div>


                 <div class="row form-group justify-content-center p-2">

                    <div class="col-md-12">
                        <input type="hidden" name="q_id[]" value="<?php echo e($QuestionId->q_id); ?>">

                        <input type="text" class="form-control"  name="value[]" value="<?php echo e($QuestionId->value); ?>">

                   </div>

                </div>


               <?php endif; ?>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


               <div class="row form-group justify-content-center mt-4 py-3">


                    <button  class="btn btn-success" style="width:50%;">Update&nbsp;Survey</button>





               </div>

           </form>

    </div>



  </section>








    <?php $__env->stopSection(); ?>






              

<?php echo $__env->make('backend.Dashboard.servey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/Survey_edit.blade.php ENDPATH**/ ?>