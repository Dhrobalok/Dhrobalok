<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap menu, fixed, after scrolling page, navbar, menu CSS examples" />
<meta name="description" content="Bootstrap 5 fixed navbar on scroll page examples, Bootstrap 5" />

<title>CONSTRUCTION SITE</title>



<link rel="stylesheet" href="fonts.googleapis.com/css?family=Montserrat:400,700">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts,_icomoon,_style.css+css,_owl.carousel.min.css+css,_bootstrap.min.css+css,_style.css.pagespeed.cc.BVwOJsCDCo.css" />
<script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>



<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/dropzone/dist/min/dropzone.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/js/plugins/flatpickr/flatpickr.min.css')); ?>">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">






<style>
          .vertical {
            border-left: 6px;
            color: cornsilk;
            height: 120px;
            position:absolute;
            left: 50%;
        }
		#navbar_top
		{
			background-color: #365A7D;
		}
		#head
		{
			background-color: #125d9b;

		}
		#nvabr
		{
			margin-left: 120px;

		}



		#head2
		{
			background-image: url('../images/01.jpg');
			background-repeat: no-repeat;

            background-position: center;
			background-size: cover;
			height: 100%;




		}
		body
		{
			width: 100%;
		}

.navbar-nav .nav-link {
	padding-left: .1rem;
}
.navbar-nav a {
	color: #2f2b2b !important;
	transition: all ease 0.5s;
}
.navbar-nav a:hover,
.navbar-nav a:focus,
.navbar-nav a:active,
.navbar-nav a.hilite {
	color: #BFBFBF !important;
	background: #e57373 !important;
	border-bottom: 1px #7F7F7F solid !important;
}
/* ===== == = === 48em (768px) === = == ===== */
@media  only screen and (min-width : 48em) {
	.navbar-nav a:hover,
	.navbar-nav a:focus,
	.navbar-nav a:active,
	.navbar-nav a.hilite {
		transform: translateY(0.5rem) scaleY(1.2);
	}
	.navbar-nav .nav-link {
		padding-left: 0;
	}
}

@media  only screen and (min-width : 48em) {
	#hardware:hover,
	#hardware:focus,
	#hardware:active,
	#hardware.hilite {
		transform: translateY(0.5rem) scaleY(1.2);
	}
	#hardware {
		padding-left: 0;
	}
}

#hardware
{
	color: #E5E5E5 !important;
	transition: all ease 0.5s;

}

#hardware :hover,
#hardware :focus,
#hardware :active,
#hardware .hilite {
	color: #BFBFBF !important;
	background: #e57373 !important;
	border-bottom: 1px #7F7F7F solid !important;
}

#card1
{
	background-color:rgba(255,255,255, 0.8);
}
#card2
{
	background-color:rgba(255,255,255, 0.8);

}

.logo
{
	width: 60%;
	height:60%;
	text-align:center;
}
/* hr
 {

  border-radius: 5px;

  height:213px;
  background-color:rgba(255, 255, 255, 0.068);
} */


/* .customScrollBar
        {
             position: absolute;
            top: 0px;
            left: 0px;
            bottom: 0px;
            float: right;
            overflow-y: scroll;
            overflow-x: hidden;
			width: 200px;
			height:400px;


        } */

        .scrollit
         {
           overflow: scroll !important;
           overflow-x: hidden !important;
           overflow-y: scroll !important;
           height: 500px !important;
           width: 140px  !important;
        }

#sidebar
{
   width: 100%;
   float: right;

}

body
{
    overflow-x: hidden;
}

#logo
{
    border-radius: 100%;
}
/* .scrollit {
    overflow:scroll;
    height:500px;

    width: 140px;
} */



#image
{
  position: relative;

  display: block;

  clear: both;

  margin: 0px 0px 0px 0px;

  padding: 0px;

}

video
{
	width: 100% !important;
	object-fit: cover !important;
}


</style>


</head>
<body id="head2">
  <div id="head">

	  <div class="row justify-content-start" id="banar">

                <div class="col-md-5" id="image">
                    <img src="<?php echo e(asset('images/Bannar.png')); ?>" width="100%" height="169">

                </div>

                <div class="col-md-2 py-4">

                    <div class="d-flex">
                        <div class="vr" style="color:white"></div>
                      </div>


                        



                </div>

                <?php

                    $allvedio=App\Models\Vedio::select('vedio')->pluck('vedio');
                    $allDuration=App\Models\Vedio::select('duration')->pluck('duration');

                ?>
                <div class="col-md-5">

                    <video  autoplay  id="myVideo" muted="muted"  width="100%" height="169"></video>

                        <script type="text/javascript">

                                const video=<?php echo json_encode($allvedio, 15, 512) ?>;
                                const videoDuration=<?php echo json_encode($allDuration, 15, 512) ?>;

                                var vedioId=document.getElementById("myVideo");
                                var i=0;
                                var total=video.length;
                                var v='<?php echo e(asset('/')); ?>';

                                function show(name)
                                {

                                    var source=v+''+video[name];
                                    vedioId.src=source;
                                    //document.getElementById("myVideo").setAttribute("src", source);
                                    setInterval(loop, videoDuration[name]*1000);




                                                // document.getElementById("myVideo").setAttribute("src", video[i]);
                                                // document.getElementById("myVideo").load();
                                                // document.getElementById("myVideo").play();
                                                // setTimeout(10000);


                                }


                                function loop()
                                {

                                    if(i!=total)
                                    {
                                        console.log(show(i))
                                        i++;

                                    }





                                }





                                console.log(loop())



                        </script>


                </div>

       </div>
	</div>




