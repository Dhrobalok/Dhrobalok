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
    

   @import url('https://fonts.googleapis.com/css?family=Abel');

html, body {
  /*background: #FCEEB5;*/
  font-family: Abel, Arial, Verdana, sans-serif;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
}

.card {
  width: 450px;
  height: 250px;
  background-color: #fff;
  background: linear-gradient(#f8f8f8, #fff);
  box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
  border-radius: 6px;
  overflow: hidden;
  position: relative;
  margin: 1.5rem;
}

.card h1 {
  text-align: center;
}

.card .additional {
  position: absolute;
  width: 150px;
  height: 100%;
  background: linear-gradient(#dE685E, #EE786E);
  transition: width 0.4s;
  overflow: hidden;
  z-index: 2;
}

.card.green .additional {
  background: linear-gradient(#92bCa6, #A2CCB6);
}


.card:hover .additional {
  width: 100%;
  border-radius: 0 5px 5px 0;
}

.card .additional .user-card {
  width: 150px;
  height: 100%;
  position: relative;
  float: left;
}

.card .additional .user-card::after {
  content: "";
  display: block;
  position: absolute;
  top: 10%;
  right: -2px;
  height: 80%;
  border-left: 2px solid rgba(0,0,0,0.025);*/
}

.card .additional .user-card .level,
.card .additional .user-card .points {
  top: 15%;
  color: #fff;
  text-transform: uppercase;
  font-size: 0.75em;
  font-weight: bold;
  background: rgba(0,0,0,0.15);
  padding: 0.125rem 0.75rem;
  border-radius: 100px;
  white-space: nowrap;
}

.card .additional .user-card .points {
  top: 85%;
}

.card .additional .user-card svg {
  top: 50%;
}

.card .additional .more-info {
  width: 300px;
  float: left;
  position: absolute;
  left: 150px;
  height: 100%;
}

.card .additional .more-info h1 {
  color: #fff;
  margin-bottom: 0;
}

.card.green .additional .more-info h1 {
  color: #224C36;
}

.card .additional .coords {
  margin: 0 1rem;
  color: #fff;
  font-size: 1rem;
}

.card.green .additional .coords {
  color: #325C46;
}

.card .additional .coords span + span {
  float: right;
}

.card .additional .stats {
  font-size: 2rem;
  display: flex;
  position: absolute;
  bottom: 1rem;
  left: 1rem;
  right: 1rem;
  top: auto;
  color: #fff;
}

.card.green .additional .stats {
  color: #325C46;
}

.card .additional .stats > div {
  flex: 1;
  text-align: center;
}

.card .additional .stats i {
  display: block;
}

.card .additional .stats div.title {
  font-size: 0.75rem;
  font-weight: bold;
  text-transform: uppercase;
}

.card .additional .stats div.value {
  font-size: 1.5rem;
  font-weight: bold;
  line-height: 1.5rem;
}

.card .additional .stats div.value.infinity {
  font-size: 2.5rem;
}

.card .general {
  width: 300px;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  z-index: 1;
  box-sizing: border-box;
  padding: 1rem;
  padding-top: 0;
}

.card .general .more {
  position: absolute;
  bottom: 1rem;
  right: 1rem;
  font-size: 0.9em;
}



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

/*  Banner Style */



/*myself*/

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
        <ul class="nav navbar-right navbar-top-links" style="float: right;">
           
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   <i class="fa fa-bell fa-fw"></i> <strong>Notificatio</strong>
                
                   <span class="badge">    
                 </span>
                   
                    </span><b class="caret"></b>
                  
                   
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li style="">
                    
                
                  
                  </li>

                           
                    <li class="divider"></li>
                    <li>
                    
                              
                  
                           
                            <i class="fa fa-angle-right"></i>
                        
                            
                      

                      

                         
                       
                         
                        
                    </li>
                         </li>

                 
                </ul>
        
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
        <div class="navbar-default sidebar" role="navigation" class="row" >
            <div class="sidebar-nav navbar-collapse"class="col-lg-10">

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
                        <a href="#"><i class="fa fa-address-book"></i> <b style="max-height: 500px;font-size: 15px;">StudentManage</b><span class="fa arrow"></span></a>
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
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> <b style="max-height: 500px;font-size: 15px;">Notice</b><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{URL::to('/notice')}}">
                                  <b style="max-height: 500px;font-size: 15px;">Notice Add</b></a>
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
                <div class="col-lg-20">
                    <h1 class="page-header"></h1>
            



   
          
   
  </div>

 
</div>

<!--content goes here-->


     
         <div class="w3-light-grey">

                 <div class="table-responsive"> 
                          
                    <div class="Banner">
                       <div class="container-fluid">
                            <div class="row">
                            <div class="col 12 p o">

                      <p class="p" > Pabna University Of Science & Technology</p>

                      <p class="c">Department Of Computer Science & Engineering</p>
                    
                                   

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-bottom: 45px;">                     
                        
                     </div> 

                      </div>
                                       </div>
                                          </div>
                                             </div>

              
                         
                   
                       
                          <div class="img2">

                               <table class="table table-responsive" id="table2">

                                   
                       <p style="font-style: oblique;margin-left:450px;font-size: 16px;">@ Class Test @</p>

                    
                               <tr>
                                <th>Id</th>
                                <th>Course</th>
                                <th>Class Test 1</th>
                                    <th>Class Test 2</th>
                                      <th>Class Test 3</th>

                                     <th>Best Two</th>
                               
                                 

                           

                             </tr>
                             <?php
                               $i=1;
                             ?>
                               
                                 
                                @foreach($p as $s)
                               
                                 </tr>
                                <td>{{$i++}}</td>
                                <td>{{$s->course}}</td>
                                  <td>{{$s->ct1}}</td>
                                       <td>{{$s->ct2}}</td>
                                          <td>{{$s->ct3}}</td>
                                        <td>{{$s->besttwo}}</td>
                                   
                                
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
