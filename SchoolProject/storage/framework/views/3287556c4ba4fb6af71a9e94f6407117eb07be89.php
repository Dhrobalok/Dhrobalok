<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, minimum-scale=1.0">

<?php
   $company_name=App\Models\Company_settings::first();
?>

<title><?php echo e($company_name->name); ?></title>
<link rel="icon" href="<?php echo e(asset($company_name->image)); ?>"
type = "image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />





 



<?php echo $__env->make('backend.header-footer-files.js_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <style>

 #carousel-image {
    width: 100%;
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;




}




/* #carousel-image
{
    background-color: rgba(0, 8, 8, 0.7);
} */

#mainNavbar{
	padding-left:  50px;
	padding-top: 20px;
    background-color: rgba(0, 8, 8, 0.9);
}



.navbar-nav .nav-link{
	font-family: 'Source Serif Pro', serif;


}

.display-4{
	font-family: 'Source Serif Pro', serif;
}

.lead{
	font-family: 'Source Serif Pro', serif;
}

.navbar.scrolled {
    background: rgb(34, 31, 31);
    transition: background 500ms;
}

.font-weight-light{
	font-family: 'Source Serif Pro', serif;
}



html, body {
  overflow-x:hidden;
  background-image: url('images/offCanvasBg.png');
}

a {
  text-decoration: none;
}

#btn {
    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}

#btn2 {

    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 16px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}



#btn3 {
    background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
  cursor: pointer;
  padding: 8px 20px;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  border-radius: 40px;
  color: #f5f8fb;
  border: 1px solid #dee5f1;
  position: relative;
  -webkit-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -moz-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -ms-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  -o-transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.7s cubic-bezier(0.19, 1, 0.22, 1);
}

#btn i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn2 i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn3 i {
  position: absolute;
  font-size: 12px;
  line-height: 0;
  top: 50%;
  margin-top: 1px;
  right: 15%;

}

#btn:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn:hover i {
  display: block;
} */

#btn2:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn2:hover i {
  display: block;
} */


#btn3:hover {
  background-color: #1a6eff;
  border-color: #1a6eff;
  color: #fff;
  padding-right: 47px;
  margin-right: -26px;
}

/* #btn3:hover i {
  display: block;
} */

.courseitem
{
    position: absolute;
    /* background: #a98b53; */
    padding: 5px 15px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    right: 0px;
    top: 0;
    color: #fff;
    font-weight: 600;
    letter-spacing: .2px;

}
#upcomingimage
{
   opacity: 2.2;
}

#seminar
{
   background-image: url('images/photo-1510070009289-b5bc34383727.avif');
   background-size: cover;


}
#seminar .overlaw
{

   background-color: rgba(0, 8, 8, 0.7);
   height: 100%;
   weight:100%;

}

.counter-count
{
    font-size: 25px;
    /* background-color: #00b3e7; */
    /* border-radius: 50%; */
    position: relative;
    color: #ffffff;
    text-align: center;
    line-height: 32px;
    width: 92px;
    height: 92px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    display: inline-block;
}

#overlaw2
{
   background-color: rgba(71, 46, 12, 0.6);
   height: 100%;
   weight:100%;
}

#seminarCard
{
   background-image: url('images/diggity-marketing-SB0WARG16HI-unsplash_cleanup.jpg');
   /* background-color:rgba(0,0,0, 0.2); */


}
#cardbody
{

   background-color:rgba(87, 48, 48, 0.8);
}

}
.img-responsive {
    width: 100%;
    height: 50%;

}




#upcoming
{
    background-color:rgba(87, 48, 48, 0.8);
}


@media  only screen and (max-width: 599px) {
  #img {
         width: 30%;
  }
}

.avatar {
  vertical-align: middle;
  width: 120px;
  height: 120px;
  border-radius: 50%;
}

#indicators
{
    background: rgba(0, 8, 8, 0.7);
}

   </style>
</head>


