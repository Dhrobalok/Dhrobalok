<?php $__env->startSection('content'); ?>

<style>
    .btn-success
    {
        width: 200px !important;
        text-align: center !important;
    }
</style>

    <section>

            <div class="row justify-content-center">
                <div class="row justify-content-center p-2">
                    <img src="<?php echo e(asset('images/download.png')); ?>" alt="" style="border-radius:40px;width:100px;height:80px;">

                 </div>
                <div class="col-md-7 p-4 mt-0">

                 <div class="card">

                    <div class="card-body shadow">


                            <h4 class="text-center" style="color:rgb(56, 142, 142);">Create an account</h4>


                            <?php if( Session::has("msg") ): ?>
                             <script>
                                Swal.fire({
                                  icon: 'success',
                                  title: '<?php echo e(Session::get("msg")); ?>',

                                  })

                             </script>

                              
                            <?php endif; ?>
                     <form action="<?php echo e(route('user.Save')); ?>" method="post" enctype="multipart/form-data">
                         <?php echo csrf_field(); ?>
                           <div class="row justify-content-start">

                            <div class="col-md-6">
                                <label>First Name</label><span class="text-danger"></span></label>
                            </div>



                           </div>

                         <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="text" class="form-control"  name="firstname" placeholder="Full Name" required>



                           </div>


                         </div>


                         <div class="row justify-content-start">

                            <div class="col-md-6">
                                <label>Last Name</label><span class="text-danger"></span></label>
                            </div>



                           </div>

                         <div class="row form-group justify-content-start">

                            <div class="col-md-12">

                                <input type="text" class="form-control"  name="lastname" placeholder="Full Name" required>



                           </div>


                         </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Email address</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="email" class="form-control"  name="email" placeholder="Email" required>

                                       <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                           <div class="error" style="color:red;"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Password</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="password" class="form-control"  name="password" placeholder="Password" required>



                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>User&nbsp;Image</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="file" class="form-control"  name="image" placeholder="Email" required>



                               </div>


                            </div>


                            <div class="row  justify-content-center mt-4">


                                    <button class="btn btn-success">Register</button>

                                
                            </div>


                     </form>




                        </div>

                    </div>

                </div>

            </div>


    </section>


    <?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/adduser.blade.php ENDPATH**/ ?>