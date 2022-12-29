<?php


 use App\Http\Controllers\loginController;
 use App\Http\Controllers\EmailController;
 use App\Http\Controllers\ServeyController;
 use App\Http\Controllers\Profile;
 use App\Http\Controllers\AdminController;





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

// Route :: get('/ibsc',function(){



//     // return view('backend.UserAuth.login');


//    }); Teacher&Student

Route :: get('ibsc',[loginController:: class,'Landingpage'])->name('ibsc');







  Route :: get('logout-custom',function(){
    Session::flush();
    Auth::logout();
    return redirect()->route('user.login');
    })->name('signOut');

    Route :: get('Login',[loginController:: class,'Userlogin'])->name('user.login');
    Route :: post('Login',[loginController:: class,'login'])->name('login');
    Route :: get('User/Registration',[loginController:: class,'Registration'])->name('registration');
    Route :: post('User/Save',[loginController:: class,'UserSave'])->name('saveuser');

    Route::group(['middleware' => 'servear'], function ()
    {

                Route :: get('myservey',[ServeyController :: class,'Index']);
                Route :: get('Servey',[ServeyController :: class,'createSurvey'])->name('create.survey');
                Route :: post('question.create',[ServeyController :: class,'SaveQuestion']);
                Route :: post('Iteam.create',[ServeyController :: class,'SaveIteam']);
                Route :: get('view.question/{id}',[ServeyController :: class,'Viewquestion']);
                Route :: post('edit/form',[ServeyController :: class,'editForm'])->name('edit.form');
                Route :: post('survey/save',[ServeyController :: class,'SaveSurvey'])->name('survey.save');
                Route :: get('delete.survey/{id}',[ServeyController :: class,'deleteSurvey']);

                Route :: get('Dashboard',[ServeyController :: class,'surveyIndex'])->name('Survey.Index');
                Route :: get('survey.print/{id}',[ServeyController :: class,'SurveyPrint']);
                Route :: get('view.survey/{id}',[ServeyController :: class,'SurveyView']);
                Route :: POST('search.survey',[ServeyController :: class,'SearchSurvey']);
                Route :: post('question/delete',[ServeyController :: class,'QuestionDelete'])->name('question.delete');

                Route :: post('Iteam.Update',[ServeyController :: class,'UpdateIteam']);   //title.update information.update New.field

                Route :: post('Title/Update',[ServeyController :: class,'UpdateTtile'])->name('title.update');
                Route :: post('Information/Update',[ServeyController :: class,'UpdateInformation'])->name('information.update');

                Route :: get('New/Field',[ServeyController :: class,'NewField'])->name('New.field');

                Route :: get('Question/Check',[ServeyController :: class,'QuestionCheck'])->name('checkbox.question');
                Route ::post('checkbox',[ServeyController :: class,'questionbox']);

                Route :: get('survey/edit/{id}',[ServeyController :: class,'SurveyEdit'])->name('survey.edit');
                Route :: post('update.servey',[ServeyController :: class,'UpdateSurvey']);
                Route :: get('Individual.print/{id}',[ServeyController :: class,'IndividualPrint']);
                Route :: get('Individual.delete/{id}',[ServeyController :: class,'IndividualDelete']);
                Route :: get('file/download/{id}',[ServeyController :: class,'FileDownload'])->name('file.download');
                Route :: get('profile/View',[Profile :: class,'ViewProfile'])->name('Profile');
                Route :: get('profile/Update',[Profile :: class,'ProfileUpdate'])->name('Profile.update');
                Route :: post('Update/Profile',[Profile :: class,'UpdateProfile'])->name('Update.Profile');


                // See.survey user.delete useraprove ApproveUser AdminDas Update.ProfileIndividual.survey Individual.printupdate.servey Route :: post('survey/dataSource',[ServeyController :: class,'dataSource'])->name('survey.dataSource');

                //Admin route  create.User//
                Route :: get('Admin/Desboard',[AdminController :: class,'index'])->name('AdminDas');

                Route :: get('Approve/User',[AdminController :: class,'ApproveUser'])->name('ApproveUser');

                Route :: get('useraprove/{id}',[AdminController :: class,'userApprove']);
                //  Route :: get('user.delete/{id}',[AdminController :: class,'userDelete']);
                Route :: get('See/survey',[AdminController :: class,'AllSurvey'])->name('See.survey');
                Route :: get('user.delete/{id}',[AdminController :: class,'userDelete']);
                Route :: get('Admin.view.survey/{id}',[AdminController :: class,'ViewSurvey']);

                //  Route :: get('Admin.view.survey/{id}',[AdminController :: class,'ViewSurvey']); Admin.delete.survey
                Route :: get('Admin.survey.print/{id}',[AdminController :: class,'SurveyPrint']);
                Route :: get('Admin.delete.survey/{id}',[AdminController :: class,'SurveyDelete']);

                Route :: get('Create/User',[AdminController :: class,'UserCreate'])->name('create.User');
                Route :: post('Save/User',[AdminController :: class,'UserStore'])->name('user.Save');

                Route :: get('Admin.survey.view/{id}',[AdminController :: class,'IndividualView']);
                Route :: get('Admin.surveyprint/{id}',[AdminController :: class,'IndividualPrint']);
                Route :: get('Admin.survey.delete/{id}',[AdminController :: class,'IndividualDelete']);

                Route :: get('Teacher.List',[AdminController :: class,'TeacherList']);
                Route :: post('Teacher.create',[AdminController :: class,'TeacherSave']);

                Route::get('stduent/List',[AdminController :: class,'StudentList'])->name('stduentList');

                Route :: get('upload',[AdminController :: class,'upload']);

                Route :: post('Student.upload',[AdminController :: class,'StudentSave']);


                Route :: get('uploadStudent',[AdminController :: class,'StudentSave']);
                Route :: get('delete.student/{id}',[AdminController :: class,'DelateStudent']);
                Route :: get('delete.teacher/{id}',[AdminController :: class,'DelateTeacher']);
                Route::get('csv.download',[AdminController :: class,'csvdownload']);
                Route::post('Update/Teacher',[AdminController :: class,'TeacherUpdate'])->name('Teacher.update');
                Route :: post('update.teacher',[AdminController :: class,'UpdateTeacher']);



                //new route Edit.Survey Update.Survey

                Route :: get('SurveyAllocation/{id}',[AdminController :: class,'SurveyAllocation']);
                Route :: post('Allocate.Survey',[AdminController :: class,'AllocationSurvey']);

                Route :: get('Edit.Survey/{id}',[AdminController :: class,'EditSurvey']);
                Route :: get('copy.question/{id}',[AdminController :: class,'questioncopyView']);
                Route :: post('copyquestion.create',[AdminController :: class,'questioncopyCreate']);
                Route :: post('Update.Survey',[AdminController :: class,'UpdateSurvey']);

                Route :: get('Teacher/Student.Survey',[AdminController :: class,'Teacher_Student'])->name('Teacher&Student');
                Route :: get('Admin.Teachersurveyprint/{id}',[AdminController :: class,'TeacherSurveyPrint']);
                //  Route :: post('Location',[AdminController :: class,'LocationView'])->name('location.view');
                Route :: get('Location/{id}',[AdminController :: class,'LocationView'])->name('location.view');
                Route :: get('back',[ServeyController :: class,'LocationBack']);
     // location.view copyquestion.create Admin.Teachersurveyprint  Copy.question copy.question Allocate.Survey SurveyAllocation update.teacher Admin route Teacher.update // user.Save Admin.survey.print Admin.survey.view Teacher.create delete.student
     });


     Route :: get('Ibsc/Activities',[loginController:: class,'Activities'])->name('activities');
     Route :: get('Location',[loginController:: class,'location']);
     Route :: post('location.save',[loginController:: class,'locationSave']);

     //email route// activities location.save
     Route :: get('email',[EmailController:: class,'index'])->name('email.send');
     Route :: post('send/Mail',[EmailController:: class,'sendMail'])->name('reset.password');
     Route :: get('update/Password',[EmailController:: class,'updatepassword'])->name('update.password');
     Route :: post('Change/Password',[EmailController:: class,'Password_update'])->name('password.save');
     //email route//




















    //Steeladress.find Cement.view Land.view Password Reset Routes..assign.role permission.store Aptlocation.find Ploatlocation.find Cementadress.find
    Route::get('password/request', [resetpassword :: class,'showLinkRequestForm'])->name('password.request');
    Route::get('admin/password/request', [resetpassword :: class,'AdminshowLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [resetpassword :: class,'mail'])->name('password.email');
    Route::post('admin/password/email', [resetpassword :: class,'adminmail'])->name('admin.password.email');
    Route::get('password/reset', [resetpassword :: class,'passwordreset'])->name('password.reset');
    Route::get('admin/password/reset', [resetpassword :: class,'adminpasswordreset'])->name('admin.password.reset');
    Route::post('password/update', [resetpassword :: class,'passwordupdate'])->name('password.update');
    Route::post('admin/password/update', [resetpassword :: class,'adminpasswordupdate'])->name('Adminpassword.update');
