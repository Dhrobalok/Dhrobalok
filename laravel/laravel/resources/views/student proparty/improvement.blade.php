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



   @media screen and (min-width: 601px) {

      p.p
         {
            font-style: oblique;
         
           margin-left: 100px;
            color: red;
         
           
         }
     }


              @media screen and (max-width: 600px) {

        p.p
         {
            font-style: oblique;
         
            margin-left: 100px;
            color: red;
         
           
         }
     }
         @media screen and (min-width: 601px) {

      p.c
         {
            font-style: oblique;
         
           margin-left: 100px;
            color: red;
         
           
         }
     }


              @media screen and (max-width: 600px) {

        p.c
         {
            font-style: oblique;
         
            margin-left: 100px;
            color: red;
         
           
         }
     }



  
              .table-responsive
         {

            margin-top:22px; 
            border-radius: 25px;
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

         img.im1

         {

        
   
    height: 30px;
    -moz-border-radius:85px;
    -webkit-border-radius: 75px;
    width: 30px;
 

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

                      <p class="p" style="color: black;margin-left: 340px;"> Pabna University Of Science & Technology</p>

                     <p class="c"style="color: red;margin-left: 320px;">Department Of Computer Science & Engineering</p>
                    
                  </div>

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-bottom: 45px;"><b style="width:134px; height: 100px; margin-left: 345px;">

                           
                        
                     </div>  

                     <br><br>

                            @if(Session::has("aa"))

                         <div class="alert alert-success">
                             <b style="margin-left: 220px;">Improvement Semester is not match with result semester!</b>

                         </div>

                        @endif   

                              @if(Session::has("alert"))

                         <div class="alert alert-success">
                             <marquee> Result Is Not Publish Yet</marquee>

                         </div>

                        @endif

                       @if(Session::has("ss"))

                         <div class="alert alert-success">
                             <marquee>Application Time Expaired</marquee>

                         </div>

                        @endif
                      
                      <form action="{{url('/improve')}}">
                          {{ csrf_field() }}
                      <div class="se1">

                      
                      
                        <label>Session</label>
                         <select name="session" class="form-control" required="">
                              @foreach($r as $s)
                           <option>{{$s->session}}</option>

                             @endforeach

                         </select>
                           
                      

                    
                        
                        <label>Roll</label>
                        <input type="text" name="roll" class="form-control" required="" placeholder="Enter Roll">

                          <p style="font-style: oblique;color: red;">@ please select semester those subject will given you improve @ </p>

                        <label>Semester</label>

                   
                  <select name="semester" class="form-control" required="">
                    <option>1st</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                    <option>6th</option>
                    <option>7th</option>
                    <option>8th</option>

                  </select>
                        

                        <button class="btn btn-primary">submit</button>
                      </div>


<br><br>

         
                     </form>


                     <div class="footer">
                       
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










