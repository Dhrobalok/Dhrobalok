<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\FdrController;
// use App\Http\Controllers\GtcLeadger;
// use App\Http\Controllers\FdrnewController;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\BudgetAllocationController;
// use App\Http\Controllers\BudgetController;
 use App\Http\Controllers\EmployeeManagement\EmployeeRegistrationController;
 use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Leadger_gtc;
// use App\Http\Controllers\ReportManager;
 use App\Http\Controllers\FellowshipsController;
 use App\Http\Controllers\Categoryupdate;
 use App\Http\Controllers\userlogin;
 use App\Http\Controllers\resetpassword;


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
    Artisan::call('view:clear');
    // php artisan view:clear
   
    Artisan::call('route:cache');
    // return what you want
});

Route :: get('',function(){
          return view('auth.login');
           
   });

   Route :: get('login',function(){
       
    return view('auth.login');
     
})->name('login');

  Route :: get('signout',function(){
    Session::flush();
    Auth::logout();
    return redirect()->route('login');
    });


Route :: get('Admin.logout',function()
   {
    Session::flush(); 
    return view('auth.adminlogin.adminLogin');
     
})->name('LogoutAdmin');

  Route :: get('employesignup',[EmployeeRegistrationController :: class, 'register'])->name('employesignup');
   Route :: post('store-old-employee',[EmployeeRegistrationController :: class,'saveOldEmployee'])->name('employee.store');
   Route :: post('userlogin',[userlogin :: class,'loginuser'])->name('loginuser');

