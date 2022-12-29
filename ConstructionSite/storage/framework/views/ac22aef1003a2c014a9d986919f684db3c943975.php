<?php $__env->startSection('content'); ?>
<style>
    * {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(4.5); /* IE 9 */
  -webkit-transform: scale(4.5); /* Safari 3-8 */
  transform: scale(4.5);
}
</style>

<div class="row justify-content-center">

       <div class="col-md-8">

        <div class="card shadow">


            <div class="card-body">
                  <form action="<?php echo e(url('UpdateVedio',$vedio->id)); ?>" method="POST" enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>


                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="">Company&nbsp;Name</label>


                            </div>




                        </div>



                        <div class="row justify-content-center form-group ">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="<?php echo e($vedio->name); ?>">

                            </div>



                        </div>


                     <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Vedio&nbsp;File</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="file" name="vedio" class="form-control">

                            <?php if($errors->has('vedio')): ?>
                            <span class="text-danger mt-2"><?php echo e($errors->first('vedio')); ?></span>
                           <?php endif; ?>

                        </div>

                    </div>

                    <div class="row justify-content-center p-4">


                            <button class="btn btn-success">Submit</button>



                    </div>


                  </form>



            </div>
            </div>

       </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/editVedio.blade.php ENDPATH**/ ?>