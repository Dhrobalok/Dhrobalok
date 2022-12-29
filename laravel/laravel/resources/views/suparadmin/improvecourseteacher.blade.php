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
    
    

   @import url('https://fonts.googleapis.com/css?family=Abel');



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
     .head
         {

            margin-top: 29px;
            background-color: rgba(201, 76, 76, 0.3);
            border-radius: 9px;


         }

         .head1
         {
            width: 100%;
            width: 100%;
           position: absolute;
           top:65px;
         }

         p.c
         {
            font-style: oblique;
            height: 40px;
            margin-left: 340px;
            color: red;
            font-size: 15px;
           
         }

         .table-responsive
         {
           margin-top:30px; 
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
                    <i class="fa fa-user fa-fw"></i> Supar Admin <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                  
                    <li class="divider"></li>
                    <li><a href="{{URL::to('/Logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <h3 style="margin-left: 320px;font-style: oblique;">Pabna University of Science & Technology</h3>

                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px;"><b style="width:134px; height: 100px; margin-left: 345px;">
                      


                    
                          
                          
                      </div>
                      <p class="c">Department Of Computer Science & Engineering</p>

                 
                         
                      
                   
                           


   <div class="table-responsive">  

              
                      <p style="font-style: oblique; color: red; font-size: 12px; margin-left: 420px;">@ Improve Course Teacher @</p>
                <table class="table table-bordered" id="dynamic_field">  
                 <form action="{{url('/improves')}}">
                    {{ csrf_field() }}

                          <div class="navbar-default sidebar" role="navigation" style="position: absolute;top:25px; margin-top: 228px; margin-left: 376px;">
                          <div class="sidebar-nav navbar-collapse">

              
                        
                                        
                     
                         <select name="session" class="form-control" placeholder="Search Session..." required="">
                            @foreach($r as $s)
                           <option>{{$s->session}}</option>

                           
                            @endforeach
                         </select>

                       </div>
                              <select name="semester" class="form-control" placeholder="Search semester..." required="">
                            
                           <option>1st</option>
                             <option>2nd</option>
                             <option>3rd</option>
                             <option>4th</option>
                             <option>5th</option>
                             <option>6th</option>
                             <option>7th</option>
                             <option>8th</option>
                           
                           
                         </select>
                             
                                <span class="input-group-btn">
                                    
                                        <button class="btn btn-primary">
                                              <i class="fa fa-search"></i>
                                              Search
                                        </button>
                                
                                </span>



                                     
                            
                        


                         </div>

                        
                </form>



                 
                </table> 


                <br><br>
                <br><br>
                <br><br>
                <br><br>

        <!--  improve course teacher goes here -->
                <table class="table table-bordered" id="dynamic_field">  
                
                     

                                            
                            
                        </div>
       

                         </div>


               


                <thead>
                  

<tr>
    <th style="width:5%;text-align: center">Session</th>
    <th style="width:5%;text-align: center">Semester</th>
    <th style="width:5%;text-align: center">ImproveCourse</th>
    <th style="width:5%;text-align: center">StudentNumber</th>
    <th style="width:5%;text-align: center">TeacherAlocation</th>
     <th style="width:5%;text-align: center">Examname</th>
      <th style="width:5%;text-align: center">Action</th>

        
</tr>
</thead>
 <form class="login100-form validate-form" action="{{url('/improveteacher2')}}">
                    {{ csrf_field() }}

            @foreach($re as $t)        

<tbody>

    <tr>
        <th style="width:5%;text-align: center">{{$t->session}}<input type="hidden" name="session" value="{{$t->session}}" class="form-control"></th>
        <th style="width:5%;text-align: center">{{$t->semester}}  <input type="hidden" name="semester" value="{{$t->semester}}"class="form-control"></th>
       
           <th style="width:5%;text-align: center"><select name="course" class="form-control"><option>{{$t->course}}</option><option>@foreach($g as $a){{$a->course}}@endforeach</option></select></th>
            <th style="width:5%;text-align: center">{{$j}}</th>
         

       <th style="width:5%;text-align: center"><select name="name" class="form-control">@foreach($n as $e)<option value="{{$e->t_id}}">{{$e->name}}</option>@endforeach</select></th>    
                <th style="width:5%;text-align: center">{{$t->examname}}</th>


      <th><input name="myRadio" type="Checkbox" value="1" onchange="this.form.submit()"/></th>

     
        
    </tr>

</tbody>
   @endforeach
  

                 
                </table> 


</form>

  <!--  improve course teacher goes here -->


  
               
            </div>

     </div>



    <br><br>

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
