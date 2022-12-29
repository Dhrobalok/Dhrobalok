
<?php

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

Route::get('/', function () {
	$r=\DB::select('select *from file');
	$s=\DB::select('select * from advisenotice');

	
	 
	/*
	$q=\DB::select('SELECT file.title, advisenotice.title
FROM file
INNER JOIN advisenotice ON file.id=advisenotice.id');*/
    return view('welcome')->with('p',$r)->with('q',$s);
});






Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user', 'HomeController@index')->name('home');

//Admin
Route::get('/adminlogin', 'Admin2Controller@adminlogin');
Route::get('/Logout', 'Admin2Controller@logout');
Route::get('/adminlogin', 'Admin2Controller@adminlogin');
Route::get('/adminreg', 'Admin2Controller@adminreg');
Route::post('/adminr', 'Admin2Controller@adminregdata');
Route::post('/adminl', 'Admin2Controller@adminlgdata');
Route::get('/resetpass', 'Admin2Controller@resetpass');
Route::post('/resetpass2', 'Admin2Controller@resetmail');
Route::get('/resetpass3', 'Admin2Controller@resetpass2');
Route::post('/updatepassword', 'Admin2Controller@update');
Route::get('/studentapprove', 'Admin2Controller@teacherapprove');

Route::get('/studentapprove', 'Admin2Controller@studentapprove');



Route::get('/about', 'UserController@about');
Route::get('/contact', 'UserController@contact');

//userapprove

Route::get('/studentedit/{id}', 'Admin2Controller@edit');
Route::post('/studentapprove/{id}', 'Admin2Controller@approve');
Route::get('/studelet/{id}', 'Admin2Controller@delet');

///user
Route::get('/attend', 'StudeninfomController@attendence');
Route::post('/attendence', 'StudeninfomController@atteninser');
Route::get('/takeattend', 'StudeninfomController@attend');
Route::get('/logout', 'StudeninfomController@getSignOut');
Route::get('/classmark1', 'StudeninfomController@classmark1');
Route::get('/classmark', 'StudeninfomController@classmark');
Route::get('/atten', 'StudeninfomController@attend1');
Route::get('/attendmark', 'StudeninfomController@attendmark');
Route::get('/userlogin', 'StudeninfomController@userlogin');
Route::get('/userlog', 'StudeninfomController@loginuser');
Route::get('/userreg', 'StudeninfomController@userreg');
Route::post('/reg', 'StudeninfomController@reg');

//teacher
Route::get('/teacherapprove', 'Admin2Controller@teacherapprove');

Route::get('/teacherlogin', 'TeacherController@login');
Route::get('/teacherl', 'TeacherController@tlogin');
Route::get('/teacherreg', 'TeacherController@reg');
Route::post('/teacherreg2', 'TeacherController@reginsert');

Route::get('/teacherreset', 'TeacherController@resetpass');
Route::post('/teacherreset2', 'TeacherController@resetpass2');
Route::get('/teacherreset3', 'TeacherController@resetpass3');
Route::get('/teacheredit/{id}', 'ApprovController@edit');
Route::post('/approve/{id}', 'ApprovController@approve');
Route::get('/delet/{id}', 'ApprovController@delet');
Route::post('/teacherupdatepassword', 'ApprovController@update');



///course

Route::get('/course', 'CourseController@course');
Route::post('/addcourse', 'CourseController@addcourse');
Route::get('/addcoursemark', 'CourseController@addcoursemark');
Route::post('/coursemark', 'CourseController@coursemark');
Route::get('/coursemark1', 'CourseController@coursemark1');

//profile
Route::get('/teacherprofil', 'TeacherController@profile');

//teacher notice

Route::get('/notice', 'TeacherController@notice');
Route::post('/not', 'TeacherController@not');


//expriment query

Route::get('/ttt','UserController@ttt');


//File Add

Route::get('/classroutine','FileController@file');
Route::post('/uploadroutine','FileController@routineupload');
Route::get('/read','FileController@read');
Route::get('/download/{id}', 'FileController@download');

//texteditor/notice

Route::get('/editor','FileController@edit');
Route::post('/text','FileController@text');
Route::get('/textread/{id}','FileController@textread');
Route::get('/allnotice','FileController@allnotice');
Route::get('/noticedelet/{id}','FileController@deletnotice');


