<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <style>


      img
      {
        width: 80px;

        background: #fff;
        border-radius: 100%;
      }
      /*
      .card
      {
        width: 80%;
        height: 80%;
        text-align: center;
      }
      */

      /*
      #app
      {
        background-image: url('<?php echo e(asset('public/company_pic/DSCN2463.jpg')); ?>');
        width: 100%;
        height: 100%;

        background-position: 20% 40%;
      }
      */

      body
      {
        /* font-family:'Gentium Basic'; */
        background-image: url('<?php echo e(asset('images/GYM 1.jpg')); ?>');
        background-size: cover;
        background-repeat: no-repeat;

        /* padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
         */



      }
    </style>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>" style="background-color:#E3EBF3;">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->



                                <li>
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><span style="font-weight: bold;color:cornsilk;">Login</span></a>
                                </li>



                                <li>
                                    <a class="nav-link" href="<?php echo e(route('employesignup')); ?>"><span style="font-weight: bold;color:cornsilk;">Register</span></a>
                                </li>




                            

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->make('backend.header-footer-files.js_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/layouts/app.blade.php ENDPATH**/ ?>