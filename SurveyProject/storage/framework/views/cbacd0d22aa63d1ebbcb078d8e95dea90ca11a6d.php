<?php $__env->startSection('content'); ?>


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card mt-5">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">Survey Allocation</p>

       </div>

       <?php
           $item=App\Models\Item::get();
       ?>

       <div class="card-body">
          <form action="<?php echo e(url('Allocate.Survey')); ?>" method="post" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <div class="form-group">
                <label for="file">Survey Item</label>
                 <input type="hidden" name="id" value="<?php echo e($id); ?>">


                 <select name="itemid" id="" class="form-control">

                    <option value="">Choose Item</option>
                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($items->id); ?>"><?php echo e($items->name); ?></option>

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



<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/suvery_allocation.blade.php ENDPATH**/ ?>