//Attendence Edit

Route::get('/attendenceedit/{roll}','StudeninfomController@attendedit');
Route::get('/attendedit','StudeninfomController@updateattend');

//see attend mark

Route::get('/see','StudeninfomController@seeattendmark');
Route::get('/seeattend','StudeninfomController@see');


//student part
Route::get('/logout','StudentController@logout');
Route::get('/studentattend','StudentController@attendence');
Route::get('/studentattend2','StudentController@seeattendence');

Route::get('/email','StudentController@emailverify');
Route::get('/passwordreset','StudentController@verifyemail');
Route::get('/updatepassword','StudentController@updatepassword');


Route::get('/sms','StudentController@sms');
Route::get('/sm','StudentController@sm');

Route::get('/teacherdas','TeacherController@tdas');

Route::get('/verify','StudentController@logverify');
Route::get('/emailverify2','StudentController@verify');
Route::get('/examregistr','StudentController@examregistr');

Route::get('/seeresult','ResultController@seeresult');
Route::get('/resultsee','ResultController@resultsee');
Route::get('/addexamregistration','StudentController@addexamregistration');
Route::get('/improvement','StudentController@improvement');
Route::get('/resultdownload','ResultController@resultdownload');
Route::get('/improve','ImproveController@improve');
Route::get('/improve2','ImproveController@improve2');
Route::post('/cofarmimprove','ImproveController@cofarmimprove');

Route::get('/snotice','NoticeController@studentnotice');
Route::get('/notice/{id}','NoticeController@snotice');

//logout

Route::get('/logout','UserController@logout');

//supar admin part

Route::get('/suparadmin','suparadminController@suparadmin');
Route::get('/suparadminlogin','suparadminController@login');
Route::get('/adminregistration','suparadminController@adminregistration');
Route::get('/adminregistration2','suparadminController@adminregistration2');
Route::get('/emailverify','suparadminController@emailverify');
Route::get('/teachershow2','suparadminController@teachershow');
Route::get('/studentshow','suparadminController@studentshow');
Route::get('/seestudent','suparadminController@seestudent');
Route::get('/seeresult2','suparadminController@seeresult');
Route::post('/seeresult3','suparadminController@studentresult');
Route::post('/signature','suparadminController@sig');
Route::get('/suparemail','suparadminController@suparemail');
Route::get('/coursealocate','suparadminController@coursealocate');
Route::get('/coursealocate2','suparadminController@coursealocate2');
Route::get('/improveconfarm','suparadminController@improve');
Route::post('/improveconfarm2','suparadminController@improve2');
Route::get('/suapradminaprove','suparadminController@adminaprove');
Route::get('/sapprove/{email}','suparadminController@saprove');
Route::get('/sadelete/{email}','suparadminController@sadelete');
//teacher notice send

Route::post('/teachernotice','NoticeController@notice');
//Notice
Route::get('/noticea','NoticeController@notice2');
Route::get('/updateresult','ResultController@updateresult');
Route::get('/resultupdate','ResultController@resultupdate');
Route::get('/resultupdate2','ResultController@resultupdate2');
Route::get('/resultupdate3','ResultController@resultupdate3');

Route::post('/registration','StudentRegistrationController@registration');
//teacher email verify

Route::get('/teacherverify','TeacherController@verifyemail');
Route::get('/teacherverify2','TeacherController@verifyemail2');
Route::get('/seatplan','TeacherController@seatplan');
Route::get('/examnotice','TeacherController@examnotice');
Route::get('/examnotice2','TeacherController@examnotice2');

Route::get('/guard','TeacherController@guard');

Route::get('/improveteacher','ImproveController@improveteacher');
Route::get('/improveteacher2','ImproveController@improveteacher2');
Route::get('/ImproveTeacher','ImproveController@ImproveTeacher');
Route::get('/improves','ImproveController@improves');

Route::get('/teachermark','UserController@mark');
Route::get('/mark2','UserController@mark2');
Route::get('/mark3','UserController@mark3');
Route::get('/classtest','UserController@classtest');
Route::get('/classtest2','UserController@classtest2');

/*logout all*/

Route::get('/studentlogout','StudentController@studentlogout');
Route::get('/suparLogout','suparadminController@suparLogout');