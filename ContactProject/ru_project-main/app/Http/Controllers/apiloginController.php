<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Categoryinformation;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\Addition;
use App\Models\Designation;
use DB;
use Carbon\Carbon;
use App\Models\Facult;






class apiloginController extends Controller
{
    public function apiemergency()
    {
        $allinformation=Categoryinformation::where('category_id',100097)->get();
      
    
       $allinformations=json_encode($allinformation);
       return  $allinformations;
    
    }

    public function apirajshahi()
    {
 
       $allinformation=Categoryinformation::where('category_id',100098)->get();
       $allinformations=json_encode($allinformation);
       return  $allinformations;
       
        
    }

    public function OfficeDetails()
    {
        
       $officeinformation= DB::table('departments')->select('office_code','dept_name','unit_name','SRINDEX')->get();
       $allinformations=json_encode($officeinformation);
       return  $allinformations;
       
   
    }


    public function apiLogin()
    {
       $allinformation=Categoryinformation::get();
        return view('backend.admin.api.category',['informationall'=>$allinformation]);
    }

    public function loginpage()
    {
        return "loginsdf";
    }

    public function ProfileDetails()
    {

 

      
        $date=date('Y-m-d');


        $leagues = DB::table('additions')
       ->select('dbuid','salary_id','fullNameNew','designat','email','mobile','adress','additions.SRINDEX','dept_code','officeid','departments.dept_name')
        
       ->join('profiles', 'profiles.salaryID', '=', 'additions.salary_id')
       ->join('departments', 'departments.office_code', '=', 'additions.officeid')
       
       //->where('additions.officeid','=','profiles.dept_code')
     
       ->where('additions.to', '>=', $date)
       ->orWhere('additions.to', '=', 'null')
    
       ->get(); 
        
        $allinformations=json_encode($leagues);
        return $allinformations;
    }

    public function facultyDetails()
    {
       $allinformation=Facult::get();
      
    
       $allinformations=json_encode($allinformation);
       return  $allinformations;
        
    }
     public function adminDetails($code)
    {
          $teachertype=Designation::select('name')->where('type',1)->pluck('name')->toArray();
       
//         $teachertype = [
//             "PROFESSOR EMERITUS",
//             "PROFESSOR ( HONORARY)",
//             "UGC PROFESSOR",
//             "PROFESSOR",
//             "ASSOCIATE PROFESSOR",
//             "FELLOW (ASSOCIATE PROFESSOR)",
//             "ASSISTANT PROFESSOR",
//             "FELLOW (ASSISTANT PROFESSOR)",
//             "LECTURER",
//         ];
       $allteacher= Profile::select('dbuid','salaryID','fullNameNew','Designation','emaill','mobile_no','office_address','SRINDEX','officeSRINDEX','job_status','dept_code','dept_name')
        ->where('dept_code',$code)
        ->where('job_status',1)
        ->whereIn('Designation',$teachertype)
     
       
        
        ->get();
        if($allteacher)
        {
            $z_decode=[ "success"=> 1,];
            $z_decode['teachers']=$allteacher;
            $teacher=json_encode($z_decode);
            return $teacher;
        }
        else
        {
            return $teacher; 
        }
       
       
        


    }