<body>



      <nav id ="mainNavbar" class ="navbar navbar-dark  navbar-expand-md py-0 fixed-top">

         <?php
             $company=App\Models\Company_settings::first();
         ?>




               <?php if($company): ?>

               <div class="col-md-1 col-sm-1 pt-2 mb-2" id="img">
               <a href="#" >
                     <img src="<?php echo e(URL::to($company->image)); ?>" style="max-width:100%;height:auto;">

               </a>

               </div>


               <?php else: ?>

               <div class="col-md-3 pt-2 mb-2" id="img">
               <a href="#" >
                     <img src="#" style="width: 100%;height:auto;">

               </a>

               </div>

               <?php endif; ?>




         <button class = "navbar-toggler" data-toggle="collapse" data-target ="#navLinks">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class ="collapse navbar-collapse" id="navLinks">
                  <ul class ="navbar-nav">
                     <li class ="nav-item">
                     <a href="<?php echo e(route('rajitschool')); ?>" class="nav-link">HOME</a>
                     </li>
                     <li class ="nav-item">
                     <a href="#" class="nav-link">ABOUT</a>
                     </li>
                     <li class ="nav-item">
                     <a href="#" class="nav-link">SERVICES</a>
                     </li>
                     <li class ="nav-item">
                        <a href="<?php echo e(route('communication')); ?>" class="nav-link">CONTACTS</a>
                     </li>

                     
                  </ul>

                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a href="<?php echo e(route('user.login')); ?>" class="nav-link">LOGIN</a>
                     </li>

                   </ul>


             </div>




         </nav>













         <header>
         <?php
            $allslider=App\Models\Slider::get();
         ?>


         <div id="indicators" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">
            <li data-target="#indicators" data-slide-to="0" class="active"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
              <?php $__currentLoopData = $allslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <!-- Slide One - Set the background image for this slide in the line below -->
                

             <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" id="carouselItem">
                   <img  id="carousel-image" src="<?php echo e(URL::to($slider->image)); ?>" >


               <div class="carousel-caption d-none d-md-block">


                  <a href="<?php echo e(route('find.course')); ?>">
                     <button role="button" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i> <span class="spn" style="color: rgb(253, 250, 242);">Find Course</span>
                     </button>

                  </a>

               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Slide Two - Set the background image for this slide in the line below -->

            <!-- Slide Three - Set the background image for this slide in the line below -->

            </div>
            <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
            <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
         </div>


         </div>

         </header>

                     <!-- Page Content -->
                     

                     <?php
                     $course=App\Models\Course::where('learning_site',2)
                     ->orWhere('learning_site',1)
                     ->limit(3)->get();
                  ?>




