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
  
        .w
         {

            margin-top:22px; 
            border-radius: 25px;

         }
  

         .head1
         {
            width: 100%;
           position: absolute;
           top:1px;
          margin-bottom: 40px;

          
         }
         .img3
         {
          width: 100%;
           position: absolute;
           top:5px;
          margin-bottom:490px;
         }

         p.c
         {
            font-style: oblique;
            height: 40px;
            margin-left: 215px;
            color: red;
           
         }


         p.p
         {
            font-style: oblique;
            height: 40px;
            font-size: 20px;
            margin-left: 180px;
            color: black gray;
           
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

        #img1

         {

        
   
            height: 30px;
          -moz-border-radius:85px;
           -webkit-border-radius: 75px;
           width: 30px;
 

         }

         .table
         {
         	margin-left: 30px;
         	margin-top: 26px;

         }
         

          #dotted2
           {
            border:0;
            border-bottom: 2px dotted;
            color: 
          }

          .result
          {
            margin-left: 320px;
             font-style: oblique;

          }

           #table
         {
          margin-left: 30px;
          margin-top: 26px;

         }
             #table2
         {
          margin-left: 30px;
          margin-top: -10px;

         }
        

          #dotted2
           {
    border:0;
    border-bottom: 2px dotted;
    color: 
          }
          #alert
          {
            width: 150px;
            height: 20px;
            margin-left:220px;
             margin-top: 60px; 
          }
                #alert2
          {
                width: 150px;
            height: 20px;
            margin-left:220px;
             margin-top: 30px;
             }

           #alert3
          {
            
            margin-left:590px; 
           
          }
          .footer
          {
            margin-top: 2px;
          }


</style>


</head>
<body>



    <!-- Navigation -->
    

        

            <!-- ... content goes here ... -->

             
               
  
     
                 <div class="w">


                  <div>

                      <p class="p"> Pabna University Of Science & Technology</p>

                      <p class="c">Department Of Computer Science & Engineering</p>
                    
                  </div>

                  
                     <div class="head1">
                        <img src="images/pust_logo.png" style="height:100px; width: 100px; margin-bottom: 45px;">


                                         
                       </button>
                            </a>
                         
                       
                        
                     </div> 
                    </div>



                    
               
                      <div class="img2">
                         <div class=" alert alert-success" id="alert">
                             <b style="margin-left: 40px;"> Student Information</b>

                         </div>
                       
                         <table class="table table-striped" id="table">


                           @foreach($w as $v)
                           
                           <img class="img3" src="{{ asset('uploads/pic/' . $v->image) }}" style="height: 70px;width: 70px; margin-left:620px;">



                     
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
                           <th>Regular</th>
                           </tr> 
                               <tr> 
                              <th>Comments:</th>
                           <th>Pass</th>
                           </tr> 
                          
                           
                           
                     

                           @endforeach
                                 </table>
                     </div>

              <!--

   
                   -->
                    


                    
@foreach($z as $r)
   <div class=" alert alert-success" id="alert2">
  <b id="alert3"style="margin-left: 40px;"> {{$r->semester}} Semester Result</b>

  </div>

@endforeach
<table class="table table-striped" id="table2">
	<tr>
		<th>CourseName</th>
		<th>Grade</th>

	</tr>
<?php
$sum1=0;
$sum2=0;
$sum3=0;
$sum4=0;
$sum5=0;
$sum6=0;
$sum7=0;
$sum8=0;
$sum9=0;
$sum10=0;
$credit=0;
$credit1=0;
$credit2=0;
$credit3=0;
$credit4=0;
$credit5=0;
$credit6=0;
$credit7=0;
$credit8=0;
$credit9=0;
$credit10=0;

$tcredit=0;

foreach ($f as $key => $value)
 {
      

   echo "<tr>";
   echo "<th style=color:black;>";
 	echo $value->course;
 	echo "</th>";
 	
	$r=$value->mark+$value->ca+$value->besttwo;
	$credit=$value->credit+$credit;


      if ($r>=80)
       {
         
       	 $i=4*$value->credit;
       	 $sum1=$sum1+$i;
       	echo "<th>";
      	echo "A+";
      	echo "</th>";
       }
       
      elseif ($r>=75 && $r<80) 
      {
      		 $j=3.75*$value->credit;
      	 echo "<th>";	 
      	echo "A";
      	echo "</th>";
    
      	$sum2=$sum2+$j;
    
    

      }


         elseif ($r>=70 && $r<75) 
      {
      		 $k=3.50*$value->credit;
        echo "<th>";
      	echo "A-";
      	echo "</th>";
      	$sum3=$sum3+$k;
      	# code...
      }
         elseif ($r>=65 && $r<70) 
      {
      		 $l=3.25*$value->credit;
        echo "<th>";
      	echo "B+";
      	echo "</th>";
      	$sum4=$sum4+$l;
      	# code...
      }
         elseif ($r>=60 && $r<65) 
      {
      			 $m=3.00*$value->credit;
          echo "<th>";  			 
      	echo "B";
      		echo "</th>";
      	 	$sum5=$sum5+$m;
      	# code...
      }
         elseif ($r>=55 && $r<60) 
      {
      	$n=2.75*$value->credit;
      	echo "<th>"; 
      	echo "B-";
      	echo "</th>";
      	$sum6=$sum6+$n;
      	# code...
      }

       elseif ($r>=50 && $r<55) 
      {
      	 	$o=2.50*$value->credit;
          	echo "<th>";
      	  echo "C+";
      	  echo "</th>";
   
      	  $sum7=$sum7+$o;
      	
      	  
      
      }

 

          elseif ($r>=45 && $r<50) 

      {
      		$p=2.25*$value->credit;
      		echo "<th>";
      	echo "C";
      	  echo "</th>";
      	 $sum8=$sum8+$p;
      	
      }

         elseif ($r>=40 && $r<45) 
      {
      		$q=2.00*$value->credit;
      		echo "<th>";
      	echo "D";
      	 echo "</th>";
      	$sum9=$sum9+$q;
      }

      else
      {

      	$r=0.00*$value->credit;
      	echo "<th>";
        echo "F" ;
        echo "</th>";
        $sum10=$sum10+$r;
      }


}


 $total=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10;
 echo "<th>";

 echo "<p>";

 echo "GPA: ";

 $t=($total/$credit);
 echo round($t,2);
 echo "</p>";

 echo "</th>";


 echo "</tr>";


 



 

?>



</table>

  <div class="footer">
                      <p>Chairman Sig:</p>
                      @foreach($x as $r)
                        <img src="{{ asset('uploads/pic/' . $r->image) }}" style="height:40px;width:90px;">
                      @endforeach
                       
                       

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












