<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeType;
use App\Models\Designation;
use App\Models\Department;
use App\Models\User;
use App\Models\Employee;
use Hash;
use Str;
use Auth;
use App\Models\EmployeeSalary;
use App\Models\EmployeePFContributionRate;
use App\Models\EmployeeContactAddress;
use App\Models\EmployeeEmergencyContact;
use App\Models\EmployeeAcademicDetail;
use App\Models\EmployeePreviousWorkingExperienceDetail;
use App\Models\CompanySettings;
use App\Models\EmployeeDivision;
use App\Models\EmployeeSection;
use App\Models\Bank;
use App\Models\ChartOfAccount;


/**
 * This controller helps us to include a new employee in our system. This controller also helps us to modify/delete a employee record from our system. This controller is mainly used for frontend section.
 * This controller also contains download payslip function etc.
 */
class EmployeeRegistrationController extends Controller
{
    public function register()
    {
        //return "rashed registration";
        /**
         * Used for registering a new employee from the frontend.
         * @param Require no parameters.
         * @return A view object that contain a signup form for an employee registration process. A list of employees types, department and designation must be supplied on the view page.
         *
         */
        if(Auth :: user())
         return redirect() -> route('employee-dashboard');
         /*
        $employee_types = EmployeeType :: all();
        $designations = Designation :: all();
        $departments = Department :: all();
        */
        //$divisions  = EmployeeDivision :: all();
        //$departments = Department :: all();
        //$sections = EmployeeSection :: all();
       /// $designations = Designation :: all();
        //$banks = Bank :: all();
       // $data = array('divisions' => $divisions,'departments' => $departments,'sections' => $sections,'designations' => $designations,'banks' => $banks);
        return view('frontend.employee-signup');
        //return view('frontend.employee-signup',['types' => $employee_types,'designations' => $designations,'departments' => $departments]);
    }
    public function create()
    {
        $divisions  = EmployeeDivision :: all();
        $departments = Department :: all();
        $sections = EmployeeSection :: all();
        $designations = Designation :: all();
        $banks = Bank :: all();
        $data = array('divisions' => $divisions,'departments' => $departments,'sections' => $sections,'designations' => $designations,'banks' => $banks);
        return view('backend.admin.employee_management.employees.create',$data);
    }
    public function saveOldEmployee(Request $request)
    {
       
        
       // return "saveoldemployee";
              
            $request -> validate([

            'name' => ['required'],
            
            'email' => ['required','email','unique:users'],
          

           
           
            'mobile_no' => ['required','min:11','max:11'],
          

         ]);
        

        $fullname = $request -> name;
        $email = $request -> email;
        
       
        //$gender = $request -> gender;
        //$department=$request->department_id;
        //$date_of_birth = $request -> date_of_birth;
        $mobile_no = $request -> mobile_no;
       // $payscale=$request->payscale;
       
       
       // $userid=$request -> employee_number;
       /// $joining_date = $request -> joining_date;
       // $designation_id = $request -> designation_id;

       $image = $request -> file('employee_photo');
       $profile_photo_path = '';

       if($image)
       {
           $image_name = Str :: random(20);
           $extension = strtolower($image -> getClientOriginalExtension());
           $image_full_name = $image_name . '.' . $extension;
           $upload_path = 'employee_images/';
           $image_url = $upload_path.$image_full_name;
           $image -> move($upload_path,$image_full_name);
           $profile_photo_path = $image_url;
       }


        $user = new User();
        $user -> name = $fullname;
        $user -> email = $email;
        $user -> status = 0;
    
        $paswword=$request->password;
        $user -> password = Hash::make($paswword);
        $user -> save();

        $employee = new Employee();
        $employee->name= $fullname;
        $employee->email=$email;
       
        $employee->mobile_no=$mobile_no;
        
        
        $employee->employee_photo=$profile_photo_path;
       

        

       

        $employee->save();
        /*
        $emergency_contact=new EmployeeEmergencyContact();
        $emergency_contact->employee_id=$roll;
        $emergency_contact->contact_name=$fullname;
        $emergency_contact->mobile_number=$mobile_no;
        $emergency_contact->save();
        */


         
        
       // $this ->saveContactAddresses($request,$employee);
       // $this -> saveAcademicDetails($request,$employee);
       // $this -> savePreviousWorkingExperienceDetails($request,$employee);

        return redirect() -> route('employesignup')->with('success-message','New employee added successfully');
    }
    public function edit($employee_id)
    {
       // return $employee_id;
        $employee = Employee :: find($employee_id);
        $departments = Department :: all();
        $designations = Designation :: all();
        $divisions = EmployeeDivision :: all();
        $sections = EmployeeSection :: all();
        $banks = Bank :: all();
        $data = array('employee' => $employee,'divisions' => $divisions,'departments' => $departments,'sections' => $sections,'designations' => $designations,'banks' => $banks);
        return view('backend.admin.employee_management.employees.edit',$data);
    }
    public function update(Request $request,$employee_id)
    {


        $request -> validate([

            'name' => ['required'],
            'employee_number' => ['required'],
            //'nid_number' => ['required'],
            //'tin_number' => ['required'],
            'date_of_birth' => ['required'],
            'joining_date' => ['required'],
            //'present_street_address1' => ['required'],
            //'present_city' =>['required'],
            //'present_zip_code' => ['required'],
            //'permanent_street_address1' => ['required'],
            //'permanent_city' =>['required'],
            //'permanent_zip_code' => ['required'],
            //'emergency_contact_name' => ['required'],
            //'emergency_mobile_number' => ['required'],
            //'relationship' => ['required'],
            //'emergency_street_address1' => ['required'],
           // 'emergency_city' => ['required'],
           // 'emergency_zip_code' => ['required'],
            'mobile_no' => ['required','min:11','max:11'],
            //'account_no' => ['required']
        ]);

        $employee = Employee :: find($employee_id);
        $user = User :: find($employee -> user_id);
        $addresses = $employee -> getAddress;
        $emergency_contact = $employee -> getEmergencyContact;
        $present_address = $addresses[0];
        $permanent_address = $addresses[1];
        $emergency_address = $addresses[2];

        $fullname = $request -> name;
        $email = $request -> email;
        $gender = $request -> gender;
        $nid_number = $request -> nid_number;
        $tin_number = $request -> tin_number;
        $date_of_birth = $request -> date_of_birth;
        $mobile_no = $request -> mobile_no;
        $employee_number = $request -> employee_number;
        $joining_date = $request -> joining_date;
        $designation_id = $request -> designation_id;
        $division_id = $request -> division_id;
        $department_id = $request -> department_id;
        $section_id = $request -> section_id;
        $bank_id = $request -> bank_id;
        $account_no = $request -> account_no;
        $image = $request -> file('employee_photo');
        $profile_photo_path = $employee -> employee_photo;

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $profile_photo_path = $image_url;
        }
        $employee -> update([

            'name' => $fullname,
            'gender' => $gender,
            'mobile_no' => $mobile_no,
            'date_of_birth' => $date_of_birth,
            //'nid_number' => $nid_number,
            //'tin_number' => $tin_number,
            'designation_id' => $designation_id,
            'department_id' => $department_id,
            'employee_photo' => $profile_photo_path,
            'joining_date' => $joining_date,
            //'employee_reg_id' => $employee_number,
            'user_id' => $user ->id,
            //'bank_id' => $bank_id,
           // 'division_id' => $division_id,
           // 'section_id' => $section_id,
           // 'account_no' => $account_no
        ]);
        $user -> update([
            'name' => $fullname
        ]);
        $present_address -> update([
            'street_address1' => $request -> present_street_address1,
            'street_address2' => $request -> present_street_address2,
            'city' => $request -> present_city,
            'zip_code' => $request -> present_zip_code
        ]);
        $permanent_address -> update([
            'street_address1' => $request -> permanent_street_address1,
            'street_address2' => $request -> permanent_street_address2,
            'city' => $request -> permanent_city,
            'zip_code' => $request -> permanent_zip_code
        ]);
        $emergency_address -> update([
            'street_address1' => $request -> emergency_street_address1,
            'street_address2' => $request -> emergency_street_address2,
            'city' => $request -> emergency_city,
            'zip_code' => $request -> emergency_zip_code
        ]);
        $emergency_contact -> update([
            'contact_name' => $request -> emergency_contact_name,
            'mobile_number' => $request -> emergency_mobile_number,
            'relation' => $request -> relationship
        ]);