<section class="py-5">
   <div class="container">

      <h4 class="text-center">Course Running</h4>


            <div class="row pt-4">


         <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allcourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php

                      $allseat=App\Models\Batch::
                      where('course_id',$allcourse->id)
                      ->where('active',1)
                      ->sum('seat');

                 ?>

               <div class="col-md-4 p-2">
                  <div class="card shadow h-100 bg-blue-lightest">

                     <div class="header">

                      <?php if($allcourse->learning_site==2): ?>
                          <div class="courseitem" style="background-color: #a98b53;">

                              Offline
                          </div>

                          <?php else: ?>

                          <div class="courseitem" style="background-color: #1d891d;">

                              Online
                          </div>

                      <?php endif; ?>


                        <img src="<?php echo e(URL::to($allcourse->image)); ?>" style="width: 100%;height:auto;">

                     </div>







                           <div class="d-flex mt-2 p-2">
                              <span style="font-weight: bold;">CourseName&nbsp;</span>
                              <span></span>
                              <span>&nbsp;<?php echo e(ucwords(preg_replace('/\s+/', '', $allcourse->name))); ?></span>

                           </div>


                           

                           <?php
                              $time=\Carbon\Carbon::now()->format('m-d-y');
                              $discount=App\Models\Payment::where('course_id',$allcourse->id)->first();
                        ?>




                                 <?php if($discount): ?>

                                 <?php if($discount->s_date!=null): ?>

                                    <?php if($discount->s_date>=$time && $time<=$discount->e_date): ?>

                                          <div class="d-flex  p-2">

                                                <span style="font-weight: bold;">Course Fees</span>
                                                <span>&nbsp;&nbsp;</span>
                                                <span><?php echo e($allcourse->fees-$discount->fullpayment); ?></span>

                                                <span class="currency" style="font-family: serif;">&#2547;</span>&nbsp;&nbsp;
                                                <span> <del><?php echo e($allcourse->fees); ?></del></span>
                                                <span class="currency" style="font-family: serif;">&#2547;</span>
                                          </div>

                                          


                                       <?php else: ?>

                                          <div class="d-flex mt-2 p-2">
                                             <span style="font-weight: bold;">Course Fees</span>
                                             <span>&nbsp;&nbsp;</span>

                                                <span><?php echo e($allcourse->fees); ?></span>
                                                <span class="currency" style="font-family: serif;">&#2547;</span>

                                          </div>

                                 <?php endif; ?>


                                 <?php else: ?>


                                    <div class="d-flex mt-2 p-2">

                                       <span style="font-weight: bold;">Course Fees</span>
                                       <span>&nbsp;&nbsp;</span>
                                       <span><?php echo e($allcourse->fees); ?></span>

                                       <span class="currency" style="font-family: serif;">&#2547;</span>

                                    </div>







                                 <?php endif; ?>


                                 <?php else: ?>

                                 <div class="d-flex mt-2 p-2">
                                    <span style="font-weight: bold;">Course Fees</span>
                                    <span>&nbsp;&nbsp;</span>
                                    <span><?php echo e($allcourse->fees); ?></span>

                                 <span class="currency" style="font-family: serif;">&#2547;</span>


                                 </div>


                                 <?php endif; ?>
                           


                           <div  class=" p-2 mt-2 mb-3">
                              <a href="<?php echo e(route('course.details',$allcourse->id)); ?>">
                                 <button role="button" class="btn btn-sm btn-success">
                                     <span class="spn" style="color: rgb(244, 239, 228);">Enroll Course</span>
                                 </button>

                              </a>

                           </div>



                        </div>

                     </div>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                  </div>

               </div>





         </div>





   </div>




<div class="row justify-content-center mt-5 p-0 m-0" style="vertical-align: middle;">

   <a class="btn" href="<?php echo e(route('find.course')); ?>" id="btn">All Course&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-alt-circle-right"></i></a>

