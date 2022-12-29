<?php
use App\Http\Controllers\ReportManager;
Route :: get('view-salary/{generate_id}',[ReportManager :: class,'view_salary_sheet'])->name('view-salary-sheet')->middleware('adminmidleware');
Route :: get('download-salary-sheet/{generate_id}',[ReportManager :: class,'download_salary_sheet'])->name('download-salary-sheet')->middleware('adminmidleware');
Route :: get('download-bank-advice/{generate_id}',[ReportManager :: class,'download_bank_advice'])->name('download-bank-advice')->middleware('adminmidleware');
Route :: get('trial-balance-report-start',[ReportManager :: class,'trial_balance_report_start'])->name('trial-balance-report-start')->middleware('adminmidleware');
Route :: get('download-trial-balance-pdf',[ReportManager :: class,'trial_balance_pdf'])->name('download-trial-balance')->middleware('adminmidleware');
Route :: get('download-balance-sheet',[ReportManager :: class,'generate_balance_sheet'])->name('download-balance-sheet')->middleware('adminmidleware');
Route :: get('view-balance-sheet',[ReportManager :: class,'view_balance_sheet'])->name('view-balance-sheet')->middleware('adminmidleware');
Route :: get('download-individual-pf-report',[ReportManager :: class,'individual_pf_report'])->name('download-individual-pf-report')->middleware('adminmidleware');
Route :: get('download-monthly-pf-statement',[ReportManager :: class,'providentFundReportDownload']) -> name('download-pf-monthly-statement')->middleware('adminmidleware');
Route :: get('download-yearly-pf-statement',[ReportManager :: class,'yearly_pf_statement']) -> name('download-pf-yearly-statement')->middleware('adminmidleware');
Route :: get('download-dept-wise-pf-report',[ReportManager :: class,'dept_wise_pf_report']) -> name('download-dept-wise-pf-report')->middleware('adminmidleware');
Route :: get('download-class-wise-pf-report',[ReportManager :: class,'class_wise_pf_report']) -> name('download-class-wise-pf-report')->middleware('adminmidleware');
Route :: get('individual-pf-report-start',[ReportManager :: class,'individual_pf_start'])->name('individual-pf-start')->middleware('adminmidleware');
Route :: get('yearly-pf-report-start',[ReportManager :: class,'yearly_pf_start'])->name('yearly-pf-start')->middleware('adminmidleware');
Route :: get('dept-wise-pf-report-start',[ReportManager :: class,'dept_wise_pf_report_start'])->name('dept-wise-pf-start')->middleware('permission:report provident');;
Route :: get('class-wise-pf-report-start',[ReportManager :: class,'class_wise_pf_report_start'])->name('class-wise-pf-start')->middleware('permission:report provident');
Route :: get('payroll-report',[ReportManager :: class,'general_payroll_report_start'])->name('payroll-report-start')->middleware('permission:download payroll');
Route :: post('download-payroll-report',[ReportManager :: class,'download_payroll_report']) -> name('download-payroll-report')->middleware('permission:download payroll');
Route :: get('cash-book-report-start',[ReportManager :: class,'cash_book_report_start'])->name('cash-book-report-start')->middleware('adminmidleware');
Route :: get('cash-book-download',[ReportManager :: class,'cash_book_report_download'])->name('cash-book-report-download')->middleware('adminmidleware');
Route :: get('export-employee-list-pdf',[ReportManager :: class,'export_employee_list_pdf'])->name('export-employee-list-pdf')->middleware('permission:report employees');
Route :: get('employee-list-excel',[ReportManager :: class,'export_employee_list_excel'])->name('employee-list-excel')->middleware('permission:report employees');
Route :: get('budget-control-report-start',[ReportManager :: class,'budget_control_start'])->name('budget-control-report-start')->middleware('permission:report accounts');
Route :: post('budget-control-report-pdf',[ReportManager :: class,'budget_control_pdf'])->name('budget-control-report-pdf')->middleware('permission:report accounts');
Route :: get('budget-check-report-start',[ReportManager :: class,'budget_check_report_start'])->name('budget-check-report-start')->middleware('permission:report accounts');
Route :: post('budget-check-report-pdf',[ReportManager :: class,'budget_check_report_pdf'])->name('budget-check-report-pdf')->middleware('permission:report accounts');
Route :: get('budget-report-pdf',[ReportManager :: class,'downloadBudgetReport'])->name('admin.budget.report.pdf');

Route :: post('profit_loss.duration',[ReportManager :: class,'profit_loss_duration'])->name('profit_loss.duration');

//Reconciliation Report
Route :: get('reconciliate-report',[ReportManager :: class,'reconciliationReport'])->name('admin.reports.reconciliation.index');
Route :: get('reconciliate-report-pdf',[ReportManager :: class,'reconciliationReportDownload'])->name('admin.reports.reconciliation.pdf');
//Cost Center reports 
Route :: get('cost-center-report',[ReportManager :: class,'costCenterReport'])->name('admin.report.cost-center.index')->middleware('permission:report accounts');
Route :: post('cost-center-report-generate',[ReportManager :: class,'costCenterReportGenerator'])->name('admin.report.cost-center.generate');
Route :: post('cost-center-report-pdf',[ReportManager :: class,'costCenterReportPdf'])->name('admin.report.cost-center.pdf')->middleware('permission:report accounts');

//Provident Fund Report
Route :: get('provident-fund-report',[ReportManager :: class,'providentFundReport'])->name('admin.report.pf.index');
//House Building Loan Report
Route :: get('house-building-loan-report',[ReportManager :: class,'house_building_loan_report'])->name('house-building-loan-report')->middleware('permission:view loans');