<!-- ============= COMPONENT ============== -->

<nav id="navbar_top" class="navbar navbar-expand-lg navbar-light" >
    <div class="container-fluid">
		<a href="#" class="navbar-brand">
            <img src="<?php echo e(asset('images/bdproperty.png')); ?>" height="40" style="border-radius: 11px;" alt="CoolBrand"><sub style="font-size:22px;color:blanchedalmond;font-weight:bold;"></sub>

        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3" id="navbarCollapse">

            <div class="navbar-nav" id="nvabr">


				<div class="column">
					<div class="row  mx-auto">
					   <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Home</span></button></a>

					</div>

					<div class="row  mx-auto">
						 <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Apt</span></button></a>

					</div>

				 </div>

				 <div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Land</span></button></a>

				   </div>

				   <div class="row  mx-auto">
					   <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Plot</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(url('brickDashboard')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Brick</span></button></a>

				   </div>

				   <div class="row mx-auto">
					   <a href="<?php echo e(route('cementDashboard')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Cement</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(url('steel.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Steel</span></button></a>

				   </div>

				   <div class="row mx-auto">
					<a href="<?php echo e(url('Tiles.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Tiles</span></button></a>

				   </div>

				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(route('Door.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Door</span></button></a>

				   </div>

				   <div class="row mx-auto">
					<a href="<?php echo e(route('Sanetary.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Sanitary</span></button></a>

				   </div>

				</div>


				<div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(route('Feeting.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Feetings</span></button></a>


				   </div>

				   <div class="row mx-auto">
					   <a href="<?php echo e(route('sand.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Sand</span></button></a>

				   </div>

				</div>


			   <div class="column">
				   <div class="row mx-auto">
                    <a href="<?php echo e(url('architect.create')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Architect</span></button></a>


				   </div>

				   <div class="row">
					<a href="<?php echo e(url('interior.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Interior</span></button></a>

				   </div>



				</div>

				<div class="column">
				   <div class="row mx-auto">
					   <a href="<?php echo e(url('paint.search')); ?>" class="nav-item nav-link text-center"><button class="btn btn-alt primary"><span style="color: white">Paint</span></button></a>


				   </div>

				   <div class="row">
                    <?php
                    $productitem=App\Models\Electric::select('iteam')->distinct()->get();
             ?>

            <ul  class="navbar-nav">

             <li class="nav-item dropdown">
                 <a class="nav-link text-center p-2" href="#" data-bs-toggle="dropdown"><button class="btn btn-alt primary"><span style="color: white">Electric</span></button></a>
                  <ul class="dropdown-menu">

                     <?php $__currentLoopData = $productitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li>
                         <a class="dropdown-item" href="<?php echo e(url('see.electric',$productall->iteam)); ?>" style="color: #1a1d1f;">

                             <span  style="color: #1a1d1f;"><?php echo e($productall->iteam); ?></span>
                         </a>

                     </li>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  </ul>
              </li>

            </ul>


				   </div>



				</div>









		   </div>

















			<div class="column">




				
					<div class="row mx-auto">


                        <ul  class="navbar-nav">

                            <li class="nav-item dropdown">
					   <a href="#" class="nav-item nav-link text-center bg-blue-dark" data-bs-toggle="dropdown" id="hardware"> <button class="btn btn-alt-primary"><span style="color: white;">Hardware</span></button> </a>



                       <?php
                       $productitem=App\Models\Hardwar::select('productitem')->distinct()->get();
                   ?>


               <ul class="dropdown-menu">

                <table class="table">

                    <tbody>
                        <?php $__currentLoopData = $productitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td>



                                    <li style="font-size:14px;"><a class="dropdown-item" href="<?php echo e(url('about.hardware',$productall->productitem)); ?>">  <?php echo e($productall->productitem); ?></a></li>






                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    </tbody>

                </table>


                 
               </ul>

            </li>
        </ul>

			        </div>
					<div class="row mx-auto">

                        <ul  class="navbar-nav">

                            <li class="nav-item dropdown">
					   <a href="#" class="nav-item nav-link text-center" data-bs-toggle="dropdown" id="hardware"> <button class="btn btn-alt primary"><span style="color: white;margin-top:80px;">Company</span></button> </a>

                    </li>
                 </ul>
					</div>



			   </div>



			</div>







    </div>


</nav>



<!--  Nav bar component  -->

<div class="container" style="color: black;">

        <?php echo $__env->yieldContent('content'); ?>




        <div class="row justify-content-center">

            <div class=" text-center p-3">
                <p style="color: #fef6f6;font-size:14px;">Powerd By</p>

                <a href="https://rajit.net/">
                    <img src="https://rajit.net/wp-content/themes/websdevrajit/images/logo.png" alt="" class="img-responsive" style="width: 130px;;background-color:rgb(107, 88, 75);">
                </a>

            </div>


       </div>

</div>




<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/userdashboard/master.blade.php ENDPATH**/ ?>