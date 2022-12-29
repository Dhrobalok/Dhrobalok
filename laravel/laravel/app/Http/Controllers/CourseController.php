<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Course;
use App\Classtest;
use App\CourseSignature;
use Session;
 ob_get_clean();
class CourseController extends Controller
{
	//course page access
    public function course()
    {

    	return view('course');
    }

       public function addcourse(Request $re)
    {
     
        $c=count($re->course);

      for($i=0;$i<$c;$i++) 
      {

      	$data = [

                 'course' => $re->course[$i],
                 'session' => $re->session[$i],
                 'credit' => $re->credit[$i],
                 'semester' => $re->semester[$i],

               ];
         Course::create($data);
            
      }
      session::flash("success");
      return back();
    }


  public function addcoursemark()
    {

      $q=\DB::select("select distinct session from course");

      return view('teacher.coursemark')->with('r',$q);

    }


      public function coursemark(Request $re)
    {


        $c=$re->course;
      
        

       $q=\DB::select('select course from coursemark2');


        
        
   
      # code...
    
         $semester=$re->semester;
         $c=count($re->roll);





      for($i=0;$i<$c;$i++) 
      {
      
             $se=$re->session;


        $data = [

                 'roll' => $re->roll[$i],
                 'session'=> $se,
                 'course' => $re->course[$i],
                 'credit'=>0,
                 'mark' => $re->mark[$i],
                  'ct1' => $re->ct1[$i],
                  'ct2' => $re->ct2[$i],
                  'ct3' => $re->ct3[$i],
                   'ca'=>0,
                  'besttwo'=>0,

                  'semester' => $semester,
                 

               ];



                 
          Classtest::create($data);

              
   
      

                $q=\DB::select('select credit from course where course="' . $re->course[$i] . '"');
                  
                      foreach ($q as  $v)
                       {
             \DB::update('UPDATE `result` SET credit="'. $v->credit .'" WHERE  course="' . $re->course[$i] . '"');

            \DB::update('UPDATE `coursemark2` SET credit="'. $v->credit .'" WHERE course="' . $re->course[$i] . '"'); 
                        
                      }

          
           
                  
        
                     if ($re->ct1[$i]<=$re->ct2[$i] && $re->ct1[$i]<$re->ct3[$i] )
                       {

                          $e=$re->ct2[$i]+$re->ct3[$i];
                         // return $e;
                    
                          \DB::update('UPDATE `coursemark2` SET besttwo="'. $e .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
                            \DB::update('UPDATE `result` SET besttwo="'. $e .'"   WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');  
                       }
                elseif($re->ct1[$i]<=$re->ct2[$i] && $re->ct1[$i]>=$re->ct3[$i] )
                       {
                          $f=$re->ct2[$i]+$re->ct1[$i];
                         //return $f;
                   \DB::update('UPDATE `coursemark2` SET besttwo="'. $f .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 

                    \DB::update('UPDATE `result` SET besttwo="'. $f .'"  WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');  
                       }
                         
                       

                      elseif($re->ct1[$i]>=$re->ct2[$i] && $re->ct2[$i]<=$re->ct3[$i] )
                       {
                             $g=$re->ct3[$i]+$re->ct1[$i];
                            // return $g;
                   \DB::update('UPDATE `coursemark2` SET besttwo="'. $g .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 

                    \DB::update('UPDATE `result` SET besttwo="'. $g .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');  
                       }

                      
                    
              elseif($re->ct1[$i]>=$re->ct2[$i] && $re->ct1[$i]<=$re->ct3[$i] )
                       {
                          $h=$re->ct1[$i]+$re->ct3[$i];
                          //return $h;
                    \DB::update('UPDATE `coursemark2` SET besttwo="'. $h .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 

                    \DB::update('UPDATE `result` SET besttwo="'. $h .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');  
                       }
                          
                         
                       

                      elseif($re->ct1[$i]>=$re->ct2[$i] && $re->ct2[$i]>=$re->ct3[$i] )
                       {

                        

                          $v=$re->ct1[$i]+$re->ct2[$i];
                          //error_reporting();
                         
         \DB::update('UPDATE `coursemark2` SET besttwo="'. $v .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 

                     \DB::update('UPDATE `result` SET besttwo="'. $v .'" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');  
                       }


                 $q=\DB::select('select student_roll from studentattend where student_roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . ' "  AND attendence="present"');
                $p=\DB::select('select distinct date from studentattend where course="' . $re->course[$i] .'"');

      
        
               $r=count($q);
               $s=count($p);

              
               if ($r==0||$s==0)
                {
                 
                  $m=0;
                
                 
               }

               else
               {

            
                
        
          $m=round((100*$r)/$s);
      
          if ($m>=90) 
           {

                       \DB::update('UPDATE `coursemark2` SET ca="10" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
                      \DB::update('UPDATE `result` SET ca="10" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');         
            
           }

          else if ($r>=85 && $i<=89) 
           {

                 \DB::update('UPDATE `coursemark2` SET ca="9" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 

                    \DB::update('UPDATE `result` SET ca="9" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');    
           }

            else if ($r>=80 && $r<=84) 
           {

              \DB::update('UPDATE `coursemark2` SET ca="8" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
                \DB::update('UPDATE `result` SET ca="8" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
           }

           elseif ($r>=75 && $r<=79) 
           {
           
             \DB::update('UPDATE `coursemark2` SET ca="7" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
               \DB::update('UPDATE `result` SET ca="7" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
            
           }
          elseif ($r>=70 && $r<=74) 
           {
              \DB::update('UPDATE `coursemark2` SET ca="6" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
                 \DB::update('UPDATE `result` SET ca="6" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
            
           }

             elseif ($r>=60 && $r<=69) 
           {
               \DB::update('UPDATE `coursemark2` SET ca="5" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
                 \DB::update('UPDATE `result` SET ca="5" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
            
           }

           else
           {
               \DB::update('UPDATE `coursemark2` SET ca="0" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"');
                   \DB::update('UPDATE `result` SET ca="0" WHERE roll="' . $re->roll[$i] . '" AND course="' . $re->course[$i] . '"'); 
            
           }

         }

            
      }

      session::flash("success");
      return back();

 
    }


    public function coursemark1(Request $re)
    {
      $session=$re->session;
      $semester=$re->semester;
      $id=$re->tid;
     $q=\DB::select("select distinct course from coursealocate2 where session='$session' AND semester='$semester' AND tid='$id'");
     $p=\DB::select("select distinct session,semester from course where session='$session' AND semester='$semester'");
     $b=\DB::select("select distinct roll from examregistration where session='$session'");

      return view('classmarkadd')->with('r',$q)->with('v',$p)->with('c',$b);

    }



}
