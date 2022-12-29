<?php
use App\Http\Controllers\SalaryManagement\GradeController;
use App\Http\Controllers\SalaryManagement\PayScaleController;
use App\Http\Controllers\SalaryManagement\SalarySegmentController;
use App\Http\Controllers\SalaryManagement\SalaryGenerationController;

    Route :: prefix('salary-management')->group(function(){
       Route :: prefix('grade')->group(function(){
         Route :: get('/',[GradeController :: class,'index'])->name('admin.salary-management.grade.index')->middleware('permission:view employees');
         Route :: get('edit/{grade_id}',[GradeController :: class,'edit'])->name('admin.salary-management.grade.edit')->middleware('permission:edit employees');
         Route :: get('create',[GradeController :: class,'create'])->name('admin.salary-management.grade.create')->middleware('permission:create employees');
         Route :: post('store',[GradeController :: class,'store'])->name('admin.salary-management.grade.store');
         Route :: post('update/{grade_id}',[GradeController :: class,'update'])->name('admin.salary-management.grade.update')->middleware('permission:edit employees');
         Route :: post('delete',[GradeController :: class,'delete'])->name('admin.salary-management.grade.delete')->middleware('permission:delete employees');
       });
       Route :: prefix('pay-scale')->group(function(){
        Route :: get('/',[PayScaleController :: class,'index'])->name('admin.salary-management.payscale.index')->middleware('permission:view payroll');
        Route :: get('view/{pay_scale_id}',[PayScaleController :: class,'view'])->name('admin.salary-management.payscale.view')->middleware('permission:view payroll');
        Route :: get('create',[PayScaleController :: class,'create'])->name('admin.salary-management.payscale.create')->middleware('permission:create payroll');
        Route :: post('store',[PayScaleController :: class,'store'])->name('admin.salary-management.payscale.store');
        Route :: get('edit/{pay_scale_id}',[PayScaleController :: class,'edit'])->name('admin.salary-management.payscale.edit');
        Route :: post('update/{pay_scale_id}',[PayScaleController :: class,'update'])->name('admin.salary-management.payscale.update')->middleware('permission:edit payroll');
        Route :: post('delete',[PayScaleController :: class,'delete'])->name('admin.salary-management.payscale.delete')->middleware('permission:delete payroll');
        Route :: get('set-employee-payscale/{employee_id}',[PayScaleController :: class,'set_employee_payscale'])->name('admin.salary-management.payscale.set-employee-payscale')->middleware('permission:edit payroll');
        Route :: post('save-employee-payscale/{employee_id}',[PayScaleController :: class,'save_employee_payscale'])->name('admin.salary-management.save-employee-payscale');
      });
      Route :: prefix('salary-segment')->group(function(){
        Route :: get('/',[SalarySegmentController :: class,'index'])->name('admin.salary-segment.index')->middleware('permission:view payroll');
        Route :: get('edit/{segment_id}',[SalarySegmentController :: class,'edit'])->name('admin.salary-segment.edit')->middleware('permission:edit payroll');
        Route :: get('create',[SalarySegmentController :: class,'create'])->name('admin.salary-segment.create')->middleware('permission:create payroll');
        Route :: post('store',[SalarySegmentController :: class,'store'])->name('admin.salary-segment.store');
        Route :: post('update/{segment_id}',[SalarySegmentController :: class,'update'])->name('admin.salary-segment.update')->middleware('permission:edit payroll');
        Route :: post('delete',[SalarySegmentController :: class,'delete'])->name('admin.salary-segment.delete')->middleware('permission:delete payroll');
        Route :: get('segment-wise-distribution',[SalarySegmentController :: class,'segment_wise_distribution'])->name('admin.salary-segment.distribution');
        Route :: get('assign-segment-wise-amount/{employee_id}',[SalarySegmentController :: class,'assign_segment_wise_amount'])->name('admin.salary-segment.assign-segment-amount')->middleware('permission:edit payroll');
        Route :: post('save-segment-wise-amount',[SalarySegmentController :: class,'save_segment_wise_amount'])->name('admin.salary-segment.save-segment-amount');
        Route :: post('copy-payscale',[SalarySegmentController :: class,'copy_payscale'])->name('admin.salary-segment.copy-payscale')->middleware('permission:edit payroll');
      });
      Route :: get('salary-sheets',[SalaryGenerationController :: class,'index'])->name('admin.salary-generation.index')->middleware('permission:generate payroll');
      Route :: post('generate-salary',[SalaryGenerationController :: class,'generate'])->name('admin.generate-salary')->middleware('permission:generate payroll');
      Route :: get('generated-salary-preview',[SalaryGenerationController :: class,'generate_preview'])->name('admin.generate-salary.preview')->middleware('permission:view payroll');
      Route :: get('preview-salary-download/{month}/{year}',[SalaryGenerationController :: class,'downloadPreviewSalaryPdf'])->name('admin.salary.preview.download');
});