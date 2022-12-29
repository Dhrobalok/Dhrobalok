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


<style type="text/css">
    
    




/*loader**/


.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}


 Safari 
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(30deg); }
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(30deg); }
}




/*  teacher */



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


     .head
         {

            margin-top: 29px;
            background-color: rgba(201, 76, 76, 0.3);
            border-radius: 9px;
            height: 100%;


         }

         .head1
         {
            width: 100%;
            width: 100%;
           position: absolute;
           top:65px;
         }

      
         

         .table-responsive
         {
           margin-top:80px; 
         }

               th
         {
          background-color:rgb(134, 121, 121);

         }

</style>

   
   
   
</head>
<body >



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
                    <i class="fa fa-bell fa-fw"></i> Notification<span class="base">
                      
                  
                    </span>
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
                    <i class="fa fa-user fa-fw"></i> Supar Admin <b class="caret"></b>
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
                            <input type="text" class="form-control" placeholder="Search...">
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
                        <a href="#"><i class="fa fa-address-book"></i> Teacher Manage<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li>
                                <a href="{{URL::to('/teachershow2')}}">AllTeacher</a>
                            </li>

                                <li>
                                <a href="{{URL::to('/coursealocate')}}">Course Alocate To teacher</a>
                            </li>

                            

                            <li>
                                <a href="{{URL::to('/ImproveTeacher')}}">ImproveCourseTeacher</a>
                            </li>


                   
                            

                        </ul>
                    </li>

                          <li>
                                <a href="{{URL::to('/suapradminaprove')}}">adminselect</a>
                            </li>
               
                     <li>
                        <a href="#"><i class="fa fa-address-book"></i> Student Manage<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                                 <li>
                                <a href="{{URL::to('/studentshow')}}">All Student</a>
                            </li>

                                 <li>
                                <a href="{{URL::to('/seeresult2')}}">See Result</a>
                            </li>

                              <li>
                                <a href="{{URL::to('/improveconfarm')}}">ImproveApply</a>
                            </li>

                              <li>
                                <a href="{{URL::to('#')}}">RegularApply</a>
                            </li>

                        </ul>
                    </li>


                              <li>
                                <a href="{{URL::to('/suapradminaprove')}}"><i class="fa fa-address-book"></i>adminselect</a>
                            </li>
               
          
                   

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Notice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          

                            <li>
                                <a href="{{URL::to('#')}}">Result Notice</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/editor')}}">Advice Notice</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/classroutine')}}">class Routine </a>
                            </li>


                              <li>
                                <a href="{{URL::to('/#')}}">Seat Plane </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/allnotice')}}">All Notice</a>
                            </li>

                        
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
                      
                </div>
            </div>

            <!---content write-->
          
         



                        <div class="head">
                            <h4 style="margin-left: 345px;">Pabna University of Science & Technology</h4>

                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px;"><b style="width:134px; height: 100px; margin-left: 345px;">
                      


                    
                          
                          
                      </div>
                      <p class="c" style="margin-left: 345px;">Department Of Computer Science & Engineering</p>

                 
                         
                      
                   
                           


   <div class="table-responsive" style="text-align: center;">  

              
                      <p style="font-style: oblique; color: red; font-size: 22px;">  Improve Students</p>
           
                 <form action="{{url('/improveconfarm2')}}" method="POST" >
                    {{ csrf_field() }}

                      
                 



                                       

                       
                         <select name="session" class="form-control" placeholder="Search Session..." required=""  style="width: 320px;margin-left: 340px;">
                             @foreach($r as $s)
                          
                           <option>{{$s->session}}</option>

                              @endforeach 

                         </select>
                         


                    <select name="semester" class="form-control" required="" style="width: 320px;margin-left: 340px;" >
                      <option>Enter semester</option>
                    <option>1st</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                    <option>6th</option>
                    <option>7th</option>
                    <option>8th</option>

                  </select>
                                
                                    
                                   <br>    <br> 

                       
                     <button class="btn btn-primary">
                                              <i class="fa fa-search"></i>
                                              Search
                                        </button>  
                                
                             

                                     
                            
                        </div>



                         </div>


                         
  
                </form>


                  
                 


                 
           


                <br><br>
                   <br>
                                        <br>

                                        <br><br>
                   <br>
                                        <br>
                  

                    
               
            </div>

     </div>



    

   <!---content write-->



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
