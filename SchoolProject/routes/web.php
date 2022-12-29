<?php

use App\Http\Controllers\RajitController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SchedulController;
use App\Http\Controllers\CourseDetail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Coursepayment;
use App\Http\Controllers\Payment;
use App\Http\Controllers\CompanyController;





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





    Route :: get('logout-custom',function(){
    Session::flush();
    Auth::logout();
    return redirect()->route('user.login');
    })->name('signOut');


    // user registration registration saveuser course.details

    Route :: get('rajitschool',[RajitController:: class,'Landingpage'])->name('rajitschool');
    Route::get('registration',[registrationController:: class,'index'])->name('registration');
    Route::post('Save/User',[registrationController:: class,'SaveUser'])->name('saveuser');
    Route::get('User/Login',[registrationController:: class,'UserLogin'])->name('user.login');

    // Route::post('User/Login',[registrationController:: class,'LoginUser'])->name('login');
    Route::get('communication',[RajitController:: class,'Communicate'])->name('communication');
    Route::get('Dashboard',[RajitController::class,'dashboard'])->name('dashboard.Index');
    Route::get('Admin/Dashboard',[RajitController::class,'Admindashboard'])->name('AdminDas');

    Route::get('categoey.id/{id}',[RajitController :: class,'CategoryFind']);
    Route::get('UserRegister/login/{email}/{password}',[registrationController :: class,'registerlogin']);
    // Route::get('Payment/page/{enrollid}',[registrationController :: class,'paymentpage']);
    Route::get('Payment/page/user/{id}',[registrationController :: class,'paymentpageUser'])->name('payemntpageuser');

    Route::get('Course/Details/{id}',[CourseDetail :: class,'index'])->name('course.details');


    // find Course find.course

    Route::get('Find/Course',[CourseDetail :: class,'FindCourse'])->name('find.course');

    // All Seminar SeminarAdd

    Route::get('Find/Seminar',[CourseDetail :: class,'FindSeminar'])->name('find.seminar');

    Route::get('SeminarAdd/{id}',[CourseDetail :: class,'Seminaradd']);
    Route::post('Seminar/Entry',[CourseDetail :: class,'SeminarSave'])->name('SeminarEntry');
    // Seminar Entry SeminarEntry



    Route::group(['middleware' => 'servear'], function ()
    {
       Route::get('Add/Course',[RajitController::class,'Addcourse'])->name('addCourse');
       Route::post('Add/Course',[RajitController::class,'coursesave'])->name('Course.Save');
       Route::post('Save/Course',[RajitController::class,'courseadd'])->name('Course.Add');
    //   Route::get('Edit/{id}',[RajitController::class,'courseEdit']);
       Route::get('course/Edit/{id}',[RajitController::class,'DeleteCourse'])->name('Delete');
       Route::get('Payment/Add',[RajitController::class,'payment'])->name('payment');
       Route::post('Course/Payment',[RajitController::class,'CoursePayment'])->name('Course.Payment');
       Route::post('Course/Payment/update',[RajitController::class,'UpdatePayment'])->name('PaymentEdit');
       Route::post('update.Payment',[RajitController::class,'CoursePaymentUpdate']);
       Route::get('course/Payment/{id}',[RajitController::class,'DeletePayment'])->name('PaymentDelete');
       Route::get('Schedul/Add',[SchedulController::class,'SchedulAdd'])->name('AddSchedul');
       Route::get('Trainer/Add',[SchedulController::class,'trainerAdd'])->name('trainer.add');
       Route::post('save',[SchedulController::class,'SaveTrainer']);
       Route::get('TrainerEdit/{id}',[SchedulController::class,'trainerEdit']);
       Route::post('update.trainer',[SchedulController::class,'trainerUpdate']);
       Route::get('trainerDelete/{id}',[SchedulController::class,'trainerDelete']);

       Route::get('CourseEdit/{id}',[SchedulController::class,'CourseEdit']);
       Route::post('update.course',[SchedulController::class,'updatecourse'])->name('update.course');
       Route::post('Save/Schedul',[SchedulController::class,'saveSchedul'])->name('Schedul.Add');
       Route::get('ScheduleEdit/{id}',[SchedulController::class,'ScheduleEdit']);
       Route::post('update.schedule',[SchedulController::class,'ScheduleUpdate']);

       Route::get('Course/Category',[SchedulController::class,'CourseCategory'])->name('Coursecategory.add');

       Route::post('Categorysave',[SchedulController::class,'CategoryUpload']);

       Route::get('categoryDelete/{id}',[SchedulController::class,'Deletecategory']);
       Route::get('CategoryEdit/{id}',[SchedulController::class,'Editcategory']);
       Route::post('update.category',[SchedulController::class,'updatecategory']);
       Route::get('Activecourse/{id}',[SchedulController::class,'ActiveCourse']);
       Route::get('Schedule/Delete/{id}',[RajitController::class,'DeleteSchedule'])->name('Schedule.Delete');

       Route::get('Course/Content',[CourseDetail::class,'content'])->name('Coursecontent.add');
       Route::post('Contentsave',[CourseDetail::class,'contentSave']);

       Route::get('file/download/{id}',[CourseDetail::class,'fileDownload'])->name('file.download');

       Route::get('ContentEdit/{id}',[CourseDetail::class,'ContentEdit']);
       Route::post('update.content',[CourseDetail::class,'ContentUpdate']);
       Route::get('content/delete/{id}',[CourseDetail::class,'ContentDelete'])->name('ContentDelete');
       Route::get('Content/{id}',[UserController::class,'index'])->name('course.content');
       Route::get('file/download/{id}',[UserController::class,'fileDownload'])->name('file.download');


       Route::get('course/enroll',[CourseDetail::class,'CourseEnroll'])->name('course.enroll');
       Route::post('enroll/create',[CourseDetail::class,'CourseCreate'])->name('Enroll.save');


       Route::get('Remainder/{id}',[CourseDetail::class,'TrainerRemainder']);
       Route::get('Trainer/back',[CourseDetail::class,'TrainerBack'])->name('Remainder.back');

       Route::get('Student/all',[CourseDetail::class,'AllStudent'])->name('allstudent');
       Route::get('Active/{id}',[CourseDetail::class,'ActiveStudent'])->name('Active.student');
       Route::get('Inactive/{id}',[CourseDetail::class,'InactiveStudent'])->name('student.Delete');

       Route::get('viewstudent/{id}',[CourseDetail::class,'ViewStudent']);

       Route::get('Add/Batch',[CourseDetail::class,'AddBatch'])->name('addbatch');
       Route::post('Add/Batch',[CourseDetail::class,'BatchSave'])->name('Course.batch');

       Route::get('enrollCourse.id/{id}',[CourseDetail::class,'EnrollId']);
       Route::get('enrollCourse.batch/{id}',[CourseDetail::class,'BatchId']);

       Route::get('User.Profile',[registrationController::class,'Profile'])->name('Userprofile');

       Route::get('batch/delete',[CourseDetail::class,'BatchDelete'])->name('batch.delete');

       Route::get('Expenditure/List',[CourseDetail::class,'expenditure'])->name('Expenditure');

       Route::post('Header/Save',[CourseDetail::class,'HeaderSave'])->name('Header.Add');
       Route::post('Description/Save',[CourseDetail::class,'DescriptionSave'])->name('Description.Add');

       Route::get('Payment/Details',[Payment::class,'index'])->name('payment.details');
       Route::get('Promo/Details',[Payment::class,'promoAdd'])->name('Promo.details');
       Route::get('send/sms',[Payment::class,'Sendsms'])->name('send.sms');
       Route::post('sms/post',[Payment::class,'smspost'])->name('sms.post');

       Route::get('exam/management',[CourseDetail::class,'ExamManagent'])->name('exam.management');
       Route::post('exam/add',[CourseDetail::class,'ExamAdd'])->name('Exam.Add');
       Route::get('csv/download',[CourseDetail::class,'csvDownload'])->name('csv.download');
       Route::post('file/upload',[CourseDetail::class,'fileupload'])->name('Upload.result');
       Route::get('view.result/{id}',[CourseDetail::class,'Viewresult']);

       Route::get('download/{id}',[CourseDetail::class,'downlodresult'])->name('downlod.result');
       Route::get('Message/Body',[CourseDetail::class,'MessageBody'])->name('Message.body');
       Route::post('Message/Save',[CourseDetail::class,'MessageSave'])->name('message.save');
       Route::post('Message/Head',[CourseDetail::class,'MessageHead'])->name('message.head');

       Route::get('edit.message/{id}',[CourseDetail::class,'Editmessage']);
       Route::post('Message/Update',[CourseDetail::class,'UpdateMessage'])->name('message.update');

       Route::post('Payment/Confirm',[Payment::class,'PaymentConfirm'])->name('Payment.confirm');

       Route::get('Payment/Confirm',[Payment::class,'PaymentView'])->name('payment.view');

       Route::post('promocode.save',[Payment::class,'Promosave']);

       Route::get('promo.save',[Payment::class,'PromoEdit'])->name('promo.edit');
       Route::post('promo/update',[Payment::class,'Promoupdate'])->name('promocode.update');

       Route::get('Course/discount',[CourseDetail::class,'CourseDiscount'])->name('Course.discount');
       Route::post('Discount/Save',[CourseDetail::class,'DiscountSave'])->name('discount.save');

       Route::get('Discount/Set',[CourseDetail::class,'DiscounSet'])->name('discount.set');

       Route::get('Edit.discount/{id}',[CourseDetail::class,'EditDiscount']);
       Route::post('Update.discount',[CourseDetail::class,'DiscountUpdate'])->name('discount.update');

       Route::get('delete.discount/{id}',[CourseDetail::class,'DeleteDiscount']);
       Route::get('batch.assign',[CourseDetail::class,'BatchAssign'])->name('batchassign');

       Route::get('batch/confirm',[CourseDetail::class,'BatchConfirm'])->name('batchCofirm');

       Route::get('special/discount',[CourseDetail::class,'specialDiscount'])->name('Special.discount');

       Route::post('special/save',[CourseDetail::class,'specialDiscountSave'])->name('specialDiscount.save');


       Route::get('edit/batch',[CourseDetail::class,'EditBatch'])->name('edit.batch');

       Route::post('Update/batch',[CourseDetail::class,'UpdateBatch'])->name('update.batch');

       Route::get('active.batch',[CourseDetail::class,'ActiveBatch']);

       //    superadmin part//
       Route::get('approve/discount',[CourseDetail::class,'DiscountApprove'])->name('approve.discount');

       Route::get('approved',[CourseDetail::class,'Approve'])->name('aproveconfirm');
       Route::get('approved/cancel',[CourseDetail::class,'ApproveCancel'])->name('aprovecancel');

       Route::get('Edit/Special',[CourseDetail::class,'EditSpecial'])->name('editspecial');

       Route::post('Update/Special',[CourseDetail::class,'updateSpecial'])->name('specialDiscount.update');

       Route::get('courseactive/{id}',[CourseDetail::class,'Courseactive']);
       Route::get('courseinactive/{id}',[CourseDetail::class,'Courseinactive']);
       Route::get('edit.assignBatch',[CourseDetail::class,'editAssignbatch']);

       Route::post('update.assignBatch',[CourseDetail::class,'updateAssignbatch'])->name('batchtime.update');
       Route::get('all/Permission',[UserController::class,'Allpermission'])->name('allpermission');
       Route::post('assignRole',[UserController::class,'Assignpermission']);

       Route::get('UserassignRole',[UserController::class,'AssignRole'])->name('assign.role');

       Route::get('Update/Role',[UserController::class,'UpdateRole'])->name('update.Assignbatch');

       Route::post('Update/UserRole',[UserController::class,'UpdateUserRole'])->name('update.Userrole');
       Route::get('Add/Role',[UserController::class,'Addrole'])->name('AddRole');

       Route::post('create/Role',[UserController::class,'Createrole'])->name('create.role');


       Route::get('Email/Setting',[UserController::class,'EmailSetting'])->name('email.setting');
       Route::post('Email/Save',[UserController::class,'EmailSettingSave'])->name('Mailsetting.save');

       Route::get('Email/Config',[UserController::class,'EmailConfig'])->name('mail.configuration');
       Route::get('Config/Delete/{id}',[UserController::class,'ConfigDelete'])->name('delete.config');

       Route::get('user/course/details',[UserController::class,'CourseDetails'])->name('user.course.details');

       Route::get('user/course/details/{id}',[UserController::class,'userCourseDetails'])->name('userenrol.details');

       Route::get('downloadPayment/{id}',[UserController::class,'PaymentDownload']);

       Route::get('Company/Settings',[UserController::class,'companySettings'])->name('Company.setting');
       Route::post('Company/Save',[UserController::class,'companySave'])->name('company.save');


    //    Company.setting company.save slider.save sliderImage delete.slider Client


      Route::get('Slider/Image',[CompanyController::class,'index'])->name('Slider.image');
      Route::get('slider.save',[CompanyController::class,'save']);

      Route::post('slider/Image',[CompanyController::class,'imageSave'])->name('sliderImage');
      Route::get('Slider/Delete/{id}',[CompanyController::class,'delete'])->name('delete.slider');

      Route::get('Client/Image',[CompanyController::class,'Client'])->name('Client');
      Route::get('client.save',[CompanyController::class,'Clientsave']);

      Route::post('Client/Image',[CompanyController::class,'ClientImageSave'])->name('ClientImage');
      Route::get('Slider/Delete/{id}',[CompanyController::class,'delete'])->name('delete.slider');

    //   upcoming course delete.upcoming Seminar
      Route::get('Upcoming/Course',[CompanyController::class,'upcomingCourse'])->name('Upcoming.course');
      Route::get('upcoming.save',[CompanyController::class,'createUpcoming']);

      Route::post('Upcoming/Save',[CompanyController::class,'UpcomingSave'])->name('UpcomingCreate');
      Route::get('Upcoming/Delete/{id}',[CompanyController::class,'Upcomingdelete'])->name('delete.upcoming');

    //   Seminar Course UserSeminar

     Route::get('Seminar/Content',[CompanyController::class,'Seminar'])->name('Seminar');
     Route::get('seminar.save',[CompanyController::class,'createSeminar']);

     Route::post('Seminar/Save',[CompanyController::class,'SeminarSave'])->name('SeminarCreate');
     Route::get('Seminar/Delete/{id}',[CompanyController::class,'Seminardelete'])->name('delete.seminar');


     Route::get('Seminar/all',[CourseDetail::class,'SeminarAll'])->name('allSeminar');
     Route::get('Seminar/all/{id}',[CourseDetail::class,'UserSeminar'])->name('UserSeminar');

    //  FooterLink add.footer FooterCreate footer.delete

    Route::get('Footer/All',[CompanyController::class,'Footer'])->name('FooterLink');
    Route::get('Footer/Add',[CompanyController::class,'AddFooter'])->name('add.footer');

    Route::post('Footer/Save',[CompanyController::class,'FooterSave'])->name('FooterCreate');
    Route::get('Footer/Add/{id}',[CompanyController::class,'DeleteFooter'])->name('footer.delete');


    // user add User.save add.course


    Route::get('User/Add',[UserController::class,'user'])->name('User');
    Route::post('User/Save',[UserController::class,'usersave'])->name('User.save');
    Route::get('User.delete/{id}',[UserController::class,'userDelete']);

    Route::get('Add/User',[UserController::class,'AddCourse'])->name('add.course');

    // Success Story add.story story.save update.story

    Route::get('Success/Story',[CompanyController::class,'SuccessStory'])->name('SuccessStory');
    Route::get('Add/Story',[CompanyController::class,'AddStory'])->name('add.story');

    Route::post('Save/Story',[CompanyController::class,'SaveStory'])->name('story.save');

    Route::get('StoryEdit/{id}',[CompanyController::class,'EditStory']);
    Route::get('DeleteStory/{id}',[CompanyController::class,'DeleteStory']);
    Route::post('UpdateStory',[CompanyController::class,'UpdateStory'])->name('update.story');

     });




       Route::get('Order/Summary',[CourseDetail::class,'OrderSummer'])->name('orderSummery');

       Route::post('Payment/Save',[Payment::class,'PaymentSave'])->name('Payment.save');

        //    Pyment Bkash
       Route::get('Payment/success',[Payment::class,'Success'])->name('additional-rsl-payment-success');
       Route::get('Payment/Error',[Payment::class,'Error'])->name('additional-rsl-payment-error');
       Route::post('Payment/Cancel',[Payment::class,'Cancel'])->name('additional-rsl-payment-cancel');

     //    Pyment Bkash



     Route::get('Course/Registration/{id}',[Coursepayment::class,'index'])->name('courseJoin');
     Route::get('batch/id',[Coursepayment::class,'findcourse'])->name('batch.id');

     Route::post('enroll/course',[registrationController::class,'SaveUser'])->name('enroll.course');


     //email route// activities location.save
     Route :: get('email',[EmailController:: class,'index'])->name('email.send');
     Route :: post('send/Mail',[EmailController:: class,'sendMail'])->name('reset.password');
     Route :: get('update/Password',[EmailController:: class,'updatepassword'])->name('update.password');
     Route :: post('Change/Password',[EmailController:: class,'Password_update'])->name('password.save');
     //email route//




















    //Steeladress.find Cement.view Land.view Password Reset Routes..assign.role permission.store Aptlocation.find Ploatlocation.find Cementadress.find
    // Route::get('password/request', [resetpassword :: class,'showLinkRequestForm'])->name('password.request');
    // Route::get('admin/password/request', [resetpassword :: class,'AdminshowLinkRequestForm'])->name('admin.password.request');
    // Route::post('password/email', [resetpassword :: class,'mail'])->name('password.email');
    // Route::post('admin/password/email', [resetpassword :: class,'adminmail'])->name('admin.password.email');
    // Route::get('passwordreset', [resetpassword :: class,'passwordreset'])->name('password.reset');
    // Route::get('admin/password/reset', [resetpassword :: class,'adminpasswordreset'])->name('admin.password.reset');
    // Route::post('password/update', [resetpassword :: class,'passwordupdate'])->name('password.update');
    // Route::post('admin/password/update', [resetpassword :: class,'adminpasswordupdate'])->name('Adminpassword.update');

//   Auth::routes();
  Auth::routes(['register' => false]);
//   Route::get('login', 'App\Http\Controllers\Auth\LoginController@LoginUser');
  Route::post('register', 'App\Http\Controllers\Auth\RegisterController@create')->name('register');
  Route::get('registerLogin/{email}/{password}', 'App\Http\Controllers\Auth\RegisterController@registerlogin');

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