Route::group(['middleware' => 'auth'], function () {
    
    
    Route :: get('dashboard',[DashboardController :: class,'index'])->name('admin.index');
   Route :: get('addcategory',[DashboardController :: class,'category']);
   
   Route :: get('category.add/{categoryid}',[DashboardController :: class,'categoryadd']);
   Route :: get('permission/{userid}',[DashboardController :: class,'permission'])->name('permission');
   
   
   Route :: get('categorycreate',[DashboardController :: class,'category_craete']);
   Route :: post('store/category',[DashboardController :: class,'categorystore'])->name('category.store');
   Route :: post('information/category',[DashboardController :: class,'categoryinformation'])->name('cinformation.store');
   Route :: get('user/role',[DashboardController :: class,'setting_role'])->name('rolesetting');
   Route :: post('role_store',[DashboardController :: class,'role_store'])->name('roles.store');

    Route :: get('view.category/{categoryid}',[Categoryupdate :: class,'view']);
    Route :: get('edit.category/{categoryid}',[Categoryupdate :: class,'edit']);
    Route :: post('update.category/{categoryid}',[Categoryupdate :: class,'update']);
    Route :: get('delete.category/{categoryid}',[Categoryupdate :: class,'delete']);
    Route :: post('update.addtioan/{categoryid}',[Categoryupdate :: class,'updateaddition']);
    Route :: get('designation',[Categoryupdate :: class,'designationindex']);
    Route :: get('newoffice',[Categoryupdate :: class,'officeindex']);

    Route :: post('designation',[Categoryupdate :: class,'designation'])->name('designation.add');
    Route :: post('officeadd',[Categoryupdate :: class,'newoffice'])->name('newoffice.add');

     Route :: get('delete/{delteid}',[Categoryupdate :: class,'deleteaddtion']);
    Route :: get('deletedesignation/{delteid}',[Categoryupdate :: class,'deletedesignation']);

      Route :: get('add/category',[DashboardController :: class,'studentaprove'])->name('user.aprove');
    Route :: get('useraprove/{userid}',[DashboardController :: class,'useraprove']);
    Route :: get('add/category',[DashboardController :: class,'studentaprove'])->name('user.aprove');
    Route :: get('user.delete/{userid}',[DashboardController :: class,'userdelete']);
   


    //Additional responsibity extend
    Route :: get ('responsibity',[Categoryupdate :: class,'Additionalindex'])->name('indexadd');
    Route :: get('profile_find',[Categoryupdate :: class,'profilefind'])->name('profilefind');
    Route :: post('profile_find',[Categoryupdate :: class,'profilesave'])->name('profile.save');
    Route ::get('salary_id',[Categoryupdate :: class,'profilesalaryid'])->name('profile.salaryid');
    Route ::get('extend/{aditionid}',[Categoryupdate :: class,'timeextend']);
    Route ::post('extendsave',[Categoryupdate :: class,'extendsave']);
    Route ::get('edit/{aditionid}',[Categoryupdate :: class,'editaddtion']);

    Route ::get('newadition',[Categoryupdate :: class,'newaddition'])->name('newadditional');
    Route ::post('newaditionsave',[Categoryupdate :: class,'newadditionSave'])->name('Newresponsibility.add');
    Route ::get('dataSyncronization',[Categoryupdate :: class,'datasyn'])->name('dataSyn');

    Route :: get('officedeleate/{id}',[Categoryupdate :: class,'Officedelete'])->name('office.delete');
    Route :: get('categorydeleate/{id}',[Categoryupdate :: class,'categorydelete'])->name('category.delete');
    Route ::get('designation.find',[Categoryupdate :: class,'designationFind'])->name('disignation.id');
    Route ::get('oficeid.find',[Categoryupdate :: class,'officeidFind'])->name('profile.officeid');
    Route ::get('office_edit/{id}',[Categoryupdate :: class,'officeedit'])->name('office.edit');

    Route :: post('update.office/{officeid}',[Categoryupdate :: class,'update_office']);

    Route :: get('office.Show/{officename}',[Categoryupdate :: class,'officeshow']);
    Route :: get('show.office/{officcode}',[Categoryupdate :: class,'showoffice']);
    Route :: post('contactofficeedit',[Categoryupdate :: class,'editoffice'])->name('contactofficeedit');
    Route :: post('update.contactprofile/{salaryid}',[Categoryupdate :: class,'update_profile']);
    Route :: get('transfer',[Categoryupdate :: class,'transferoffice'])->name('transfer');
    Route::post('officetransfer',[Categoryupdate :: class,'transfersave'])->name('transfer.save');
    Route::get('fromoffice',[Categoryupdate :: class,'officefind'])->name('fromoffice');
    Route::get('csv/upload',[Categoryupdate :: class,'csvfile'])->name('csv.upload');
    Route::get('csv/formate',[Categoryupdate :: class,'csvdownload'])->name('csv.download');
    Route::post('csv.save',[Categoryupdate :: class,'csvsave']);

    Route::post('csv/save',[Categoryupdate :: class,'updatedata'])->name('update.data');
    Route::get('download.office/{office_id}',[Categoryupdate :: class,'download_office']);
    Route::get('view.Inactiove/{office_id}',[Categoryupdate :: class,'view_inactiove']);
    Route::POST('post-sortable',[Categoryupdate :: class,'updatedrag'])->name('postsortable');
    Route::get('delete.office/{office_id}',[Categoryupdate :: class,'delete_office']);

    
    Route::get('newfacults',[Categoryupdate :: class,'newfacultsAdd']);
    Route ::get('faculty.delete/{id}',[Categoryupdate :: class,'facultydelete']);
    Route ::get('faculty.edit/{id}',[Categoryupdate :: class,'facultyedit']);
    Route :: post('update.faculty/{id}',[Categoryupdate :: class,'update_faculty']);
    Route::post('Add.newfaculty',[Categoryupdate :: class,'facultsSave']);
    
    Route :: get('category_information',[Categoryupdate :: class,'categoryinform'])->name('category.inform');
     Route ::get('Type.find',[Categoryupdate :: class,'TypeFind'])->name('type.id');
   //roles.store
    
         //edit designation//update.profile
     Route ::get('edit.profile/{id}',[Categoryupdate :: class,'Profileedit']);
     Route :: post('update.profile/{id}',[Categoryupdate :: class,'updatePdesignation']);
    
    });

   //rolesetting category.create category.store  cinformation.store employee.store
 
   
    //designation.add newoffice.add

    
 
   //backend.admin.index

Route :: get('Admin.login',[EmployeeRegistrationController :: class, 'adminlogin'])->name('Admin.login');
Route :: post('adminlogin',[FellowshipsController :: class,'adminlogin'])->name('loginadmin');
Route :: get('logout-admin',function(){
  
     Session::flush(); 
     return view('auth.adminlogin.adminLogin');
  })->name('logout-admin');

  Route :: get('logout-custom',function(){
    Session::flush(); 
    return view('auth.login');
    })->name('logout-custom');


  
    //Additional responsibity profile.save profile.salaryidupdate.addtion
    

    // Password Reset Routes..
     Route::get('password/request', [resetpassword :: class,'showLinkRequestForm'])->name('password.request');
    Route::get('admin/password/request', [resetpassword :: class,'AdminshowLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [resetpassword :: class,'mail'])->name('password.email');
    Route::post('admin/password/email', [resetpassword :: class,'adminmail'])->name('admin.password.email');
    Route::get('password/reset', [resetpassword :: class,'passwordreset'])->name('password.reset');
    Route::get('admin/password/reset', [resetpassword :: class,'adminpasswordreset'])->name('admin.password.reset');
    Route::post('password/update', [resetpassword :: class,'passwordupdate'])->name('password.update');
    Route::post('admin/password/update', [resetpassword :: class,'adminpasswordupdate'])->name('Adminpassword.update');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
