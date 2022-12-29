<?php $__env->startSection('content'); ?>


<div class="row justify-content-center">
    <div class="col-md-7">
    <div class="card">
       <div class="card-header">
          <p class="text-center p-0 m-0" style="color: blueviolet;">STUDENT UPLOAD</p>

       </div>

       <div class="card-body">
          <form action="<?php echo e(url('Student.upload')); ?>" method="post" enctype="multipart/form-data">
             <?php echo csrf_field(); ?>
             <div class="form-group">
                <label for="file">Upload Student</label>
                <input type="file" class="form-control" name="student" required>
             </div>

             <div class="row justify-content-center mt-4">
                <button class="btn btn-primary" style="width: 25%;"> Submit</button>

            </div>




         </form>
       </div>
       </div>

       </div>








<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/upload.blade.php ENDPATH**/ ?>