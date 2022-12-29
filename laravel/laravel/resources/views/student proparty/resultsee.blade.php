<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-vivid.css">

<!-- table  -->


<style type="text/css">
  
              .w3-light-grey
         {

            margin-top:22px; 
            border-radius: 25px;
            width: 105%;
        

         }
  

         .head1
         {
            width: 100%;
           position: absolute;
           top:120px;
          margin-bottom: 50px;


          
         }

         p.c
         {
            font-style: oblique;
            height: 10px;
            margin-left: 380px;
            color: red;
       
  
 
           
         }


         p.p
         {
            font-style: oblique;
           
            margin-left: 360px;
            color: black gray;
            font-size: 20px;
           
         }

         .se1
         {
           margin-left: 320px;
           width: 460px;
           height: 270px;
           margin-top: 50px;
         }
         button
         {
          margin-top: 20px;
         }

         #img2

         {

            margin-left: 20px;

         }

                  img.im1

         {

        
   
            height: 30px;
          -moz-border-radius:85px;
           -webkit-border-radius: 75px;
           width: 30px;
 

         }

         .table
         {
         	margin-left: 124px;
         	margin-top: 6px;

         }

         #table
         {
          /*
          margin-left: 110px;
          margin-top: 36px;
         */ 

         }
        

         #table2
         {
          margin-left: 110px;
          margin-top: 60px;

         }

          #dotted2
           {
          border:0;
         border-bottom: 2px dotted;
         color: 
          }
          #alert
          {
            width: 320px;
            height: 50px;
            margin-left:350px; 
          }
                #alert2
          {
            width: 320px;
            height: 50px;
            margin-left:370px; 
            margin-top: 20px;
          }
           #alert3
          {
            
            margin-left:790px; 
           
          }

          /*  */
.Banner
{
  background-position: center;
  background-size: cover;
 
}



</style>


</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <div class="Banner">
      <div class="container-fluid">
        <div class="row">
          <div class="col 12 p o">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> Student <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                  
                    <li class="divider"></li>
                    <li><a href="{{URL::to('/')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                          <input type="text" class="" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                       <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-address-book"></i> Student Manage<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">



                          

                        
                            

                             <li>
                                <a href="{{URL::to('/studentattend')}}"><b style="max-height: 500px;font-size: 15px;">See Attendence</b></a>
                            </li>

                              <li>
                                <a href="{{URL::to('/examregistr')}}"><b style="max-height: 500px;font-size: 15px;">Apply exam Registration </b></a>
                            </li>

                                <li>
                                <a href="{{URL::to('/seeresult')}}"><b style="max-height: 500px;font-size: 15px;">See Result</b> </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/classtest')}}"><b style="max-height: 500px;font-size: 15px;">Class Test Result</b> </a>
                            </li>

                            <li>
                            <a href="{{URL::to('/improvement')}}"><b style="max-height: 500px;font-size: 15px;">Improvement</b> </a>
                            </li>
                            

                                  <li>
                                <a href="{{URL::to('/classtest')}}"><b style="max-height: 500px;font-size: 15px;">Class Test Result </a>
                            </li>
                            

                        </ul>
                    </li>

                 
              
                   
                  
                          <li>
                      <a href="#"><i class="fa fa-sitemap fa-fw"></i> Notice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{URL::to('/notice')}}">
                                  <b style="max-height: 500px;font-size: 15px;">Notice All</b></a>
                            </li>
                            

                        </ul>
                    </li>


                </ul>

            </div>
        </div>
    </nav>

    </div>
        </div>
    </div>

</div>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
           

     </div>
            </div>
            <!-- ... content goes here ... -->

             
               
  
     
                 <div class="w3-light-grey">

                         <div class="table-responsive"> 
                          
                             <div class="Banner">
                              <div class="container-fluid">
                               <div class="row">
                                 <div class="col 12 p o">

                      <p class="p" > Pabna University Of Science & Technology</p>

                      <p class="c">Department Of Computer Science & Engineering</p>
                    
                                    </div>
                                       </div>
                                          </div>
                                             </div>

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-bottom: 45px;">


                           <form action="{{url('/resultdownload')}}">
                                {{ csrf_field() }}

                                @foreach($f as $g)
                                <input type="hidden" name="roll" value="{{$g->roll}}">
                                 <input type="hidden" name="semester" value="{{$g->semester}}">
                                    <input type="hidden" name="session" value="{{$g->session}}">
                                @endforeach
                                <button class="btn btn-primary" style="margin-left: 900px;position: absolute;top:2px; "><i class="fa fa-download" aria-hidden="true"></i>&nbspDownload</button>
                             
                           </form>                        
                       </button>
                            </a>
                         
                       
                        
                     </div> 

              
                         
                      <div class="img2">
                       
                         <table class="table" id="">

                           @foreach($w as $v)
                           
                           <img src="{{ asset('uploads/pic/' . $v->image) }}" style="height: 70px;width: 70px; margin-left:720px; margin-top: 70px;">



                              <div class=" alert alert-success" id="alert">
                             <b style="margin-left: 40px;"> Student Information</b>

                         </div>
                           <tr>
                            <th class="name">Student Name: </th>

                       
                           <th>{{$v->name}}</th>
                           </tr>
                           <tr>
                            <th>Session: </th>
                           
                          
                           <th>{{$v->session}}</th>
                           </tr>
                             <tr> 
                            <th>Student Roll</th>
                           <th>{{$v->roll}}</th>
                           </tr> 

                            <th>Exam Status:</th>
                           <th>Regular</th>
                           </tr> 

                              <th>Comments:</th>
                           <th>Pass</th>
                           </tr> 
                          
                           
                           
                     

                           @endforeach
                                 </table>
                   
                         @if(Session::has("ss"))

                         <div class="alert alert-success">
                             <marquee>You Have one week time for improve apply </marquee>

                         </div>

                        @endif

            @foreach($z as $b)
                 <div class=" alert alert-success" id="alert2">
             <b id="alert3"style="margin-left: 40px;"> {{$b->semester}} Semester Result</b>

            </div>   
            @endforeach



