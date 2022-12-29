<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FdrController;
use App\Http\Controllers\GtcLeadger;
use App\Http\Controllers\FdrnewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudgetAllocationController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EmployeeManagement\EmployeeRegistrationController;
use App\Http\Controllers\Leadger_gtc;
use App\Http\Controllers\ReportManager;
use App\Http\Controllers\VoucherManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
   
    Artisan::call('route:cache');
    // return what you want
});


     /* Employee signup */
    
     Route :: get('employesignup',[EmployeeRegistrationController :: class, 'register'])->name('employesignup');

     Route :: post('store-old-employee',[EmployeeRegistrationController :: class,'saveOldEmployee'])->name('employee.store');

     /* Employee signup */



   include('frontend_routes.php');
  Route :: group(['prefix' => 'admin','middleware' => ['auth']],function(){
  Route :: get('/',[DashboardController :: class,'index'])->name('backend.admin.index');

    include('approver_management_routes.php');
    include('partial_payment.php');
    include('cost_center_routes.php');
    include('debit_voucher_routes.php');
    include('expenditure_routes.php');
    include('transfer_voucher_routes.php');
    include('journal_voucher_routes.php');
    include('credit_voucher_routes.php');
    include('approve_routes.php');
    include('validation_routes.php');
    include('voucher_management_routes.php');
    include('employee_management_routes.php');
    include('salary_management_routes.php');
    include('banks_routes.php');
    include('cheque_books.php');
    include('ajax_routes.php');
    include('loan_routes.php');
    include('festival_routes.php');
    include('report_routes.php');
    include('bank_input_routes.php');
    include('pension_user_routes.php');
    include('pension_process_routes.php');
    include('gratuity_user_routes.php');
    include('gratuity_process_routes.php');
    include('pf_contribution_routes.php');
    include('online_bill_routes.php');
    include('bill_voucher_routes.php');
    include('customer_routes.php');
    include('vendor_routes.php');
    include('products_routes.php');
    include('tax_routes.php');
    include('payment_terms_routes.php');
    include('payroll_settings_routes.php');
    include('pf_loan_routes.php');
    include('company_setup_routes.php');


    /* advance voucher and mail */

   //Route::get('voucher','')
  // Route :: get('mail',[DashboardController :: class,'sendmail'])->name('view.mail');
  /*
  Invoice report  

  */
        Route :: get('invoice.report',[Leadger_gtc :: class,'bulk_invoice'])->name('invoice');
        Route :: post('invoice.report',[Leadger_gtc :: class,'bulk_invoice_download'])->name('bulk.invoice');
        
        Route :: get('profit_loss',[ReportManager :: class,'profit_loss'])->name('profitloss.report');

    /*
  Invoice report  
  */

/* GTC LEDEGER*/
    Route :: get('gtc.report',[Leadger_gtc :: class,'gtc_report'])->name('gtc.report');
    Route :: post('gtc.report',[Leadger_gtc :: class,'download'])->name('gtc.download');
    Route :: get('gtc_create',[Leadger_gtc :: class,'create'])->name('gtc.create');
    Route :: get('gtc_index',[Leadger_gtc :: class,'index'])->name('gtc.index');
    Route :: post('gtc_store',[Leadger_gtc :: class,'store'])->name('gtc.store');
    Route :: post('gtc_payment',[Leadger_gtc :: class,'payment'])->name('gtcpayment');

/* GTC LEDEGER*/
Route :: get('description',[VoucherManagementController :: class,'description_find'])->name('description.find');

    Route :: get('advancebudget',[BudgetController :: class,'advancebudget_index'])->name('admin.advancebudget.index');


    Route :: get('advance_voucher',[BudgetController :: class,'advancevoucher'])->name('advancevoucher');
    Route :: get('advancebudgetindex',[BudgetController :: class,'advancebudget_index'])->name('advancebudget.index');

    Route :: post('advancebudgetstore',[BudgetController :: class,'advancebudget_store'])->name('advancebudget.store');
    Route :: post('advance_voucher_store',[BudgetController :: class,'advancevoucher_store'])->name('advancevoucher.store');
    Route :: get('advancebudgetscreate',[BudgetController :: class,'advancebudget_create'])->name('advancebudgets.create');

    Route :: get('vouchernotupload',[BudgetController :: class,'voucher_not_upload'])->name('notuploadvoucher');
    Route :: post('notuploadvoucher',[BudgetController :: class,'voucher_not_upload_show'])->name('notuploadvouche.datasource');


    /* advance voucher */


    Route :: get('permission-settings/{role_id}',[RoleController :: class,'permission_settings'])->name('permission-settings')->middleware('permission:edit roles');
    Route :: post('update-permissions',[RoleController :: class,'update_permissions'])->name('update-permissions')->middleware('permission:edit roles');
    Route :: get('role-base-user-assign/{role_id}',[RoleController :: class,'role_base_user_assign'])->name('role-base-user-assign')->middleware('permission:edit roles');;
    Route :: post('assign-role',[RoleController :: class,'assign_role'])->name('assign-role');
    Route :: post('remove-role',[RoleController :: class,'remove_role'])->name('remove-role');
    Route :: get('budget-allocation',[BudgetAllocationController :: class,'defineBudget'])->name('admin.budget.define');
    Route :: post('budget-allocation-update',[BudgetAllocationController :: class,'allocationUpdate'])->name('admin.budget.allocation.update');
    Route :: get('budget-current-status',[BudgetAllocationController :: class,'budgetStatus'])->name('admin.budget.status');
});

