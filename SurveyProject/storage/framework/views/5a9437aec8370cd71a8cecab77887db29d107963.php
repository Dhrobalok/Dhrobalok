<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity=
    "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">

    <?php echo $__env->make('backend.header-footer-files.css_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.header-footer-files.js_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        .btn-success
        {
            width: 200px !important;
            text-align: center !important;
        }

        .password+.fa, .cPassword+.fa
         {
    top: 50%;
    right: 5px;
    position: absolute;
    color: #666;
    cursor: pointer;
    pointer-events: all;
    -webkit-transform: translate(-5px, -50%);
    -ms-transform: translate(-5px, -50%);
    transform: translate(-24px, -50%);
    font-size: 16px;
    }

    .select2-container
    {
        width: 100% !important;
        height: calc(1.5em + 0.85rem + 2px) !important;

    }
    </style>
</head>
<body>


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 p-4 mt-0">
                    <div class="row justify-content-center p-2">
                        <img src="<?php echo e(asset('images/download.png')); ?>" alt="" style="border-radius: 70%;">

                     </div>
                <div class="card">

                    <div class="card-body shadow">


                            <h4 class="text-center" style="color:rgb(56, 142, 142);">Create an account</h4>

                            <?php if(Session::has('message')): ?>
                            <div class="alert alert-success">
                               <?php echo e(session::get('message')); ?>

                           </div>
                            <?php endif; ?>


                            <?php if( Session::has("msg") ): ?>
                             <script>
                                Swal.fire({
                                  icon: 'success',
                                  title: '<?php echo e(Session::get("msg")); ?>',

                                  })

                             </script>


                              
                            <?php endif; ?>
                     <form action="<?php echo e(route('saveuser')); ?>" method="post">
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

                                    <input type="password" id="password" class="form-control password"  name="password" placeholder="Password" required>
                                    <i class="fa fa-eye-slash"  id="eye"></i>


                               </div>


                            </div>



                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Select&nbsp;Supervisor</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                     <?php
                                         $allteacher=App\Models\Teacher::get();
                                     ?>

                                     <select name="supervisor" id="" class="form-control">
                                        <option value="">Choose Option</option>

                                        <?php $__currentLoopData = $allteacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teachername): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($teachername->id); ?>"><?php echo e($teachername->name); ?></option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                     </select>



                               </div>


                            </div>




                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Student Id</label><span class="text-danger"></span></label>
                                </div>



                               </div>

                             <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="text" class="form-control"  name="studentId" placeholder="Student Id" required>



                               </div>


                             </div>



                             <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Major&nbsp;Subject</label><span class="text-danger"></span></label>
                                </div>



                               </div>

                             <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <select name="major_subject" id="" class="form-control">

                                        <option value="">Choose Option</option>
                                        <option value="MPH major in Epidemiology">MPH major in Epidemiology</option>
                                        <option value="MPH major in Hospital Management">MPH major in Hospital Management</option>
                                        <option value="MPH major in Health Service Managemnt and Policy">MPH major in Health Service Managemnt and Policy</option>
                                        <option value="MPH major in Community Nutrition">MPH major in Community Nutrition</option>
                                        <option value="MPH major in Occupational and Environmental Health">MPH major in Occupational and Environmental Health</option>
                                        <option value="MPH major in Community Medicine">MPH major in Community Medicine</option>
                                        <option value="MPH major in Health Promotion and Health Education">MPH major in Health Promotion and Health Education</option>
                                        <option value="MPH major in Reproductive and Child Health">MPH major in Reproductive and Child Health</option>
                                        <option value="MPH major in Non-Communicable Diseases">MPH major in Non-Communicable Diseases</option>
                                        <option value="MPH major in Dental Health">MPH major in Dental Health</option>
                                        <option value="MPH major in Medical Entomology">MPH major in Medical Entomology</option>


                                    </select>



                               </div>


                             </div>




                             <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label>Batch</label><span class="text-danger"></span></label>
                                </div>



                               </div>

                             <div class="row form-group justify-content-start">

                                <div class="col-md-12">

                                    <input type="text" class="form-control"  name="batch" placeholder="Enter Batch" required>



                               </div>


                             </div>







                            


                            <div class="row form-group justify-content-center p-2">
                                <div class="col-md-9.5">

                                    <button class="btn btn-success">Register</button>

                                </div>
                            </div>


                     </form>

                            <p class="text-center">Already have an account?

                                <a href="<?php echo e(route('user.login')); ?>">Log in</span></a>
                            </p>


                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <script>



        $(document).ready(function () {
            $("#eye").click(function () {


                if ($("#password").attr("type") === "password")
                 {

                    $("#password").attr("type", "text");

                  }
                else
                {
                    $("#password").attr("type", "password");
                }
            });
        });
            </script>


<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>

</body>
</html>
<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/UserAuth/registration.blade.php ENDPATH**/ ?>