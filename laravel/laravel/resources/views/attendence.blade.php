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

     <style>
          .w3-light-grey
          {

           margin-top:22px; 
            border-radius: 25px;

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
                    <li><a href="{{URL::to('/teacherprofil')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                                <a href="{{URL::to('/addcoursemark')}}">class test manage </a>
                            </li>
                            

                        </ul>
                    </li>

                 
             
                   

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Notice<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                                      <li>
                                <a href="{{URL::to('/notice')}}">Notice Add</a>
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
                    <div class="alert alert-success">
                             <h3 style=" text-align: center;">Student Attendence</h3>

                         </div>
                </div>
            </div>


            <!--attendence-->
 <div class="w3-light-grey">
                      
       <div>
                             <h4 style=" text-align: center;">Today
                              {{ date("d/m/y") }}

                             </h3>

                             </div>
   


<form action="{{url('/takeattend')}}" >

  {{ csrf_field() }}


<div style="float:left;">
      <label>Course Name:</label>
    <select name="course" style="height: 34px;">
      @foreach($m as $r)                         


    
<option>{{$r->course}}</option>



     @endforeach               

    </select>  


        &nbsp&nbsp&nbsp<label style="">Select Semester:</label>

      <select name="semester" style="height: 34px; width:70px;">
      @foreach($d as $y)                         


    
<option>{{$y->semester}}</option>



     @endforeach               

    </select>                      

</div>


     @foreach($b as $v)  
<input type="hidden" name="t_id" required="" value="{{$v->tid}}" >
  @endforeach
<br><br>
<table class="table table-striped">

                
    <tr>
                <th>Id</th>
                 <th>Name</th>
                                           
                <th>Attendence</th>
                
                <th>action</th>
        
    </tr>
     @foreach($use as $s)
    <tr>
         <td>
            {{$s->id}}
         </td>
         <input type="hidden" name="student_roll[]" value=" {{$s->roll}} ">
         <td>
            {{$s->name}}
         </td>
             <td>
             <input type="radio" name="attendence[{{ $s->roll }}]" value="present" required>present

             <input type="radio" name="attendence[{{ $s->roll }}]" value="Absence" required>Absence
             </td>
                     
      
<td>
 <a href="{{URL::to('/attendenceedit/'.$s->roll)}} " class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp Edit</a>
      
    </td> 
              <input type="hidden" name="date" value="{{ date("d-m-y") }}">  


                   
           
             
      @endforeach

           </tr>
            </table>

 
           <button class="btn btn-success">take attendence</button> &nbsp

        
   

</form>
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
