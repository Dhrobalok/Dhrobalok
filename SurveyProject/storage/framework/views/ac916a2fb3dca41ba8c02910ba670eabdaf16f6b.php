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
    transform: translate(-19px, -50%);
    font-size: 16px;
}


    </style>
</head>
<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 p-4 mt-2">
                    <div class="row justify-content-center p-2">
                        <img src="<?php echo e(asset('images/download.png')); ?>" alt="" style="border-radius: 70%;">

                     </div>
                    <div class="card">

                        <div class="card-body shadow">


                           <h4 class="text-center" style="color:rgb(56, 142, 142);">Log in</h4>

                           <?php if(session()->has('msg')): ?>
                                 <div class="alert alert-success">
                                    <?php echo e(session()->get('msg')); ?>

                                </div>
                            <?php endif; ?>
                        <form action="<?php echo e(route('login')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label style="color:rgb(56, 142, 142);">Email address</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start ">

                                <div class="col-md-12">

                                    <input type="email" class="form-control"  name="email" placeholder="Email" required>



                               </div>


                            </div>


                            <div class="row justify-content-start">

                                <div class="col-md-6">
                                    <label style="color:rgb(56, 142, 142);">Password</label><span class="text-danger"></span></label>
                                </div>



                            </div>

                            <div class="row form-group justify-content-start">

                                <div class="col-md-12">


                                        <input type="password" id="password" class="form-control password"  name="password" placeholder="Password" required>
                                        <i class="fa fa-eye-slash" onclick="showHide()" id="eye"></i>






                               </div>


                            </div>


                            <div class="row justify-content-start ">
                                <div class="col-md-6">

                                    <a href="<?php echo e(route('email.send')); ?>"><span style="color: rgb(25, 84, 84);">Forgot&nbsp;email?</span></a>

                                </div>


                            </div>


                            <div class="row form-group justify-content-center ">
                                <div class="col-md-9.5 p-3">

                                    <button  class="btn btn-success">Log in</button>

                                </div>
                            </div>


                        </form>

                            <p class="text-center">Don't have an account?

                                <a href="<?php echo e(route('registration')); ?>"><span style="color:black;">SignUp</span></a>
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


</body>


</html>
<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/UserAuth/login.blade.php ENDPATH**/ ?>