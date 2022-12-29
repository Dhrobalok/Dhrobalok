<?php
 use App\Http\Controllers\EmployeeManagement\EmployeeRegistrationController;
 use App\Http\Controllers\LoanManagement\HouseLoanController;
 use App\Http\Controllers\OnlineBillUserController;
 use App\Http\Controllers\HomeController;

  Route :: get('/',function(){
    return view('frontend.index');
  });
  Route :: get('employee-signup',[EmployeeRegistrationController :: class,'register'])->name('employee.signup');
  Route :: post('employee-save',[EmployeeRegistrationController :: class,'save'])->name('employee.save');
  Route :: get('myaccount',[EmployeeRegistrationController :: class,'myaccount'])->name('myaccount');
  Route :: get('myaccount-edit/{employee_id}',[EmployeeRegistrationController :: class,'myaccount_edit'])->name('myaccount-edit');
  Route :: post('employee-update/{employee_id}',[EmployeeRegistrationController :: class,'myaccount_update'])->name('employee.update');

  Route :: post('loan-save',[HouseLoanController :: class,'save'])->name('house-loan.save');
  Route :: get('myaccount',[EmployeeRegistrationController :: class,'myaccount'])->name('myaccount');
  Route :: get('myaccount-edit/{employee_id}',[EmployeeRegistrationController :: class,'myaccount_edit'])->name('myaccount-edit');
  Route :: post('employee-update/{employee_id}',[EmployeeRegistrationController :: class,'myaccount_update'])->name('employee.update');
  Route :: get('user-bill-registration',[OnlineBillUserController :: class,'online_bill_registration'])->name('bill-user-registration');
  Route :: post('bill-user-save',[OnlineBillUserController :: class,'bill_user_save'])->name('bill-user.save');
  Route :: get('bill-user-profile',[OnlineBillUserController :: class,'bill_user_profile'])->name('bill-user-profile');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route :: get('employee-dashboard',[HomeController :: class,'employee_dashboard'])->name('employee-dashboard');
Route :: get('download-payslip/{generate_id}',[HomeController :: class,'download_payslip'])->name('download-payslip');
Route :: get('downloadgaturity/{generate_id}',[HomeController :: class,'download_gratunity'])->name('download-gaturity');



  
   