<table class="table" id="">
        
	<tr>
		<th>CourseName</th>

		<th>Grade</th>
    

	</tr>
<?php
$sum1=0;
$sum2=0;
$sum3=0;
$sum4=0;
$sum5=0;
$sum6=0;
$sum7=0;
$sum8=0;
$sum9=0;
$sum10=0;
$credit1=0;
$credit2=0;
$credit3=0;
$credit4=0;
$credit5=0;
$credit6=0;
$credit7=0;
$credit8=0;
$credit9=0;
$credit10=0;
$credit=0;
$tcredit=0;

foreach ($r as $key => $value)
 {
   echo "<tr>";
   echo "<th style=color:black;>";
 	echo $value->course;
 	echo "</th>";
 	
	$r=$value->mark+$value->ca+$value->besttwo;
	$credit=$value->credit+$credit;


      if ($r>=80)
       {
         $c=$value->credit;
  
       	 $i=4*$value->credit;
       	 $sum1=$sum1+$i;

       	echo "<th>";
      	echo "A+";
      	echo "</th>";
          $c=$value->credit;
        $credit1=$credit1+$c;
       }
       
      elseif ($r>=75 && $r<80) 
      {
      		 $j=3.75*$value->credit;
      	 echo "<th>";	 
      	echo "A";
      	echo "</th>";
      	echo "<br>";
      	$sum2=$sum2+$j;
        $c=$value->credit;
        $credit2=$credit2+$c;
    
    

      }


         elseif ($r>=70 && $r<75) 
      {
      		 $k=3.50*$value->credit;
        echo "<th>";
      	echo "A-";
      	echo "</th>";
      	$sum3=$sum3+$k;
        $c=$value->credit;
        $credit3=$credit3+$c;
      	# code...
      }
         elseif ($r>=65 && $r<70) 
      {
      		 $l=3.25*$value->credit;
        echo "<th>";
      	echo "B+";
      	echo "</th>";
      	$sum4=$sum4+$l;
        $c=$value->credit;
        $credit4=$credit4+$c;
      	# code...
      }
         elseif ($r>=60 && $r<65) 
      {
      			 $m=3.00*$value->credit;
          echo "<th>";  			 
      	echo "B";
      		echo "</th>";
      	 	$sum5=$sum5+$m;
          $c=$value->credit;
          $credit5=$credit5+$c;
      	# code...
      }
         elseif ($r>=55 && $r<60) 
      {
      	$n=2.75*$value->credit;
      	echo "<th>"; 
      	echo "B-";
      	echo "</th>";
      	$sum6=$sum6+$n;
           $c=$value->credit;
         $credit6=$credit6+$c;
      	# code...
      }

       elseif ($r>=50 && $r<55) 
      {
      	 	$o=2.50*$value->credit;
          	echo "<th>";
      	  echo "C+";
      	  echo "</th>";
      	  echo "<br>";
      	  $sum7=$sum7+$o;
          $c=$value->credit;
           $credit7=$credit7+$c;
      	
      	  
      
      }

 

          elseif ($r>=45 && $r<50) 
      {
      		$p=2.25*$value->credit;
      		echo "<th>";
      	echo "C";
      	  echo "</th>";
      	 $sum8=$sum8+$p;
         
          $c=$value->credit;
         $credit8=$credit8+$c;
      	
      }

         elseif ($r>=40 && $r<45) 
      {
      		$q=2.00*$value->credit;
      		echo "<th>";
      	echo "D";
      	 echo "</th>";
      	$sum9=$sum9+$q;
        $c=$value->credit;
       $credit9=$credit9+$c;
      }

      else
      {

      	$r=0.00*$value->credit;
      	echo "<th>";
        echo "F" ;
        echo "</th>";
        $sum10=$sum10+$r;
      }


}
?>

</tr>

<th>
<?php
   $tcredit=$credit1+$credit2+$credit3+$credit4+$credit5+$credit6+$credit7+$credit8+$credit9;
 
?>
 
 <td>
  <br>
  <b style="float: left;">Earnd Credit:
<?php
 
 echo $tcredit;
?>
</b>
</td>
</th>


<th>
<?php
 $total=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10;
 
?>
 
 <td>
  <br>
  <b style="margin-left:10px;">GPA:
<?php

 if ($total==0) 
 {
   echo 0;
 }


 else
 {
   $t=($total/$credit);
 echo round($t,2);

}
?>
</b>
</td>
</th>
</tr>
</table>

  </div>




                     <div class="footer">
                     	<p>Chairman Sig:</p>
                      @foreach($x as $r)
                        <img src="{{ asset('uploads/pic/' . $r->image) }}" style="height: 
                        60px;width: 180px;">
                      @endforeach
                       
                       <marquee>&copy; Computer Science & Engineering  2020 &nbsp<img src="images/download.png" class="im1"></marquee>

                     </div>

                    
            </div>



                  </div>



 </div>
             
           
<!--page content-->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>












