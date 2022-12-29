<?php $__env->startSection('content'); ?>

<style>


    #form1
           {

        display:none;

            }

     img
      {
        width: 80px;
        height: 70px;
        background: #fff;
        border-radius: 10px;
      }
      .img3
      {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 10px;

      }
      #card
      {
        background: #00c6ff;
        width: 97%;
      }

      .statistic-section {
     padding-top: 70px;
     padding-bottom: 70px;
     background: #00c6ff;  /* fallback for old browsers */
     background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
     background: linear-gradient(to right, #0072ff, #00c6ff);
}

.count-title {
    font-size: 50px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
	  text-align: center;
	  font-weight: bold;
    color: #fff;
}

.stats-text {
    font-size: 15px;
    font-weight: normal;
    margin-top: 15px;
    margin-bottom: 0;
    text-align: center;
	  color: #fff;
	  text-transform: uppercase;
	  font-weight: bold;
}

.stats-line-black {
	margin: 12px auto 0;
    width: 55px;
    height: 2px;
    background-color: #fff;
}
.stats-icon {
	  font-size: 35px;
	  margin: 0 auto;
    float: none;
    display: table;
    color: #fff;
}

@media (max-width: 992px) {
	.counter {
		margin-bottom: 40px;
	}
}
</style>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-light alert-dismissible fade show shadom-lg" role="alert">
                <div class="row p-0 m-0">
                    <div class="col-md-1">
                        <div class="f-roboto text-green text-center">
                            <img class="img3" src="<?php echo e(asset('images/excavator-construction-logo-with-buildings_23-2148657768.webp')); ?>" alt="">


                        </div>


                    </div>

                    <div class="col-md-10 pt-4">

                        <div class="f-roboto text-green text-center p-0 m-0">
                            <p class="h4" style="display:inline-block;color:#1dbf73;">Welcome&nbsp;To&nbsp;Builders&nbsp;Community</p>

                        </div>


                   </div>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>


      <?php
          $alluser=App\Models\User::Where('status',1)->get();
          $userall=count($alluser);
          $companystatus=Session::get('companystatus');
          $id=Session::get('id');
          $status=Session::get('status');
      ?>
      <?php
          $apart=App\Models\Project::get();
          $totalApt=count($apart);
          $land=App\Models\Land::get();
          $totalLand=count($land);
          $brick=App\Models\Brick::get();
          $totalBrick=count($brick);

          $Total=$totalApt+$totalLand+$totalBrick;

          $totalrewal=App\Models\Payslip::where('status',0)->get();
          $totalfee=count($totalrewal);

          $totaluser=App\Models\User::where('status',0)->get();
          $totalReg=count($totaluser);

      ?>
      <?php if($status==2): ?>

      <section id="statistic" class="statistic-section one-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon "></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($userall); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Users</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-laptop fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($Total); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Project</p>
                    </div>
                </div>


                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-credit-card fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($totalfee); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Renewal Request</p>
                    </div>
                </div>


                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($totalReg); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">New Register</p>
                    </div>
                </div>


            </div>
        </div>
    </section>


     <?php else: ?>
      <?php if($companystatus=='Apartment'): ?>
        <?php
              $allproject=App\Models\Project::where('employeeid', $id)->get();
              $all=count($allproject);
        ?>

       <?php elseif($companystatus=='Brick'): ?>

           <?php

              $allproject=App\Models\Brick::where('employee_id', $id)->get();
              $all=count($allproject);
           ?>

      <?php elseif($companystatus=='Land'): ?>

           <?php

           $allproject=App\Models\Land::where('employeeid', $id)->get();
           $all=count($allproject);
          ?>

      <?php elseif($companystatus=='Cement'): ?>

           <?php

            $allproject=App\Models\Cement::where('employee_id', $id)->get();
            $all=count($allproject);
          ?>

     <?php elseif($companystatus=='Steel'): ?>

        <?php

         $allproject=App\Models\Steel::where('employee_id', $id)->get();
         $all=count($allproject);
       ?>

    <?php elseif($companystatus=='Tiles'): ?>

        <?php

        $allproject=App\Models\Tile::where('employee_id', $id)->get();
        $all=count($allproject);
       ?>


    <?php elseif($companystatus=='Door'): ?>

     <?php

       $allproject=App\Models\Door::where('employee_id', $id)->get();
       $all=count($allproject);
     ?>


    <?php elseif($companystatus=='Sanitary'): ?>

       <?php

        $allproject=App\Models\Sanitar::where('employee_id', $id)->get();
        $all=count($allproject);
      ?>


<?php elseif($companystatus=='Feetings'): ?>

<?php

 $allproject=App\Models\Fiting::where('employee_id', $id)->get();
 $all=count($allproject);
?>


<?php elseif($companystatus=='Sand'): ?>

<?php

 $allproject=App\Models\Sand::where('employee_id', $id)->get();
 $all=count($allproject);
?>

<?php elseif($companystatus=='Hardware'): ?>

<?php

 $allproject=App\Models\Hardwar::where('employee_id', $id)->get();
 $all=count($allproject);
?>

<?php elseif($companystatus=='Electric'): ?>

<?php

 $allproject=App\Models\Electric::where('employee_id', $id)->get();
 $all=count($allproject);
?>


<?php elseif($companystatus=='Paint'): ?>

<?php

 $allproject=App\Models\Paint::where('employee_id', $id)->get();
 $all=count($allproject);
?>

<?php elseif($companystatus=='Architect'): ?>

<?php

 $allproject=App\Models\Architect::where('employee_id', $id)->get();
 $all=count($allproject);
?>

<?php elseif($companystatus=='Interior'): ?>

<?php

 $allproject=App\Models\Interior::where('employee_id', $id)->get();
 $all=count($allproject);
?>





    <?php endif; ?>

      <section id="statistic" class="statistic-section one-page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fas fa-users fa-2x stats-icon "></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($userall); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Users</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <div class="counter">
                        <i class="fa fa-laptop fa-2x stats-icon"></i>
                        <h4 class="timer count-title count-number"><span class="counter font-size-h1" ><?php echo e($all); ?></span></h4>
                        <div class="stats-line-black"></div>
                        <p class="stats-text">Total Project</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

      <?php endif; ?>




        <!--  fmjdfndfkdb -->


            </div>
        </div>
    </div>
</div>


<script>

    $('.counter').counterUp({
delay: 10,
time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');

</script>

<?php $__env->stopSection(); ?>




<?php $__env->startPush('js'); ?>






<?php $__env->stopPush(); ?>
















<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/dashboard.blade.php ENDPATH**/ ?>