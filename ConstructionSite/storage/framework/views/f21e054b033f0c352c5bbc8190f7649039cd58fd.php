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
                  <form action="<?php echo e(url('logoAdd')); ?>" method="POST" enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>


                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <label for="">Company Type</label>


                            </div>




                        </div>



                        <div class="row justify-content-center form-group ">

                            <div class="col-md-6">
                              <select name=""  class="form-control company">
                                <option value="">Choose Option</option>


                                <option value="">Non&nbsp;Register&nbsp;Company</option>
                                <option value="2">Register&nbsp;Company</option>

                              </select>

                            </div>



                        </div>


                     <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Company&nbsp;Name</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Company Name">


                        </div>

                    </div>


                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">Company&nbsp;Logo</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="file" name="logo" class="form-control">


                        </div>

                    </div>


                    <div class="row justify-content-center">


                        <div class="col-md-6">
                            <label for="">WebSite&nbsp;Link</label>


                        </div>


                    </div>

                    <div class="row justify-content-center form-group">



                        <div class="col-md-6">
                            <input type="text" name="link" class="form-control" placeholder="Website Link"  required>


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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                 <form method="post" id="update_confirm">
                    <?php echo csrf_field(); ?>



                        <div class="row justify-content-center">


                            <div class="col-md-6">
                                <label for="">Company&nbsp;Name</label>


                            </div>


                        </div>

                        <div class="row justify-content-center form-group">



                            <div class="col-md-6">
                                <?php
                                    $allCompane=App\Models\Compane::get();
                                ?>


                                    <select name="Company" id="" class="form-control">

                                        <option value="">Choose Option</option>
                                        <?php $__currentLoopData = $allCompane; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compane): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($compane->id); ?>"><?php echo e($compane->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>





                            </div>

                        </div>





                    <div class="row justify-content-center mb-1 mt-4">
                        <button class="btn btn-primary" style="width: 15%;"> Submit</button>

                    </div>
                 </form>
          ...
        </div>

      </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<script>
    $(document).ready(function() {

        $(document).on('click','.company',function()
        {
            var selected=$(this).val();

            if(selected==2)
            {
                $('#exampleModal').modal('show');
            }

        })

    });
  </script>

<script>
    $('#update_confirm').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
            }
        });
        $.ajax({


            url : "<?php echo e(url('Register')); ?>",
            type : "post",
            data:$('#update_confirm').serialize(),

            success:function(message)
            {

               location.reload();


            }

        })
    });
</script>



<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/logoAd.blade.php ENDPATH**/ ?>