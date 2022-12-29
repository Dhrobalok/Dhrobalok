<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/loans2go/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Jan 2021 10:51:27 GMT -->

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="loans HTML Template">
    <meta name="keywords" content="loans, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="img/favicon.ico" rel="shortcut icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/font-awesome.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/owl.carousel.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/flaticon.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/slicknav.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend_files/css/style.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <style>
      .nav-link
      {
          font-weight:bolder;
      }
      body
      {



          font-family:'Gentium Basic'
      }
      img
      {
        width: 90px;
        height: 70px;

        background: #fff;
        border-radius: 40px;
        position: relative;
      }

      body
      {

        background-image: url('<?php echo e(asset('images/photo-1583024011792-b165975b52f5.avif')); ?>');
        background-size: cover;
        background-repeat: no-repeat;
        /* background: rgba(255, 255, 255, 0.8); */


      }

    </style>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mr-auto">
            <li>
                <a class="nav-link" href="#" style="color: #fff;">Home <span class="sr-only">(current)</span></a>
            </li>

             
        </ul>

        <ul class="navbar-nav">

           
           <?php
           $employee_id=Session::get('employeeid');
        //    $request->session(get('key', 'default');
            //    $permission=App\Models\Permission::where('employee_id',$employee_id)->get();

           ?>





           


            <li>
                 <a class="nav-link" href="<?php echo e(route('admin.index')); ?>" style="color: #fff;">Dashboard</a>
            </li>
            

            
           <li>
                <a class="nav-link" href="<?php echo e(URL::to('/logout-custom')); ?>" style="color: #fff;">Logout</a>
            </li>






           

        </ul>
    </div>
</nav>
<div class="container-fluid">
 <?php echo $__env->yieldContent('content'); ?>
</div>

<?php echo $__env->make('backend.header-footer-files.js_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('frontend_files/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_files/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_files/js/jquery.slicknav.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_files/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_files/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend_files/js/main.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <?php echo $__env->yieldPushContent('js'); ?>

</body>

<!-- Mirrored from preview.colorlib.com/theme/loans2go/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Jan 2021 10:51:38 GMT -->

</html>
<?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/frontend/layout.blade.php ENDPATH**/ ?>