    public function OfficerDetails($code)
    {
          $officer_types=Designation::select('name')->where('type',2)->pluck('name')->toArray();
        
//         $officer_types = [
//             "ADDITIONAL CHIEF ENGINEER",
//             "ADDITIONAL CHIEF MEDICAL OFFICER",
//             "ADDITIONAL REGISTRAR",
//             "ASSISTANT LIBRARIAN",
//             "Aditional Director (In charge)",
//             "Additional Director (In charge)",
//             "Additional Director",
//             "Assistant Director",
//             "ASSISTANT REGISTRAR",
//             "ASSISTANT CONTROLLER",
//             "ASSISTANT DIRECTOR (ACCOUNTS)",
//             "ASSISTANT DIRECTOR (AUDIT)",
//             "ASSISTANT DIRECTOR (BUDGET)",
//             "ASSISTANT DIRECTOR (MUSIC)",
//             "ASSISTANT DIRECTOR ( THEATRE)",
//             "ASSISTANT DIRECTOR (ACCOUNTS)",
//             "ASSISTANT DIRECTOR (AUDIT)",
//             "ASSISTANT ENGINEER",
//             "ASSISTANT ENGINEER ( CIVIL)",
//             "ASSISTANT ENGINEER ( ELECTRIC)",
//             "ASSISTANT HOUSE TUTOR",
//             "ASSISTANT LIBRARIAN",
//             "ASSISTANT NETWORK ADMINISTRATOR",
//             "ASSISTANT REGISTRAR",
//             "ASSISTANT SECREATRY",
//             "ASSISTANT TEACHER",
//             "ASSISTANT NETWORK ENGINEER",
//             "NETWORK ENGINEER",
//             "SECRETARY",          
//            "ASSISTANT DIRECTOR",
//             "senior house tutor",
//             "ASST. CONTROLLER OF EXAMINATIONS",
//             "AUDIT SUPERINTENDENT",
//             "CHIEF ENGINEER",
//             "CHIEF MEDICAL OFFICER",
//             "CHIEF PESH IMAM",
//             "COMPUTER COMPOSITION SUPERVISOR",
//             "COMPUTER OPERATION SUPERVISOR",
//             "CONTROLLER OF EXAMINATIONS",
//             "CURATOR",
//             "DATA ENTRY SUPERVISOR",
//             "DENTAL SURGEON",
//             "DEPUTY DIRECTOR OF ACCOUNTS",
//             "DEPUTY REGISTRAR",
//             "DEPUTY CHIEF CONSERVATION OFFICER",
//             "DEPUTY CHIEF EDUCATION OFFICER",
//             "DEPUTY CHIEF ENGINEER",
//             "DEPUTY CHIEF ENGINEER (CIVIL)",
//             "DEPUTY CHIEF ENGINEER (ELECTRIC)",
//             "DEPUTY CHIEF FIELD OFFICER",
//             "DEPUTY CHIEF HOUSE TUTOR",
//             "DEPUTY CHIEF INFORMATION OFFICER",
//             "DEPUTY CHIEF MEDICAL OFFICER",
//             "DEPUTY CHIEF PESH IMAM",
//             "DEPUTY CHIEF R. DEMONSTRATOR",
//             "DEPUTY CHIEF TECHNICAL OFFICER",
//             "DEPUTY CONTROLLER",
//             "DEPUTY CONTROLLER OF EXAMINATIONS",
//             "DEPUTY CURATOR",
//             "DEPUTY DIRECTOR",
//             "DEPUTY DIRECTOR (ACCOUNTS)",
//             "deputy director (music)",
//             "deputy director (theatre)",
//             "Senior INSTRUCTOR (TABLA)",
//             "DEPUTY DIRECTOR (AUDIT)",
//             "DEPUTY DIRECTOR OF ACCOUNTS",
//             "DEPUTY LIBRARIAN",
//             "DEPUTY LIBRARIAN (DOC)",
//             "DEPUTY REG.(SEC. IN-CHARGE)",
//             "DEPUTY REGISTRAR",
//             "DEPYTY CHIEF MEDICAL OFFICER",
//             "DIRECTOR",
//             "DIRECTOR INCHARGE",
//             "DIRECTOR OF ACCOUNTS",
//             "JUNIOR LIBRARIAN",
//             "MEDICAL OFFICER",
//             "nursing supervisor",
//             "OPERATION MANAGER",
//             "PART TIME DEPUTY DIRECTOR",
//             "PESH IMAM",
//             "PHYSICAL TEACHER",
//             "PRINCIPAL",
//             "PRINCIPAL COMPUTER MAIN. ENG.",
//             "PRINCIPAL INSTRUMENT ENGINEER",
//             "PRO-VICE CHANCELLOR",
//             "PROGRAMMER",
//              "Press Manager (Charge)",
//             "Press Manager",
//             "REGISTRAR",
//             "senior lab technician",
//             "SECRETARY ( DEPUTY REGISTRAR)",
//             "SECRETARY (IN CHARGE)",
//             "SECTION OFFICER",
//             "SENIOR ASSISTANT TEACHER",
//             "SENIOR COMPUTER OPERATOR",
//             "senior lab technician",
//             "SENIOR COMPUTER OPERATOR",
//             "SENIOR COMPUTER PROGRAMMER",
//             "SENIOR DEPUTY DIRECTOR",
//             "SENIOR DEPUTY DIRECTOR (PHYSICAL)",
//             "SENIOR DEPUTY DIRECTOR (SPORTS)",
//             "SENIOR INSTRUMENT ENGINEER",
//             "SENIOR MEDICAL OFFICER",
//             "SENIOR PESH IMAM",
//             "SENIOR PROGRAMMER",
//             "SENIOR STAFF NURSE",
//             "SENIOR TECHNICAL OFFICER",
//             "SENIOR VETERINARY SURGEON",
//             "SORTER (UDA EQV.)",
//             "SR. INST. ENGINEER (RESEARCH)",
//             "SYSTEM ANALYST",
//             "TECHNICAL OFFICER",
//             "TREASURER",
//             "VICE CHANCELLOR",
//             "VICE PRINCIPAL",
//             "ASSISTANT INSTRUMENT ENGINEER",
//             "COMPUTER OPERATION MANAGER",
//             "Chief Psychologist",
//             "Medical Psychologist",
//             "Enterni Co-Ordinetor",
//             "Chief Excutive Officer   ( CEO)",
//             "Medical Technoligist",
       
//         ];

        $allteacher= Profile::select('dbuid','salaryID','fullNameNew','Designation','emaill','mobile_no','office_address','SRINDEX','officeSRINDEX','job_status','dept_code','dept_name')
            ->where('dept_code',$code)
            ->where('job_status',1)
            ->whereIn('Designation',$officer_types)
            ->get();

        if($allteacher)
        {
            $z_decode=[ "success"=> 1,];
            $z_decode['officers']=$allteacher;
            $teacher=json_encode($z_decode);
            return $teacher;
        }
        else
        {
            return $teacher; 
        }
            
            
          
            

        

    }

