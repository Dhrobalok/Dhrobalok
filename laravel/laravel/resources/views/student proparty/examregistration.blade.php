<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

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







        <style type="text/css">


          body
          {

                  background-color: #d5f4e6;
                  background-size: cover;

          }


  th
  {

          height: 30px;
        background-color:rgb(128,128,128); 
        margin-top: 40px;
  }

/*   examregister*/

h4
{
  text-align: center;
}


.table-responsive
{
     
      background-color: #d5f4e6;
      margin-top: 30px;
      text-align: center;



}

.responsive
{
  width: 100%;
 
  background-color: #d5f4e6;

}



      
   @media screen and (max-width: 600px) {

        p.c
         {
            font-style: oblique;
         
            margin-left: 100px;
            color: black;
         
           
         }
     }
         @media screen and (min-width: 601px) {

      p.c
         {
            font-style: oblique;
         
           margin-left: 100px;
            color: black;
         
           
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
         @media screen and (min-width: 601px) {

      p.p
         {
            font-style: oblique;
            text-align: center;
        
            color: red;
         
           
         }
     }



    @media screen and (max-width: 600px) {

        div.user-card
         {
            font-style: oblique;
         
            text-align: center;
            color: black;
         
           
         }
     }
         @media screen and (min-width: 601px) {

      div.user-card
         {
            font-style: oblique;
         
         text-align: center;
            color: black;
         
           
         }
     }

      @media screen and (max-width: 600px) {

        h4
         {
            font-style: oblique;
         
            margin-left: 130px;

            color: black;
               width:10%;

         
           
         }
     }
         @media screen and (min-width: 601px) {

      h4
         {
            font-style: oblique;
         
              margin-left: 130px;
            color: black;
         
           
         }
     }

       @media screen and (max-width: 600px) {

        img
         {
            font-style: oblique;
         
            margin-left: 200px;
            color: black;
            border-style: groove;

         
           
         }
     }
         @media screen and (min-width: 601px) {

      img
         {
            font-style: oblique;
         
           text-align: center;
            color: black;
         
           
         }
     }




    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                           
                             <li>
                                <a href="{{URL::to('/snotice')}}">
                                  <b style="max-height: 500px;font-size: 15px;">SeeNotice </b></a>
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
          <br>

            <div class="row">
                <div class="col-lg-8" style="background-color: #d5f4e6; border-radius: 12px;background-size: cover;width: 100%;height: 100%;">

                   
                       <img src="images/pust_logo.png" style="height: 100px; width: 100px; float: left;background-size: cover;">


         
             <h4 style="">Pabna University Of Science & Technology</h4>
        <p class="p" style=" font-size:16px; "> Department Of Computer Science & Engineering</p>

           <p style="text-align: center;">Apply For Exam Registration:</p>

          <p  style="font-style:oblique; font-size: 17px; text-align: center; margin-top: 39px;"> Bsc Engineering Program:</p>

        

      


          
    
     <form class="login100-form validate-form" enctype="multipart/form-data" action="{{url('/registration')}}" method="POST">
         {{ csrf_field() }}

  <p style="font-style:oblique; font-size: 17px; text-align: center; margin-top: 39px; color: red;">Exam Status:&nbspRegular<input type="checkbox" name="examname" value="regular" required=""></p>

          <div class="col-lg-12">

               

                         @if(Session::has("ra"))

                         <div class="alert alert-success">
                             <b>Your Input Course Is Not Match With Our Document Course in the semester</b>

                         </div>

                        @endif

                          @if(Session::has("alert"))

                         <div class="alert alert-success">
                             <b>Your Course Attendence Below 60%</b>

                         </div>

                        @endif
          
          <p style="font-style: oblique; text-align: center;">N.B : If Any Course Attendence Have Less Than 60% Then Apply Will Be Remove </p>
                    <div style="margin-left: 140px;">

                
        <div style=" margin-top: -120px;margin-top: 80px;">
                              <label>Full Name Of Student:</label>
                              <input type="text" name="name" class="form-control" style="width:320px;" required="" placeholder="Enter  Name">
                               
                                  <label>Date OF Birth:</label>
                              <input type="date" name="dob" class="form-control"style="width:320px;" required="">
                                 
                                <label>Student Father Name:</label>
                              <input type="text" name="fn" class="form-control"style="width:320px;"placeholder="Enter Father Name" required="">
                             
                              &nbsp
                              <label>Student Mother Name:</label>
                              <input type="text" name="mn" class="form-control"style="width:320px;" placeholder="Enter Mother Name">



                              </div>

                 <div style="margin-left:460px; margin-top: -240px;">

                               
                        <label>HallName</label>
                         <input type="text" name="halname" class="form-control"style="width:320px;" required="" placeholder="Enter HallName">
                         

                          
                         <label> Roll No:</label>
                         <input type="text" name="roll" class="form-control"style="width:320px;" required="" placeholder="Enter Roll">
                      

                         <label>Reg No:</label>
                         <input type="text" name="regno" class="form-control"style="width:320px;" required="" placeholder="Reg No">
                                  
                             <label>Session</label>
                         <input type="text" name="session" class="form-control"style="width:320px;" required=""placeholder="Enter Session">
                              </div>

                                 <label>Semester</label>
                <select name="semester" class="form-control">
                  <option>1st</option>
                     <option>2nd</option>
                        <option>3rd</option>
                           <option>4th</option>
                           <option>5th</option>
                           <option>6th</option>
                            <option>7th</option>
                             <option>8th</option>
                </select>
                  

                          <br>
                  <p style=" border:0;border-bottom: 2px dotted; margin-left: -92px;"></p>
                              
                           

                 <p style="text-align: center;">Include Course Title & Course Code</p> 
                <table class="table table-bordered" id="dynamic_field">  
                    
                     
                      <tr>

                        <td>
                         <input type="text" name="code[]" placeholder="Enter your course code" class="form-control name_list" required=/>
                     </td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>  

                            </td>

                             </tr>
                      
                </table>  

                 <p style=" border:0;border-bottom: 2px dotted; margin-left: -92px;"></p>

                
                 <p style="text-align: center;">Include Parmanent Address</p>

          
                        <label>Village</label>
                         <input type="text"  name="vname" class="form-control"style="width:320px;"required placeholder="Enter Village Name">
                       
                          
                         <label> Post:</label>
                         <input type="text" name="post" class="form-control"style="width:320px;" required=""placeholder="Enter Post Name">
                      
                        
                         
                               
                       <div style=" margin-top: -130px; margin-left: 420px;">       
                             <label>Mobile</label>
                         <input type="text" name="mobile" class="form-control" style="width:320px;" required=""placeholder="Enter Active No">

                          <label>Upozila :</label>
                         <input type="text" name="upozila"class="form-control" style="width:320px;" required=""placeholder="Enter Name">

                               <label>District</label>
                        <select name="district" class="form-control" style="width:320px;" required="">

 <option> Barguna District</option>

<option> Barisal District</option>
<option> Bhola District</option>
 <option>Jhalokati District</option>
<option> Patuakhali District</option>
 <option>Pirojpur District</option>
 <option>Bandarban District</option>
<option> Brahmanbaria District</option>
 <option>Chandpur District</option>
<option> Chittagong District</option>

<option> Comilla District</option>

<option> Cox's Bazar District</option>

<option> Feni District</option>

<option> Khagrachhari Distric</option>

 <option>Lakshmipur District</option>

 <option>Noakhali District</option>

 <option>Rangamati District</option>

 <option>Dhaka District</option>

 <option>Faridpur District</option>

 <option>Gazipur District</option>

 <option>Gopalganj District</option>

<option> Kishoreganj District</option>

<option> Madaripur District</option>

<option> Manikganj District</option>

<option> Munshiganj </option>

 <option>Narayanganj District</option>

<option> Narsingdi District</option>

<option> Rajbari District</option>

<option> Shariatpur District</option>

<option> Tangail District</option>

<option> Bagerhat District</option>

<option> Chuadanga District</option>

<option> Jessore District</option>

<option> Jhenaidah District</option>

<option> Khulna District</option>
<option> Kushtia District</option>

<option> Magura District</option>

<option> Meherpur District</option>

<option> Narail District</option>

<option> Satkhira District</option>

<option> Jamalpur District</option>

<option> Mymensingh District</option>

<option> Netrokona District</option>

 <option>Sherpur District</option>

 <option>Bogra District</option>
 <option>Joypurhat District</option>

 <option>Naogaon District</option>

<option> Natore District</option>

 <option>Chapai Nawabganj District</option>

 <option>Pabna District</option>

 <option>Rajshahi District</option>

<option> Sirajganj District</option>

 <option>Dinajpur District</option>

 <option>Gaibandha District</option>

<option> Kurigram District</option>

 <option>Lalmonirhat District</option>

 <option>Nilphamari District</option>

 <option>Panchagarh District</option>

 <option>Rangpur District</option>

 <option>Thakurgaon District</option>
  <option>Nilphamari District</option>

 <option>Panchagarh District</option>

 <option>Rangpur District</option>

 <option>Thakurgaon District</option>

 <option>Habiganj District</option>

<option> Moulvibazar District</option>

<option> Sunamganj District</option>

 <option>Sylhet District</option>

</select>
</div>  


                        
               
</div>

<br>
<br>
<br>


 
<p style=" border:0;border-bottom: 2px dotted; margin-left: 39px;"></p>
<label>Signature</label>
<input type="file" name="image" class="form-control" style="width: 320px;">


  <label style="margin-left: 320px;"> # I am confirm that the all information that i am include is  right </label>

                 <b style="color: black;"><input type="checkbox" name="acknowledge" value="confirm all data right" required=""></b>



               <br>
                 <button class="btn btn-primary" style="margin-left: 140px; width: 640px;">submit</button>


                      </form>



                            </div>
               
    
</div>


         
<br><br>
           

         



                 
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td><input type="text" name="code[]" placeholder="Enter course code " class="form-control name_list"required=/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      });
</script>



















