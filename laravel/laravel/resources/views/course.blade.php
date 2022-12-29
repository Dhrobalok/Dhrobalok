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
            width: 105%;
              background-color: #d5f4e6;
        

         }
  

         .head1
         {
            width: 100%;
           position: absolute;
           top:96px;
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
          margin-left: 10px;
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
    position: absolute;
 
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
                    <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
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
                                <a href="{{URL::to('/teacherapprove')}}">AllTeacher</a>
                            </li>

                   
                            

                        </ul>
                    </li>

                 
                  <li>
                        <a href="#"><i class="fa fa-address-book"></i> Course Materials<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{URL::to('/course')}}"> Course Add</a>
                            </li>
                            

                        </ul>
                    </li>
                   

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Notice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                         

                            <li>
                                <a href="{{URL::to('/classroutine')}}">class Routine </a>
                            </li>


                                   <li>
                                <a href="{{URL::to('/seatplan')}}">Guard Plane </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/allnotice')}}">All Notice</a>
                            </li>

                                    <li>
                                <a href="{{URL::to('/examnotice')}}">Exam Notice </a>
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

            <!-- ... Your content goes here ... -->

            <br><br>

            <form action="{{url('/addcourse')}}" method="POST">
                  {{ csrf_field() }}

                 

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

                      </div>
                         <p style="font-style: oblique;margin-top: 120px;text-align: center;">@ Course Add @</p> 

                <table class="table table-bordered" id="dynamic_field" style=" margin-top:20px;px;">  

                      @if(Session::has("success"))

                         <div class="alert alert-success" style="margin-top: 40px;text-align: center;">
                             <b>Course Add Successfully</b>

                         </div>

                        @endif
                    <tr>  
                        <td><input type="text" name="course[]" placeholder="Enter your course" class="form-control name_list"  required=/></td> 

                         <td><input type="text" name="session[]" placeholder="Enter your session" class="form-control name_list" required=/></td>

                           <td><input type="text" name="credit[]" placeholder="Enter credit" class="form-control name_list" required=/></td>

                          <td>
                            <label>Semester </label>
                            <select name="semester[]" class="btn btn-primary" placeholder="Enter your semester">
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                            <option>5th</option>
                            <option>6th</option>
                            <option>7th</option>
                            <option>8th</option>
                            
                          </select>
                         </td>


                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                 <button class="btn btn-primary">submit</button>
            </div>



</form>
    

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



<script type="text/javascript">
    

     $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="course[]" placeholder="Enter your course" class="form-control name_list" /></td> <td><input type="text" name="session[]" placeholder="Enter your session" class="form-control name_list"/>  <td><input type="text" name="credit[]" placeholder="Enter Credit" class="form-control name_list" required=/></td><td><select name="semester[]" class="btn btn-primary" ><option>1st</option><option>2nd</option><option>3rd</option><option>4th</option><option>5th</option><option>6th</option><option>7th</option><option>8th</option></td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      });
</script>

