<?php $__env->startSection('content'); ?>


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card mt-5">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">Edit Survey </p>

       </div>

       <?php if(session()->has('msg')): ?>
       <div class="alert alert-success">
          <?php echo e(session()->get('msg')); ?>

      </div>
  <?php endif; ?>

       <?php
           $item=App\Models\Item::get();
       ?>

       <div class="card-body">
          <form action="<?php echo e(url('Update.Survey')); ?>" method="post">
             <?php echo csrf_field(); ?>
             <div class="form-group">
                <label for="file">From Student</label>
                 <input type="hidden" name="id" value="<?php echo e($id); ?>">
                 <?php
                     $name=App\Models\User::where('studentId',$id)->first();
                 ?>
                 <input type="text" class="form-control" value="<?php echo e($name->firstname); ?> <?php echo e($name->lastname); ?>" readonly>

             </div>

             <div class="form-group">
                <label for="file">To Student</label>

                 <?php
                     $Allname=App\Models\User::where('status',1)
                     ->get();
                 ?>

                 <select name="tostdent"  class="form-control">
                    <option value="">Choose Student</option>
                    <?php $__currentLoopData = $Allname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nameall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($nameall->studentId); ?>"><?php echo e($nameall->firstname); ?> <?php echo e($nameall->lastname); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                 </select>

             </div>


             <div class="form-group">
                <label for="file">Select Item</label>

                 <?php
                     $allitem=App\Models\Item::get();
                 ?>

                 <select name="item" id="" class="form-control">
                     <option value="">Choose Item</option>
                      <?php $__currentLoopData = $allitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($itemall->id); ?>"><?php echo e($itemall->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                 </select>

             </div>

             <div class="row justify-content-center mt-4">
                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

            </div>




         </form>
       </div>
       </div>

       </div>








<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/Edit_survey.blade.php ENDPATH**/ ?>