</div>
</section>


               
               <section>
                  <div class="container-fluid pt-2" id="upcomingimage" style="background-image: url('images/MbMnRkd0h4gg8hcS8Azr.jpg');background-position: center;">


                        <div class="row justify-content-center pt-4">
                           <h4 class="text-center" style="color:aliceblue;font-weight:bold;">Upcoming Course</h4>

                        </div>

                           <div class="row justify-content-center pt-4">
                              <p class="text-center" style="color:aliceblue;">Course Will Start Soon</p>

                           </div>


                           <?php
                                 $upcoming=App\Models\Upcomingcourse::where('status','upcoming')->limit(3)->get()
                           ?>
                           <div class="row justify-content-center pt-2 pb-4">

                              <?php $__currentLoopData = $upcoming; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-md-3 p-3">
                                          <div class="card shadow h-100 bg-blue-lightest">
                                             <div class="header">


                                                <img src="<?php echo e(URL::to($upcomings->image)); ?>" style="width: 100%;height:auto;">

                                             </div>


                                             <div class="card-body  mt-4" id="upcoming">

                                                <h5 class="text-center pt-4 mb-2" style="font-weight: bold;color:#fff;"><?php echo e(ucwords($upcomings->name)); ?></h5>

                                             </div>

                                          </div>

                                 </div>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                           </div>




                           
                     </div>

                  </div>



               </section>


               

               <?php
                  $allclient=App\Models\Client::get();
               ?>

               <section>

                  <div class="container-fluid">
                     <div class="row justify-content-center mt-5 p-0 m-0">
                        <h4>Our Clients</h4>

                     </div>

                     <div class="row justify-content-center p-4">

                        <?php $__currentLoopData = $allclient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col col-xl-1 col-md-3 col-sm-3 p-2">

                           <p class="text-center">
                              <img  src="<?php echo e(URL::to($client->image)); ?>" width="60" height="60" alt="" style="border-radius: 50%;">

                           </p>




                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </div>





                     </div>

                  </div>




               </section>

               


                  

                  <?php
                     $totaluser=App\Models\User::where('status',1)->get();
                     $user=count($totaluser);

                     $totalcourse=App\Models\Course::where('active',1)->get();
                     $TotalCourse=count($totalcourse);

                     $totalTrainer=App\Models\User::where('status',3)->get();
                     $Trainer=count($totalTrainer);
                  ?>

                  <section id="seminar" class="counter">
                     <div class="overlaw py-5">

                     <div class="container">


                           <div class="row justify-content-center  pt-5 mt-4">

                              <div class="col-md-4 text-center">


                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-book-open" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th class="p-2">
                                          <h4  style="color:#FFFFFF;">Course's</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" ><?php echo e($TotalCourse); ?></h4>

                                       </th>
                                    </tr>

                                 </table>




                              </div>

                              <div class="col-md-4 text-center">

                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-graduation-cap" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="p-2" style="color:#FFFFFF;">Student's</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" ><?php echo e($user); ?></h4>

                                       </th>
                                    </tr>

                                 </table>
                              </div>

                              <div class="col-md-4 text-center">

                                 <table class="table-borderless">


                                    <tr>

                                       <th>
                                          <span><i class="fas fa-book-open" style="color: #FFFFFF;width:333px;font-size:50px;"></i></span>

                                       </th>


                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="p-2"  style="color:#FFFFFF;">Trainer</h4>

                                       </th>

                                    </tr>

                                    <tr>
                                       <th>
                                          <h4 class="counter-count" style="color:#c4c7ca;" ><?php echo e($Trainer); ?></h4>

                                       </th>
                                    </tr>

                                 </table>

                              </div>


                           </div>

                        </div>



                     </div>

                        

                        <?php
                           $seminar=App\Models\Upcomingcourse::where('status','seminar')->limit(3)->get()
                        ?>
                        <div class="container-fluid" id="overlaw2">

                           <div class="row justify-content-center pt-4">
                              <h4 class="text-center mt-4" style="color:aliceblue;font-weight:bold;">Seminers and Webiners</h4>

                           </div>


                           <div class="row justify-content-center p-4">



                              <?php $__currentLoopData = $seminar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-md-4 p-3">
                                       <div class="card shadow h-100 bg-blue-lightest" id="seminarCard">




                                       

                                          <?php
                                             $string = preg_replace('/\s+/', '', $upcomings->name);
                                              $course=str_split($string);
                                          ?>


                                           <div  class="row mt-4 p-4 m-4 text-center">
                                             <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                             <div align="center">

                                                <div class="card shadow  mb-1" style="background-color:#c4c7ca;width:30px; height:30px;">

                                                      <h5 class="text-center" style="color:#232425;"><?php echo e(ucwords($val)); ?></h5>

                                                </div>




                                             </div>


                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                           </div>


                                          <div class="card-body" id="cardbody">

                                             <h5 class="text-center mt-4" style="font-weight: bold;color:#fff;"><?php echo e(ucwords($upcomings->name)); ?></h5>

                                             <div  class="text-center mb-1 pt-4">

                                                <a  data-id="<?php echo e($upcomings->id); ?>" class="seminarDetails" id="btn3">Details&nbsp;&nbsp;<i class="fas fa-arrow-right" style="font-size:10px; "></i></a>
                                                

                                             </div>


                                             <div  class="showDate<?php echo e($upcomings->id); ?> text-center mt-4" style="display: none;">

                                                <div class=" mt-2">
                                                    <span style="font-weight: bold;color:#fff;">Seminar Date</span>

                                                    <span style="font-weight: bold;color:#fff;">&nbsp;&nbsp;:</span>



                                                       
                                                       <span class="currency" style="font-family: serif;color:#fff;"> <?php echo e(\Carbon\Carbon::parse($upcomings->date)->format('M d Y')); ?></span>



                                                 </div>



                                                 <div class="mt-2">


                                                       <span style="font-weight: bold;color:#fff;">Seminar Time</span>

                                                       <span style="font-weight: bold;color:#fff;">&nbsp;&nbsp;:</span>

                                                       <span class="currency" style="font-family: serif;color:#fff;"> <?php echo e($upcomings->time); ?></span>

                                                 </div>


                                                 <div class="mt-2">


                                                    <span style="font-weight: bold;color:#fff;">
                                                       <button  class="btn btn-sm btn-danger cancel" data-id="<?php echo e($upcomings->id); ?>">Cancel</button>

                                                    </span>

                                                    <span>&nbsp;&nbsp;</span>

                                                    <span style="font-weight: bold;color:#fff;">


                                                        <button class="btn btn-sm btn-primary joing" data-id="<?php echo e($upcomings->id); ?>">Join&nbsp;Seminar</button>

                                                     </span>

                                              </div>

                                             </div>



                                          </div>

                                       </div>

                              </div>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                           </div>

                           <div class="row justify-content-center pt-4 pb-5">
                               <a class="btn" href="<?php echo e(route('find.seminar')); ?>" id="btn2" >All&nbsp;Seminar &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-alt-circle-right"></i></a>

                          </div>
                        </div>

                        
                  </section>

  


    

        <section style="background: linear-gradient(#e5a80d, rgb(113, 151, 227));">

             <div class="container-fluid pt-2 pb-5  ">

               <h4 class="text-center pt-4 " style="font-weight: bold;color:#f5f8fb;">Our Success Story</h4>

               <div id="myCarousel" class="carousel slide pt-4" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#indicators" data-slide-to="0" class="active"></li>

                </ol>

                <?php
                    $allstory=App\Models\Story::get();
                ?>
                <div class="carousel-inner" role="listbox">
                  <?php $__currentLoopData = $allstory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <!-- Slide One - Set the background image for this slide in the line below -->
                    <div  class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">

                          <div class="row justify-content-center">
                            <div class="col-md-6">

                                <div class="card shadow pt-4" style="border-radius:17px;">

                                      <div class="row p-2">
                                       <div class="col-md-4 pt-2  row justify-content-center" id="Avatar">
                                           <img src="<?php echo e(URL::to($story->image)); ?>" alt="Avatar" class="avatar">

                                        </div>

                                       <div class="col-md-8">
                                            <p  style="font-family: sans-serif;">


                                               <?php
                                                   $length=Str::length($story->description);
                                               ?>

                                                 <?php if($length<=150): ?>


                                                 <span style="font-weight:bold;font-size:22px;">"</span>
                                                       <?php echo e($story->description); ?>

                                                       

                                                       <span style="font-weight:bold;font-size:22px;">"</span>

                                                  <?php else: ?>



                                                               <div style="display: block" id="hideDetails<?php echo e($story->id); ?>">


                                                                   <span style="font-weight:bold;font-size:22px;">"</span>
                                                                   <?php echo e(substr( $story->description, 0, random_int(40, 150))); ?>


                                                                   <a href="javascript:void(0);" data-id="<?php echo e($story->id); ?>" class="seemore" align="right">see&nbsp;more</a>



                                                               </div>


                                                           <div style="display: none" id="storyDetails<?php echo e($story->id); ?>">
                                                               <span style="font-weight:bold;font-size:22px;">"</span>
                                                               <?php echo e($story->description); ?>


                                                               
                                                               <span style="font-weight:bold;font-size:22px;">"</span>
                                                               <a href="javascript:void(0);" data-id="<?php echo e($story->id); ?>" class="hide" align="right">HideStory</a>

                                                           </div>






                                                 <?php endif; ?>

                                              <h5 class="p-4" align="right" style="font-weight: bold;"><?php echo e(ucwords($story->name)); ?></h5>
                                           </p>

                                       </div>

                                      </div>


                                </div>

                           </div>


                          </div>





                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Slide Two - Set the background image for this slide in the line below -->

                <!-- Slide Three - Set the background image for this slide in the line below -->

                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                   </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                   </a>
             </div>


                           



                 </div>

             </div>


        </section>


    


  <?php
      $company=App\Models\Company_settings::first();
  ?>

    

    <?php echo $__env->make('backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    


     


     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seminar Entry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="decline_confirm" >
            <div id="seminardata" class="p-4">





            ...
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

        </div>
      </div>
    </div>


  
  
  <script>
          $(function () {
              $(document).scroll(function () {
                  var $nav = $("#mainNavbar");
                  $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
              });
          });
      </script>






<script>
   $(document).ready(function ()
   {

       $(document).on('click','.seminarDetails',function()
           {


               var tr = $(this).attr('data-id');

               // $("#mydiv").css({display:""});
               $('.showDate'+tr).css({display:"block"});

           });


   });
</script>



<script>
   $(document).ready(function ()
   {

       $(document).on('click','.cancel',function()
           {


               var tr = $(this).attr('data-id');



               // $('.showDate'+tr).setAttribute("hidden");

               $('.showDate'+tr).css({display:"none"});



           });


   });
</script>


<script>
   function myFunction() {

       // var tr = $(this).attr('data-id');
       // alert(tr);
     var x = document.getElementById("showDate");
     if (x.style.display === "block") {
       x.style.display = "none";
     } else {
       x.style.display = "block";
     }
   }
   </script>


<script>
   // changePaymenttype('installment')

   function  changePaymenttype(type)
   {

       $(".paymenttype").hide();
       $("#"+type).show();



   }


</script>


<script>
   // changePaymenttype('installment')

   function  changePaymenttype(type)
   {

       $(".paymenttype").hide();
       $("#"+type).show();



   }


</script>

<script>
   $(document).ready(function ()
   {

       $(document).on('click','.joing',function()
           {


               var id = $(this).attr('data-id');

               // $('.showDate'+tr).css({display:"none"});
               event.preventDefault();
               jQuery.noConflict();

               $.ajax({

                type:"get",
                 url:"/SeminarAdd/"+id,

                     success: function(response)
                      {

                       $('#exampleModal').modal('show');
                       $('#seminardata').html(response.html);


                      }
              });




           });


   });
</script>


<script>
   $('#decline_confirm').on('submit',function(e){



        e.preventDefault();

       $.ajaxSetup({
           headers:
           {
               'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
           }
       });
       $.ajax({
           url : "<?php echo e(route('SeminarEntry')); ?>",
           type : "post",
           data:$('#decline_confirm').serialize(),

           success:function(results)
           {


              $('#exampleModal').modal('hide');
              location.reload();



           }

       })
   });
</script>


<script>

    // Counter To Count Number Visit
var a = 0;
$(window).scroll(function() {

  var oTop = $('.counter').offset().top - window.innerHeight;

  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-count').each(function() {
        var $this = $(this);
        jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 2000,
            easing: 'swing',
            step: function () {
                $this.text(Math.ceil(this.Counter));
            }
        });
    });
    a = 1;
  }
});
</script>




<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.seemore',function()
            {


                var tr = $(this).attr('data-id');

                $('#storyDetails'+tr).css({display:"block"});
                $('#hideDetails'+tr).css({display:"none"});
                // $('#Avatar').css({top:"100px"});

            });


    });
 </script>

<script>
    $(document).ready(function (e)
    {

        $(document).on('click','.hide',function()
            {


                var tr = $(this).attr('data-id');
                $('#hideDetails'+tr).css({display:"block"});
                $('#storyDetails'+tr).css({display:"none"});
                // $('#Avatar').css({top:"0px"});


            });


    });
 </script>


<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH D:\laragon\www\rajit_project\RajItSchool\resources\views/backend/Dashboard/landingPage.blade.php ENDPATH**/ ?>