// Route::resource('pension-users', 'App\Http\Controllers\PensionUserController');
Route::post('admin/pension-users/payscales', 'App\Http\Controllers\PensionUserController@get_payscales')->name('get-payscales');
//Route::post('admin/pension-users/payscale-details', 'App\Http\Controllers\PensionUserController@get_payscale_details')->name('get-payscale-details');
Route::post('admin/pension-users/last-basic-pay', 'App\Http\Controllers\PensionUserController@get_basic_pay')->name('get-basic-pay');

// Route :: post('/admin/pension-users/delete',[PensionUserController :: class,'delete_pension'])->name('admin.pension-users.delete');
Route::get('admin/reconciliation/query', 'App\Http\Controllers\ReconciliationReportController@query')->name('admin.reconciliation.query');
Route::post('admin/reconciliation/fetch', 'App\Http\Controllers\ReconciliationReportController@fetch')->name('admin.reconciliation.fetch');
Route::post('admin/reconciliation/reconciliate', 'App\Http\Controllers\ReconciliationReportController@reconciliate')->name('admin.reconciliate');
Route:: get('admin/bank-reconciliate','App\Http\Controllers\ReconciliationReportController@bankReconciliate')->name('admin.bank-reconciliation');
Route :: post('admin/save-reconciliate-record','App\Http\Controllers\ReconciliationReportController@saveReconciliationRecord')->name('admin.bank-reconciliation.save');
Route::resource('budgets', 'App\Http\Controllers\BudgetController');
Route::resource('budget-accountings', 'App\Http\Controllers\BudgetAccountingController');
Route::resource('budget-levels', 'App\Http\Controllers\BudgetLevelController');
Route :: get('logout-custom',function(){
  Auth :: logout();
  return redirect() -> to('/');
})->name('logout-custom');




Route::resource('roles','App\Http\Controllers\RoleController');

Route::resource('category','App\Http\Controllers\ChartOfAccounts\CategoryController')->middleware('role:Administration|Accountant');
Route::resource('accounts','App\Http\Controllers\ChartOfAccounts\AccountsController')->middleware('role:Administration|Accountant');
Route::resource('budgets', 'App\Http\Controllers\BudgetController')->middleware('role:Administration|Budget Manager');
Route::resource('budget-accountings', 'App\Http\Controllers\BudgetAccountingController')->middleware('role:Administration|Budget Manager');;
Route::get('budget-accounting-modify/{budac_id}', 'App\Http\Controllers\BudgetAccountingController@modify')->name('budget-accountings.modify')->middleware('role:Administration|Budget Manager');
Route::patch('budget-accounting-change/{budac_id}', 'App\Http\Controllers\BudgetAccountingController@change')->name('budget-accountings.change')->middleware('role:Administration|Budget Manager');
Route::get('budget-modify/{budac_id}', 'App\Http\Controllers\BudgetController@modify')->name('budgets.modify')->middleware('role:Administration|Budget Manager');
Route::patch('budget-change/{budac_id}', 'App\Http\Controllers\BudgetController@change')->name('budgets.change')->middleware('role:Administration|Budget Manager');
Route :: get('add-more-certification',[EmployeeRegistrationController :: class,'addMoreCertification'])->name('ajax.add-more-certificate');
Route :: get('add-more-experience',[EmployeeRegistrationController :: class,'addMoreExperience'])->name('ajax.add-more-experience');
Route :: get('employee-detail-pdf/{employee_id}',[EmployeeRegistrationController :: class,'downloadEmployeeDetailPdf'])->name('admin.employees.details.pdf');
Route :: get('employee-signup-complete',[EmployeeRegistrationController :: class,'signupComplete'])->name('frontend.employee-signup.complete');
Auth::routes();

/* fdr craeting route */
Route::get('fdr', 'App\Http\Controllers\FdrController@fdr');
Route::get('search', 'App\Http\Controllers\FdrController@fdrsearch');
Route::get('viewfdr', 'App\Http\Controllers\FdrController@viewfdr');
Route::post('fdr/datasource', 'App\Http\Controllers\FdrController@fdr_datasource')->name('fdr.datasource');
Route::get('fdrprint', 'App\Http\Controllers\FdrController@fdrprint');
Route::POST('fdrcreate', 'App\Http\Controllers\FdrController@fdrcreate');

/*  */

/*Provedend Found */
Route::get('pffdr', 'App\Http\Controllers\FdrController@pffdr')->name('pfdr');
Route::get('index', 'App\Http\Controllers\FdrController@pffdrindex')->name('pfdr.index');
Route::get('pfdrstore/{fdr_no}', 'App\Http\Controllers\FdrController@pffdrprint')->name('pfdr.print');
Route::post('pffdrstore', 'App\Http\Controllers\FdrController@store')->name('pfdr.store');
Route::get('pfadjust/{fdr_no}', 'App\Http\Controllers\FdrController@adjust')->name('pfadjust.store');
Route::post('pffdrcreate', 'App\Http\Controllers\FdrController@pffdrcreate')->name('pffdrcreate.store');

/*Provedend Found */


