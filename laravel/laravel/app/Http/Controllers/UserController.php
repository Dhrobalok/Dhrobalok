<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Classtest;
 ob_get_clean();

class UserController extends Controller
{
    public function about()
    {

    	return view("about");
    }

    public function contact()
    {

    	return view("contact");
    }

       public function ttt()
    {
    	$r=date("Y-m-d h:i:sa");
    	return($r);

     $count=\DB::select("select * from users where date='$r'");
       $r=count($count);
     return($count);
    	
    }


    public function logout()
    {
       //session_destroy();
     return view('');
    }

        public function mark()
    {
        $q=\DB::select("select roll from student");

        return view('student proparty.mark')->with('g',$q);
        
    }

 
          public function mark2(Request $re)
    {
          
           $q=\DB::select("select password from users where roll='150151'");
           return $q;

           

    }

        
    

                public function mark3(Request $re)
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

                  'semester' => $re->semester[$i],
                 

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
               if ($r==0)
                {

                  $m=0;
                
                 
               }
        
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

      session::flash("success");
      return back();

 

        
    }

    public function classtest()
    {

       return view('student proparty.classtest');


    }

        public function classtest2(Request $re)
    {

       $r=$re->roll;
       $s=$re->semester;

       $q=\DB::select("select course,ct1,ct2,ct3,besttwo from result where roll='$r' AND semester='$s'");

         return view('student proparty.classtest2')->with('p',$q);

    }

    
}
