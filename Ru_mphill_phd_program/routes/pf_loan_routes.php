<?php
use App\Http\Controllers\ProvidentFundLoanController;

    Route :: prefix('/pf-loan')->group(function(){
      Route :: get('/',[ProvidentFundLoanController :: class,'index'])->name('admin.pf-loan.index');
      //  Route :: post('payscales',[PensionUserController :: class,'get_payscales'])->name('get-payscales');
      //  Route :: post('payscale-details',[PensionUserController :: class,'get-payscale-details'])->name('get-payscale-details');
       //Route :: get('get-coa-info',[ProvidentFundLoanController :: class,'get_coa_info'])->name('get-coa-info');
       Route :: get('create',[ProvidentFundLoanController :: class,'create'])->name('admin.pf-loan.create');
       Route :: post('store',[ProvidentFundLoanController :: class,'store'])->name('admin.pf-loan.store');
       Route :: get('edit/{id}',[ProvidentFundLoanController :: class,'edit'])->name('admin.pf-loan.edit');
       Route :: patch('update/{id}',[ProvidentFundLoanController :: class,'update'])->name('admin.pf-loan.update');
       Route :: get('view/{id}',[ProvidentFundLoanController :: class,'view'])->name('admin.pf-loan.view');
       Route :: post('delete',[ProvidentFundLoanController :: class,'delete'])->name('admin.pf-loan.delete');
       Route :: get('config-app-panel',[ProvidentFundLoanController :: class,'approval_panel_config'])->name('admin.pf-loan.approval-panel-config');
       Route :: post('save-approval-panel',[ProvidentFundLoanController :: class,'approval_panel_save'])->name('admin.pf-loan.approval.save');
       Route :: get('approvable-loans',[ProvidentFundLoanController :: class,'pending_loans'])->name('admin.pf-loan.pending-loans');
       Route :: get('approve/{loan_id}',[ProvidentFundLoanController :: class,'approve_loan'])->name('admin.pf-loan.approve');
       Route :: post('approve-pf-loan-confirm',[ProvidentFundLoanController :: class,'approve_confirm'])->name('admin.pf-loan.approve-confirm');
    });