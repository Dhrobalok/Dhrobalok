<?php
use App\Http\Controllers\LoanManagement\LoanTypesController;
use App\Http\Controllers\LoanManagement\HouseLoanController;

Route :: prefix('house-loan')->group(function(){
    
    Route :: prefix('types')->group(function(){
        Route :: get('/',[LoanTypesController :: class,'index'])->name('admin.loan.types.index');
        Route :: get('create',[LoanTypesController :: class,'create'])->name('admin.loan.types.create');
        Route :: post('store',[LoanTypesController :: class,'store'])->name('admin.loan.types.store');
        Route :: post('update/{type_id}',[LoanTypesController :: class,'update'])->name('admin.loan.types.update');
        Route :: get('edit/{type_id}',[LoanTypesController :: class,'edit'])->name('admin.loan.types.edit');
        Route :: post('delete',[LoanTypesController :: class,'delete'])->name('admin.loan.types.delete');

    });

    Route :: get('/',[HouseLoanController :: class,'index'])->name('admin.loan.index')->middleware('permission:view loans');;
    Route :: get('edit/{loan_id}',[HouseLoanController :: class,'edit'])->name('admin.loan.edit')->middleware('permission:edit loans');
    Route :: post('update',[HouseLoanController :: class,'update'])->name('admin.loan.update');
    Route :: post('update-interest-rate',[HouseLoanController :: class,'update_interest_rate'])->name('admin.loan.update-interest-rate')->middleware('permission:edit loans');
    Route :: get('config-approval-panel',[HouseLoanController :: class,'set_approvers'])->name('admin.loan.set-approvers')->middleware('permission:approve_setup loans');
    Route :: post('save-approvers',[HouseLoanController :: class,'save_approvers'])->name('admin.loan.save-approvers');
    Route :: get('pending-loans',[HouseLoanController :: class,'pending_loans'])->name('admin.loan.pending-loans')->middleware('permission:view loans');
    Route :: get('approve/{loan_id}',[HouseLoanController :: class,'approve_loan'])->name('admin.loan.approve')->middleware('permission:approve loans');
    Route :: post('approve-confirm',[HouseLoanController :: class,'approve_confirm'])->name('admin.loan.approve-confirm');
    Route :: get('loan-account-setup',[HouseLoanController :: class,'loan_account_setup'])->name('admin.loan.account-setup')->middleware('permission:account_setup account');
    Route :: post('save-loan-account',[HouseLoanController :: class,'save_loan_account'])->name('admin.loan.save-loan-account');
    Route :: post('delete',[HouseLoanController :: class,'delete_loan'])->name('admin.loan.delete-loan');
    Route :: get('waiting-to-complete',[HouseLoanController :: class,'waitingToComplete'])->name('admin.loan.waiting.index');
    Route :: get('process-loan/{loan_id}',[HouseLoanController :: class,'processLoan'])->name('admin.loan.process');
    Route :: post('complete-loan-process',[HouseLoanController :: class,'completeLoanProcess'])->name('admin.loan.process.complete');
});