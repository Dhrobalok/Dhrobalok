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
         
         .head
         {

            margin-top: 20px;
            background-color: rgba(201, 76, 76, 0.3);
            border-radius: 9px;


         }

      

         .head1
         {
            width: 100%;
            width: 100%;
           position: absolute;
           top:130px;
         }


          @media screen and (min-width: 601px) {

      div.head2
         {
            font-style: oblique;
         
           margin-left: 100px;
            color: red;
         
           
         }
     }


              @media screen and (max-width: 600px) {

      div.head2
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
         
           text-align: center;
            color: black;
         
           
         }
     }


              @media screen and (max-width: 600px) {

      p.c
         {
            font-style: oblique;
         
              text-align: center;
           color: black;

         
           
         }
     }

  
          @media screen and (min-width: 601px) {

      p.p
         {
            font-style: oblique;
         
           text-align: center;
            color: red;
         
           
         }
     }


              @media screen and (max-width: 600px) {

      p.p
         {
            font-style: oblique;
         
           text-align: center;
            color: red;
         
           
         }
     }

         .table-responsive
         {
           margin-top:120px; 
           width: 100%;

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
                    <i class="fa fa-user fa-fw"></i> Teacher <b class="caret"></b>
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
                        <a href="#"><i class="fa fa-address-book"></i> Student Manage<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{URL::to('/attend')}}">Student Attendence</a>
                            </li>

                             <li>
                                <a href="{{URL::to('/addcoursemark')}}">
                                    course mark add
                                 </a>
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
                    
                </div>
            </div>

            <!-- ... Your content goes here ... -->
             <br><br>     <br><br>

             
                                             </div>

                 

            <form enctype="multipart/form-data" action="{{url('/coursemark')}}" method="POST">
                  {{ csrf_field() }}





                        <div class="head">

                                    <div class="head2">
                                          <p class="p" style="font-style: 20px;">Pabna University Of Science & Technology</p>
                              
                                            <p class="c">Department Of Computer Science & Engineering</p>

                     
                  
            

                          
                          
                      </div>

                     
                     
                           <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px;">
                  
            

                          
                          
                      </div>
        

               
                         
                      
                   
                           


 <div class="table-responsive">

            <p style="font-style: oblique; text-align: center;">Course Mark Add Section</p>

              
                  @if(Session::has("success"))

                         <div class="alert alert-success">
                             <b>Course mark add Successfully</b>

                         </div>

                        @endif

                           @if(Session::has("alert"))

                         <div class="alert alert-success">
                             <b>Course Result Already Taken </b>

                         </div>

                        @endif
                                @foreach($c as $o)
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                      

                                        <td>
                                      <select name="roll[]" placeholder="Enter roll" class="form-control" required="" style="width:140px;"style="width:140px;">
                                       
                                


                           <option>{{$o->roll}}</option>


                    

                         </select>
                          
                        </td>


                           @foreach($v as $s)


                          <input type="hidden" name="session" value="{{$s->session}}">
                           <input type="hidden" name="semester" value="{{$s->semester}}">

                           @endforeach

                        
                            
                              <td>
                                      <select name="course[]" placeholder="Enter course" class="form-control" required="" style="width:140px;"style="width:140px;">
                                       
                                        @foreach($r as $n)


                           <option>{{$n->course}}</option>


                           @endforeach

                         </select>
                          
                        </td>

                    

                         <td><input type="text" name="mark[]" placeholder="Exam Mark" class="form-control name_list" required=/ style="width:125px;"></td>

                         <td>

                            <input type="text" name="ct1[]" placeholder="Enter ct1 mark" class="form-control name_list" required=/ style="width:120px;">
                                  
                                       </td>    

                                    <td>
                                  <input type="text" name="ct2[]" placeholder="Enter ct2 mark" class="form-control name_list" required=/ style="width:120px;">
                                  </td>

                                  <td>
                                  <input type="text" name="ct3[]" placeholder="Enter ct3 mark" class="form-control name_list" required=/ style="width:120px;">

                              </td>


                  




                    </tr>  

                      
                                    
                                  
                </table> 
                       @endforeach
               
                   <button class="btn btn-primary">
submit</button>

                    
               
            </div>

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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td><select name="roll[]" placeholder="Enter roll" class="form-control" required="" style="width:140px;"style="width:140px;">@foreach($c as $o)<option>{{$o->roll}}</option>@endforeach</select></td><td><select name="course[]" class="form-control" required="" placeholder="Enter course ">@foreach($r as $n)<option>{{$n->course}}</option>@endforeach</select></td>  <td><input type="text" name="mark[]" placeholder="Exam Mark" class="form-control name_list" /></td> <td><input type="text" name="ct1[]" placeholder="Enter ct1 mark" class="form-control name_list" required=/></td><td><input type="text" name="ct2[]" placeholder="Enter ct2 mark" class="form-control name_list" required=/></td><td><input type="text" name="ct3[]" placeholder="Enter ct3 mark" class="form-control name_list" required=/></td><td><select name="semester[]" class="form-control"  style=" width:69px;"><option>1st</option><option>2nd</option><option>3rd</option><option>4th</option><option>5th</option><option>6th</option><option>7th</option><option>8th</option></select></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      });
</script>





