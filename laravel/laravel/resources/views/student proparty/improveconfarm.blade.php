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

<style type="text/css">
  
              .table-responsive
         {

            margin-top:22px; 
            border-radius: 25px;

          width: 110%;
           background-color: #d5f4e6;

         }
  

         .head1
         {
            width: 100%;
           position: absolute;
           top:120px;
          margin-bottom: 50px;

          
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

         .im2

         {

            float: right;

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
         	margin-top: 26px;

         }
         .name
         {
         	margin-left: 150px;
         }
               .session
         {
         	margin-left: 150px;
         }
                  .roll
         {
         	margin-left: 150px;
         }

          .status
         {
         	margin-left: 230px;
         }

          #dotted2 {
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


 #alert1
          {
            width: 420px;
            height: 60px;
            margin-left:230px; 
          }
                #alert2
          {
            width: 450px;
            height: 70px;
            margin-left:250px; 
            margin-top: 50px;
          }
           #alert3
          {
            
            margin-left:790px; 
           
          }
          #tt
          {
            margin-left: 140px;
          }






   @media screen and (min-width: 601px) {

      h3.p
         {
            font-style: oblique;
         
           margin-left: 320px;
            color: black;
         
           
         }
     }


              @media screen and (max-width: 600px) {

        h3.p
         {
            font-style: oblique;
         
            margin-left: 320px;
            color: black;
         
           
         }
     }
         @media screen and (min-width: 601px) {

      p.c
         {
            font-style: oblique;
         
           margin-left: 350px;
            color: red;
         
           
         }
     }


              @media screen and (max-width: 600px) {

        p.c
         {
            font-style: oblique;
         
            margin-left: 350px;
            color: red;
         
           
         }
     }



  


</style>


</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
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
                            
                        

                            

                        </ul>
                    </li>

                 
            
                   

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Notice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                         
                            

                        </ul>
                    </li>


                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
            </div>

            <!-- ... content goes here ... -->

               
               
  
     
                 <div class="table-responsive">


                  <div>

                      <h3 class="p"> Pabna University Of Science & Technology</h3>

                      <p class="c">Department Of Computer Science & Engineering</p>
                    
                  </div>

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-bottom: 45px;"><b style="width:60px; height: 60px; margin-left: 345px;">

                     
                       </button>
                            </a>
                         
                       
                        
                     </div> 
                           
                      
                    <form action="{{url('/improve2')}}">
       {{ csrf_field() }}
                         

                   

                      
              
                       <div class="img2">
                       
                         <table class="table table-striped" id="table">

                           @foreach($w as $v)
                           
                           <img src="{{ asset('uploads/pic/' . $v->image) }}" style="height: 70px;width: 70px; margin-left:820px;">



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
                            
                            <tr>
                            <th>Exam Status:</th>
                           <th>Improve

                            <div class="inputfield">                        
                        <input type="checkbox"  name="examname" value="improve"class="input-checkbox" id="checkbox1" required="">
                        <label for="checkbox1" class="input-label"></label>
                         </div>
                         
                         
                          </th>
                           </tr> 

                            
                          
                           
                           
                     

                           @endforeach
                                 </table>
                     </div>
                    

                         @if(Session::has("alert"))

                         <div class="alert alert-success">
                             <b> Have Some Problem Try Again!</b>

                         </div>

                        @endif

                         @if(Session::has("ra"))

                         <div class="alert alert-success">
                             <b> Your improve application year Expaired !</b>

                         </div>

                        @endif

                         @if(Session::has("alert2"))

                         <div class="alert alert-success" style="text-align: center;">
                             <b> Any Two Course Will be approve ! You Choose More Than two!</b>

                         </div>

                        @endif



 <div class="alert alert-success" id="alert2">
           <b style="margin-left: 12px;">Maximum Two Subject Will be Given Improve!
           &nbsp&nbspwithout fail 
                   &nbsp&nbsp &nbsp&nbsp  </b></div>

<table class="table table-striped" class="tt" style="margin-left: 112px; text-align: center;">

		
<?php

  
foreach ($r as $key => $value)
 {
  
 	
	$r=$value->mark+$value->ca+$value->besttwo;
  


         


        if ($r>=40 && $r<60) 
      {
      
           
            echo"<tr>";
            echo "<th>";
          

        echo"<input style=margin-left:145px; type=hidden name=session value='$value->session'>";
       
        echo"<input style='margin-left:145px;' type=hidden name=roll value=$value->roll>";
         echo"<input style='margin-left:145px;' type=hidden name=semester value=$value->semester>";

           echo"<input style='margin-left:145px;' type=hidden name=mark value= '$r' >";

        
        echo"<input style='margin-left:145px;' type=checkbox name=course[] value='$value->course' >";
      
        
   echo $value->course;
   echo "</th>";
  echo "</tr>";

          
 
  
      }

      if ($r<40) 
        
      {

                echo"<tr>";
                 echo"<br>";
                  echo"<br>";
            
                  echo "<th>";

                   echo"<input style='margin-left:145px;' type='checkbox' name=fcourse[] value='$value->course' input=input-checkbox id=checkbox1  >";
                   echo "<label for=checkbox1 class=input-label></label>";
              /*echo"<input style='margin-left:145px;' type=hidden name=mark2 value='$r'>";*/
        
           echo $value->course;
 
                echo "</th>";
            echo "</tr>";


      }

      




}

?>

<tr>
  <th>
<button class="btn btn-primary" style="margin-left:40px; height: 40px; width: 620px;" >submit</button>

</th>
 </tr>
</form>

</table>




               
                   
                      <div> 
                       <marquee>&copy; Computer Science & Engineering  2020 &nbsp<img src="images/download.png" class="im1"></marquee>

                     </div>

                    
            </div>



                  </div>

             
             

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