        return redirect() -> route('admin.employee-management.employees.index')->with('success-message','Employee info updated successfully');
    }
    public function save(Request $request)
    {



        /**
         * This function is used for saving a newly created employee which is submitted by an employee from the frontend.
         * Require a list of parameters.
         *
         * @param Employee Name(name)
         * @param  Email Address(email). Email must be unique.
         * @param Registration Number(registration_no)
         * @param Mobile Number(mobile_no). Must be a valid mobile number.
         * @param Joining Date(join_date).
         * @param Retired Date(retired_date).
         * @param Employee Department(department)
         * @param Employee Designation(designation)
         * @param Employee Type/Class(employee_type)
         * @param Password. That is used  for login/signIn process.
         * @param Employee Photo(file_upload_photo). If you want to auto resize an image with a constant resolution, please use intervention/image package or any. For more details about intervention/image package, visit:
         * http://image.intervention.io/
         * @return Redirect to the employee signup page with a success message.
         */

        $request -> validate([

            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'nid_number' => ['required'],
            'tin_number' => ['required'],
            'date_of_birth' => ['required'],
            'present_street_address1' => ['required'],
            'present_city' =>['required'],
            'present_zip_code' => ['required'],
            'permanent_street_address1' => ['required'],
            'permanent_city' =>['required'],
            'permanent_zip_code' => ['required'],
            'emergency_contact_name' => ['required'],
            'emergency_mobile_number' => ['required'],
            'relationship' => ['required'],
            'emergency_street_address1' => ['required'],
            'emergency_city' => ['required'],
            'emergency_zip_code' => ['required'],
            'mobile_no' => ['required','min:11','max:11'],
            'employee_photo' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'certifications' => ['required']
        ]);

        $employee = $this ->saveEmployee($request);
        //Save employee info into the Provident fund contribution table

        $newProvidentFundContributor = new EmployeePFContributionRate();
        $newProvidentFundContributor -> employee_id = $employee -> id;
        $newProvidentFundContributor -> pf_contribution_rate = 0;
        $newProvidentFundContributor -> contributed_amount = 0;
        $newProvidentFundContributor -> save();
        return redirect() -> route('frontend.employee-signup.complete')->with('employee_id',$employee -> id);
    }

    public function saveEmployee(Request $request)
    {



        $fullname = $request -> name;
        $email = $request -> email;
        $gender = $request -> gender;
        $nid_number = $request -> nid_number;
        $tin_number = $request -> tin_number;
        $date_of_birth = $request -> date_of_birth;
        $mobile_no = $request -> mobile_no;
        $image = $request -> file('employee_photo');
        $profile_photo_path = '';

        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $profile_photo_path = $image_url;
        }

        $user = new User();
        $user -> name = $fullname;
        $user -> email = $email;

        $user -> password = Hash :: make(Str :: random(8));
        $user -> save();

        $employee = Employee :: create([
                'name' => $fullname,
                'gender' => $gender,
                'mobile_no' => $mobile_no,
                'date_of_birth' => $date_of_birth,
                'nid_number' => $nid_number,
                'tin_number' => $tin_number,
                'user_id' => $user -> id,
                'employee_photo' => $profile_photo_path,
                'status' => 0
         ]);

        $this -> saveContactAddresses($request,$employee);
        $this -> saveAcademicDetails($request,$employee);
        $this -> savePreviousWorkingExperienceDetails($request,$employee);
        return $employee;
    }

    public function saveContactAddresses(Request $request,Employee $employee)
    {
       // return "fggfdgdg";
        $employee_id = $employee -> id;



            EmployeeContactAddress :: create([

                'employee_id' => $employee_id,

            ]);
            EmployeeContactAddress :: create([

                'employee_id' => $employee_id,

            ]);
            EmployeeContactAddress :: create([

                'employee_id' => $employee_id,

            ]);

            EmployeeEmergencyContact :: create([

            'employee_id' => $employee_id,

           ]);

    }

    public function saveAcademicDetails(Request $request,Employee $employee)
    {

        $employee_id = $employee -> id;

        for($i = 0; $i < count($certifications); $i++)
        {
            EmployeeAcademicDetail :: create([

                'employee_id' => $employee_id,

            ]);
        }
    }

    public function savePreviousWorkingExperienceDetails(Request $request,Employee $employee)
    {
        $organization_names = $request -> organization_names;
        $job_positions = $request -> job_positions;
        $from_dates = $request -> from_dates;
        $to_dates = $request -> to_dates;
        $job_responsibilities = $request -> job_responsibilities;
        $employee_id = $employee -> id;

       if(!is_null($organization_names))
       {
        for($i = 0; $i < count($organization_names); $i++)
        {
            EmployeePreviousWorkingExperienceDetail :: create([

                'employee_id' => $employee_id,

            ]);
        }
       }
    }

    public function myaccount()
    {
        /**
         * This function is used for rendering currently logged in employee information. This rendering process we used in the intial development, but in further it is not used in.
         * @param Required no parameters.
         * @return a view object with employee information
         */
        $current_user = Auth :: user();
        $employee = Employee :: where('user_id',$current_user -> id)->first();
        return view('frontend.myaccount',['employee' => $employee]);
    }
    public function myaccount_edit($employee_id)
    {
        /**
         * This function is used for editing currently logged in employee information. This editing process we used in the intial development, but in further it is not used in.
         * @param Required only one parameter called employee id.
         * @return a view object with employee information
         */
        $employee = Employee :: find($employee_id);
        $types = EmployeeType :: all();
        $departments = Department :: all();
        $designations = Designation :: all();

        return view('frontend.myaccount-edit',['employee' => $employee,'types' => $types,'designations' => $designations,'departments' => $departments]);
    }
    public function myaccount_update(Request $request,$employee_id)
    {
           // return $employee_id;
        /**
         * This function is used for update an employee information which are supplied from the frontend.
         * Require a list of parameters.
         *
         * @param Employee Name(name)
         * @param  Email Address(email). Email must be unique.
         * @param Registration Number(registration_no)
         * @param Mobile Number(mobile_no). Must be a valid mobile number.
         * @param Joining Date(join_date).
         * @param Retired Date(retired_date).
         * @param Employee Department(department)
         * @param Employee Designation(designation)
         * @param Employee Type/Class(employee_type)
         * @param Password. That is used  for login/signIn process.
         * @param Employee Photo(file_upload_photo). If you want to auto resize an image with a constant resolution, please use intervention/image package or any. For more details about intervention/image package, visit:
         * http://image.intervention.io/
         * @return Redirect to the employee signup page with a success message.
         */
        $request -> validate([
            'name' => ['required'],
            'email' => ['required','email'],

            'mobile_no' => ['required','min:11','max:11'],
            'join_date' => ['required'],


        ]);


         $employee = Employee :: find($employee_id);
         //return $employee;

        $fullname = $request -> name;
        $email = $request -> email;
        $mobile_no = $request -> mobile_no;
        $image = $request -> file('file_upload_photo');
        $join_date = $request -> join_date;
        //$retired_date = $request -> retired_date;
        $password = $request -> password;
        //$employee_type = $request -> employee_type;
        $department = $request -> department;
        $designation = $request -> designation;
        //$registration_no = $request -> registration_no;
       // $account_no = $request -> account_no;

        $newUser = User :: where('id',$employee -> user_id)->first();
        $newUser -> name = $fullname;
        $newUser -> email = $email;
        $newUser -> save();

        $employee -> name = $fullname;
        $employee -> mobile_no = $mobile_no;
        $employee -> designation_id = $designation;
        $employee -> department_id = $department;
        //$employee -> type_id = $employee_type;
        $employee -> joining_date = $join_date;


        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'employee_images/';
            $image_url = $upload_path.$image_full_name;
            $image -> move($upload_path,$image_full_name);
            $employee -> employee_photo = $image_url;

        }
        $employee -> save();

        return redirect()->back()->with('success_message','Employee record updated successfully');
    }
    public function index()
    {
        /**
         *This function is used for rendering a list of employees from the admin panel.
         *@param Required no parameters.
         *@return a view object contains a list of employees for rendering.
         */
       $employees = Employee :: all();
       return view('backend.admin.employee_management.employees.index',['employees' => $employees]);
    }
    public function view($employee_id)
    {

        //return $employee_id;
        /**
         *This function is used for rendering a specific employee from the admin panel.
         *@param Required only one parameter called employee id.
         *@return a view object contains information about a specific employee.
         */
         $employee = Employee :: find($employee_id);

        return view('backend.admin.employee_management.employees.view',['employee' => $employee]);
    }
    public function approve($employee_id)
    {
     
         /**
         *This function is used for approving a specific employee from the admin panel.
         *Here approval process is very simple. Just updating the status field with the value 1.
         *@param Required only one parameter called employee id.
         *@return Redirect to employees index page with success message.
         */
        $employee = Employee :: find($employee_id);
        $employee -> status = 1;
        $employee -> save();
        return redirect()->back()->with('message','Employee approved successfully');
    }

    public function delete(Request $request)
    {
        /**
         *This function is used for removing/deleting a specific employee from the admin panel.

         *@param Required only one parameter called employee id.
         *@return Nothing.
         */
        $employee = Employee :: find($request -> employee_id);
        $user  = User :: find($employee -> user_id);
        $user -> delete();
        $employee -> delete();
    }

    public function download_payslip($generate_id)
    {
       //return $generate_id;
        /**
         * This function is used for generation and downloading a specific pay slip.
         * @param Required only one parameter called generate id.
         * @return Return a generated payslip in pdf format.
         */
        $salary_generate = EmployeeSalary :: find($generate_id);
        $generate_info = $salary_generate -> generate_info;
        $content = view('backend.admin.employee_management.employees.pay_slip_download',['salary_generate' => $salary_generate]);
        $salary_sheet = new \Mpdf\Mpdf();
        $salary_sheet -> WriteHtml($content);
        $salary_sheet -> output('payslip-'.$generate_info -> month.''.$generate_info -> year.'.pdf','D');
    }
    public function view_payslip($generate_id)
    {
       // return $generate_id;
        /**
         * This function is used for viewing a payslip of a specific month and year basis.
         * This function mainly used in the backend section
         * @param Required only one parameter called generate id.
         * @return Return a view object contains payslip information.
         */
        $salary_generate = EmployeeSalary :: find($generate_id);
        return view('backend.admin.employee_management.employees.pay_slip_view',['salary_generate' => $salary_generate]);
    }

    public function downloadEmployeeDetailPdf($employee_id)
    {


        set_time_limit(0);
        ini_set("pcre.backtrack_limit", "5000000");
        $company = CompanySettings :: find(1);
        $employee = Employee :: find($employee_id);
        $content = view('backend.admin.employee_management.employees.employee_detail_pdf',['company' => $company,'employee' => $employee]);
        $pdf = new \Mpdf\Mpdf();
        $pdf -> WriteHtml($content);
        $pdf -> output(''.$employee -> name.'.pdf','D');
    }

    public function addMoreCertification()
    {
        return view('backend.admin.partial_pages.educational_record_as_per_row');
    }
    public function addMoreExperience()
    {
        return view('backend.admin.partial_pages.previous_experience_record_as_per_row');
    }
    public function signupComplete()
    {
        return view('frontend.employee_signup_complete');
    }

    public function employee_aprove($employee_id)
    {
        
       //$update=User::where('id',$employee_id)
              // ->update('status'=>1);
      $update=User::where('student_id', $employee_id)
       ->update([
           'status' => 1
        ]);
     return redirect()->back();
        //return $employee_id;
        //return view('frontend.employee_signup_complete');
    }

    public function adminlogin()
    {
        return view('auth.adminlogin.adminLogin');
    }
    public function fellowship()
    {
        $employee=User::where('status',1)->get();
        $chartaccount=ChartOfAccount::all();

        return view('backend.admin.Felloship.fellowship',['employee'=>$employee,'chartofaccount'=>$chartaccount]);
    }
    public function downloadpayslip()
    {
       // return "cxvxcvx";
        $content =view('backend.admin.RuPayslip.downloadpayslip');
        $pdf = new \Mpdf\Mpdf();
        $pdf -> WriteHtml($content);
        $pdf -> output('Payslip.pdf','D');
    }

    public function payslip()
    {
        $employee=User::where('status',1)->get();
      return view('backend.admin.RuPayslip.payslipadd',['employee'=>$employee]);
    }
}
