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









/*myself*/

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
      

         p

         {

            margin-left: 20px;
            margin-top: 20px;

         }

                  img.im1

         {

        
   
            height: 30px;
          -moz-border-radius:85px;
           -webkit-border-radius: 75px;
           width: 30px;
 

         }


        

         #table2
         {
          margin-left:3px;
       

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
          
          {
            margin-top: 50px;

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
                    <i class="fa fa-bell fa-fw"></i> Notification<span class="badge">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i>

                            


                                


                                <span class="pull-right text-muted small"></span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong></strong>
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
          


  
         <div class="w3-light-grey">

                 <div class="table-responsive"> 
                          
                    <div class="Banner">
                       <div class="container-fluid">
                            <div class="row">
                            <div class="col 12 p o">

                      <p class="p" > Pabna University Of Science & Technology</p>

                      <p class="c">Department Of Computer Science & Engineering</p>
                    
                                   

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-top: -63px;">                     
                        
                     </div> 

                      </div>
                                       </div>
                                          </div>
                                             </div>

              
                         
                   
                       
                          <div class="img2">
                            <br> <br>

                               <table class="table table-responsive" id="table2">

                                   
                       <p style="font-style: oblique;margin-left:450px;font-size: 16px;">@ Admin Approve @</p>

                    
                               <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>


                        
                               
                                    <th>Action</th>

                           

                             </tr>
                             <?php
                               $i=1;
                             ?>
                               
                                 
                                @foreach($r as $s)
                               
                                 <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$s->name}}</td>
                                   <td>{{$s->email}}</td>
                                    <td>
                                          <img src="{{ asset('uploads/pic/' . $s->image) }}" style="height: 70px;width: 90px; border-radius:50%;">

                                    </td>
                                    <td>

                                      <input type="hidden" name="id">
                                      <a href="{{url('/sapprove/'.$s->email)}}">
                                      <button class="btn btn-primary">
                                      <i class="fa fa-link"></i> select
                                  </button>
                                  </a>

                                              <input type="hidden" name="id">
                                      <a href="{{url('/sadelete/'.$s->email)}}">
                                      <button class="btn btn-success">
                                     <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                  </button>
                                  </a>

                                </td>


                                 </tr>
                                        @endforeach

                              

                       

                               </table>
        


                        </div>




                     <div class="footer">
                      
                    
                       
                       <marquee>&copy; Computer Science & Engineering  2020 &nbsp<img src="images/download.png" class="im1"></marquee>

                     </div>

                    
       



                  </div>



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