    public function StaffDetails($code)
    {
          $stuff_types=Designation::select('name')->where('type',3)->pluck('name')->toArray();
        
//         $stuff_types = [
//             "ACCOUNTANT",
//             "ACCOUNTS ASSISTANT",
//             "ACCOUNTS ASSISTANT CUM CASHIER",
//             "ANIMAL BEARER",
//             "ANIMAL HOUSE CLEANER",
//             "ASSISTANT ACCOUNTANT",
//             "ASSISTANT PUMP DRIVER",
//             "ASSISTANT STORE KEEPER",
//             "AYEA",
//             "BEARER",
//             "BIBLIOGRAPHER CUM REF. AST.",
//             "BOOK BINDER",
//             "BOOK BINDER (LDA EQV.)",
//             "BOOK BINDER (SENIOR ASSISTANT)",
//             "BOOK CLEANER",
//             "BUS CONDUCTOR",
//             "CARETAKER",
//             "CARPENTER",
//             "CATALOGUER",
//             "CHAINMAN",
//             "CLAY MAKER",
//             "CLEANER",
//             "CLEANER (LDA EQV.)",
//             "CLEANER",
//             "COMMON ROOM BEARER",
//             "COMMON ROOM BEARER",
//             "COMPOSITOR",
//             "COMPUTER OPERATOR",
//             "COMPUTER CELL PEON",
//             "COMPUTER COMPOSITION OPERATOR",
//             "COMPUTER OPERATOR",
//             "COOK",
//             "CYCLOSTYLE MACHINE OPERATOR",
//             "DAPTORY",
//             "DENTAL TECHNICIAN",
//             "DISPENSARY ORDERLY",
//             "DISPENSARY PEON",
//             "DISTILLED WATER MISTRY",
//             "DRAFTS MAN",
//             "DRIVER",
//             "DRIVER SUPERVISOR",
//             "ELECTRIC HELPER",
//             "ELECTRIC LINEMAN",
//             "ELECTRICIAN",
//             "FARM ATTENDANT",
//             "FIELD ASSISTANT",
//             "FIELD WORKER",
//             "FIELD WORKER ( MALI)",
//             "FITTER",
//             "GALLERY ATTENDANT",
//             "GAS MISTRY",
//             "GENITOR",
//             "GENITOR (UDA.EQV.)",
//             "GROUNDS MAN",
//             "GROUNDS MAN",
//             "GUARD",
//             "GUARD (LDA EQV.)",
//             "GUARD (UDA EQV.)",
//             "GUARD/ATTENDENT",
//             "GUARD SUPERVISOR",
//             "HALL SUPERVISOR",
//             "HELPER TO CARPENTER",
//             "HELPER TO ELECTRICIAN",
//             "HELPER TO LINEMAN",
//             "HELPER TO MASON",
//             "HELPER TO MECHANIC",
//             "HELPER TO PLUMBER",
//             "HELPER TO TECHNICIAN",
//             "INSTRUCTOR (MUSIC)",
//             "INSTRUCTOR (TABLA)",
//             "JAMADAR",
//             "KHADEM",
//             "LABORATORY ATTENDANT",
//             "LABORATORY ATTENDANT (LDA EQV)",
//             "LABORATORY ATTENDANT (LDA EQV.)",
//             "LABORATORY ATTENDENT",
//             "LABORATORY TECHNICIAN",
//             "LABORATORY TECHNICIAN HELPER",
//             "LADIES BEARER",
//             "LD ASSISTANT",
//             "LD ASSISTANT EQV.",
//             "LIBRARY ASSISTANT",
//             "LIBRARY BEARER",
//             "LIGHT & MICK OPERATOR",
//             "LINEMAN",
//             "M.L.S.S",
//             "MACHINE HELPER",
//             "MACHINE HELPER (LDA EQV.)",
//             "MACHINE MAN",
//             "MALI",
//             "MALI (LDA EQV.)",
//             "MASON",
//             "MASON HELPER",
//             "MECHANIC",
//             "MITER READER",
//             "MOAZZEN",
//             "MOAZZEN (SR. ASSISTANT EQV.)",
//             "MODEL",
//             "MUSEUM ATTENDANT",
//             "MUSICIAN ( TABLA)",
//             "ODERLY PEON",
//             "OFFICE PEON",
//             "OFFICE ASSISTANT",
//             "OFFICE ATTENDANT",
//             "OFFICE BEARER",
//             "OFFICE PEON (LDA EQV.)",
//             "OFFICE PEON (LDA EQV.)",
//             "OIL MAN",
//             "ORDERLY PEON",
//             "ORDERLY PEON (LDA EQV.)",
//             "PATHOLOGICAL TECHNICIAN",
//             "PEON",
//             "PEON (LDA EQV)",
//             "PEON (LDA EQV.)",
//             "PHARMACIST",
//             "PHOTOCOPY OPERATOR",
//             "PHOTOMACHINE OPERATOR (SRA EQV.)",
//             "PLUMBER",
//             "PORTER",
//             "PUMP DRIVER",
//             "PUMP DRIVER (LDA EQV.)",
//             "RECORD KEEPER",
//             "RESEARCH FIELD GUARD",
//             "ROOM BEARER",
//             "ROOM BEARER (LDA EQV.)",
//             "RULING MACHINE MAN",
//              "Senior Assistant Cum Typist",
//             "SCAVENGER",
//             "SEMINAR BEARER",
//             "SEMINAR PEON",
//             "SEMINAR LIBRARY PEON",
//             "SENIOR ASSISTANT",
//             "SENIOR ASSISTANT ACCOUNT",
//             "SENIOR ASSISTANT  CUM TYPIST",
//             "SENIOR ASSISTANT  EQV.",
//             "SENIOR ASSISTANT EQV.",
//             "SENIOR DATA ENTRY OPERATOR",
//             "SENIOR ELECTRICIAN",
//             "SENIOR FIELD TECHNICIAN",
//             "SERVICE MAN",
//             "SKAVENGER",
//             "SORTER",
//             "STORE KEEPER",
//             "SURVEYOR",
//             "SWEEPER",
//             "SWEEPER(LDA EQV.)",
//             "TABLE BOY",
//             "UD ASSISTANT",
//             "UD ASSISTANT CUM TYPIST",
//             "UD ASSISTANT EQV.",
//             "VULCANIZER",
//             "WARD BOY",
//             "WELDER",
//             "WOOD PAINTER",
//             "WORD BOY",
//             "WORK ASSISTANT",
//             "WORKSHOP ATTENDANT",
//             "Security Guard",
//             "Ordrly Office Attendant",
//             "Gardener",
//              "Office Support Staff",
//                   "Office Sohayok",
//             "Security Guard",
//              "junior librarian",
//             "senior lab technician",
             
//             "UD Assistant Store Keeper(Acting)",
//             "Genaral Manager",
//              "Purchsing Manager",
//              "Sales Manager",
//             "Medical Technoligist",
//              "MIDWIFERY",
//         ];

        $allteacher= Profile::select('dbuid','salaryID','fullNameNew','Designation','emaill','mobile_no','office_address','SRINDEX','officeSRINDEX','job_status','dept_code','dept_name')
        ->where('dept_code',$code)
        ->where('job_status',1)
        ->whereIn('Designation',$stuff_types)
        ->get();

        if($allteacher)
        {
            $z_decode=[ "success"=> 1,];
            $z_decode['stuffs']=$allteacher;
            $teacher=json_encode($z_decode);
            return $teacher;
        }
        else
        {
            return $teacher; 
        }
            

    }

}
