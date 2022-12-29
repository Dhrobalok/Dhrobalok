<?php
use App\Http\Controllers\AjaxController;

Route :: prefix('ajax')->group(function(){
    
    Route :: get('get-payscales',[AjaxController :: class,'payscales'])->name('ajax.get-payscales');
    Route :: get('get-payscale-details',[AjaxController :: class,'payscale_details'])->name('ajax.get-payscale-details');
    Route :: post('get-loans-info',[AjaxController :: class,'loans'])->name('ajax.loans');
    Route :: post('get-employees',[AjaxController :: class,'employees'])->name('ajax.employees');
    Route :: get('accounts',[AjaxController :: class,'get_accounts'])->name('ajax.get-accounts');
    Route :: get('cheque-pages',[AjaxController :: class,'cheque_pages'])->name('ajax.cheque-pages');
    Route :: get('add-transfer-entry',[AjaxController :: class,'add_transfer_entry'])->name('ajax.add-transfer-entry');
    Route :: post('get-accounts',[AjaxController :: class,'getAccountsBasedOnSearchTerm'])->name('ajax.search-term-matched-accounts');
    Route :: get('calculate-emi-list',[AjaxController :: class,'calculateEMIList'])->name('ajax.calculate-emi-list');
    Route :: get('generate-budget-table',[AjaxController :: class,'generateBudgetTable'])->name('ajax.budget.generate-table');
    Route :: get('get-employee-payscale',[AjaxController :: class,'getEmployeePayscale'])->name('ajax.get-employee-payscale');
    Route :: get('get-cost-center-options',[AjaxController :: class,'getCostCenterOptions'])->name('ajax.get-cost-center-options');
    Route :: get('fetch-cashbook-records',[AjaxController :: class,'fetchCashBookRecords'])->name('ajax.fetch-cashbook-records');
    Route :: get('cashbook-adjustment-entry',[AjaxController :: class,'cashBookAdjustmentEntry'])->name('ajax.cashbook-adjustment-entry');
    Route :: get('payroll-report-options',[AjaxController :: class,'getPayrollReportOptions'])->name('ajax.payroll-report-options');
    
});