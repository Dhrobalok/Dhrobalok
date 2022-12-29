<?php
use App\Http\Controllers\EmployeeManagement\EmployeeTypeController;
use App\Http\Controllers\EmployeeManagement\EmployeeDepartmentController;
use App\Http\Controllers\EmployeeManagement\EmployeeDesignationController;
use App\Http\Controllers\EmployeeManagement\EmployeeRegistrationController;
use App\Http\Controllers\EmployeeManagement\EmployeeDivisionController;
use App\Http\Controllers\EmployeeManagement\EmployeeSectionController;

    Route :: prefix('employee-management')->group(function(){
       Route :: prefix('type')->group(function(){
         Route :: get('/',[EmployeeTypeController :: class,'index'])->name('admin.employee-management.employee-type.index');
         Route :: get('view/{type_id}',[EmployeeTypeController :: class,'view'])->name('admin.employee-management.employee-type.view');
         Route :: get('create',[EmployeeTypeController :: class,'create'])->name('admin.employee-management.employee-type.create');
         Route :: post('store',[EmployeeTypeController :: class,'store'])->name('admin.employee-management.employee-type.store');
         Route :: post('update/{type_id}',[EmployeeTypeController :: class,'update'])->name('admin.employee-management.employee-type.update');
         Route :: post('delete',[EmployeeTypeController :: class,'delete'])->name('admin.employee-management.employee-type.delete');
       });
       Route :: prefix('department')->group(function(){
        Route :: get('/',[EmployeeDepartmentController :: class,'index'])->name('admin.employees.department.index');
        Route :: get('edit/{department_id}',[EmployeeDepartmentController :: class,'edit'])->name('admin.employees.department.edit');
        Route :: get('create',[EmployeeDepartmentController :: class,'create'])->name('admin.employees.department.create');
        Route :: post('store',[EmployeeDepartmentController :: class,'store'])->name('admin.employees.department.store');
        Route :: post('update/{department_id}',[EmployeeDepartmentController :: class,'update'])->name('admin.employees.department.update');
        Route :: post('delete',[EmployeeDepartmentController :: class,'delete'])->name('admin.employees.department.delete');
      });
      Route :: prefix('designation')->group(function(){
        Route :: get('/',[EmployeeDesignationController :: class,'index'])->name('admin.employee-management.employee-designation.index');
        Route :: get('edit/{designation_id}',[EmployeeDesignationController :: class,'edit'])->name('admin.employee-management.employee-designation.edit');
        Route :: get('create',[EmployeeDesignationController :: class,'create'])->name('admin.employee-management.employee-designation.create');
        Route :: post('store',[EmployeeDesignationController :: class,'store'])->name('admin.employee-management.employee-designation.store');
        Route :: post('update/{designation_id}',[EmployeeDesignationController :: class,'update'])->name('admin.employee-management.employee-designation.update');
        Route :: post('delete',[EmployeeDesignationController :: class,'delete'])->name('admin.employee-management.employee-designation.delete');
      });
     Route :: prefix('division')->group(function(){
        Route :: get('/',[EmployeeDivisionController :: class,'index'])->name('admin.employees.division.index');
        Route :: get('create',[EmployeeDivisionController :: class,'create'])->name('admin.employees.division.create');
        Route :: post('store',[EmployeeDivisionController :: class,'store'])->name('admin.employees.division.store');
        Route :: get('edit/{division_id}',[EmployeeDivisionController :: class,'edit'])->name('admin.employees.division.edit');
        Route :: post('update/{division_id}',[EmployeeDivisionController :: class,'update'])->name('admin.employees.division.update');
        Route :: post('delete',[EmployeeDivisionController :: class,'delete'])->name('admin.employees.division.delete');
     });
     Route :: prefix('section')->group(function(){
      Route :: get('/',[EmployeeSectionController :: class,'index'])->name('admin.employees.section.index');
      Route :: get('create',[EmployeeSectionController :: class,'create'])->name('admin.employees.section.create');
      Route :: post('store',[EmployeeSectionController :: class,'store'])->name('admin.employees.section.store');
      Route :: get('edit/{section_id}',[EmployeeSectionController :: class,'edit'])->name('admin.employees.section.edit');
      Route :: post('update/{section_id}',[EmployeeSectionController :: class,'update'])->name('admin.employees.section.update');
      Route :: post('delete',[EmployeeSectionController :: class,'delete'])->name('admin.employees.section.delete');
   });
     
     Route :: prefix('employees')->group(function(){
       Route :: get('/',[EmployeeRegistrationController :: class, 'index'])->name('admin.employee-management.employees.index')->middleware('adminmidleware');
       Route :: get('view/{employee_id}',[EmployeeRegistrationController :: class,'view'])->name('admin.employee-management.employees.view')->middleware('adminmidleware');
       Route :: get('approve/{employee_id}',[EmployeeRegistrationController :: class,'approve'])->name('admin.employee-management.employees.approve')->middleware('adminmidleware');
      //  Route :: get('delete/{employeeid}',[EmployeeRegistrationController :: class,'delete'])->name('admin.employee-management.employees.delete')->middleware('adminmidleware');
       Route :: get('view-payslip/{generate_id}',[EmployeeRegistrationController :: class,'view_payslip'])->name('admin.view-payslip');
       Route :: get('download-payslip/{generate_id}',[EmployeeRegistrationController :: class,'download_payslip'])->name('admin.download-payslip');
       Route :: get('create',[EmployeeRegistrationController :: class,'create'])->name('admin.employees.create');
      // Route :: post('store-old-employee',[EmployeeRegistrationController :: class,'saveOldEmployee'])->name('admin.employees.old-employee-store');
       Route :: get('edit/{employee_id}',[EmployeeRegistrationController :: class,'edit'])->name('admin.employees.edit');
       Route :: post('update/{employee_id}',[EmployeeRegistrationController :: class,'update'])->name('admin.employees.update');
       Route :: get('aprove/{employee_id}',[EmployeeRegistrationController :: class,'employee_aprove'])->name('admin.employees.aprove');
     });
  });