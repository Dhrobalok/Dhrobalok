<?php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\HomeController;

        use App\Http\Controllers\DashboardController;
        use App\Http\Controllers\Auth\ForgotPasswordController;

        use App\Http\Controllers\EmployeeManagement\EmployeeRegistrationController;
        use App\Http\Controllers\Auth\LoginController;

        use App\Http\Controllers\FellowshipsController;
        use App\Http\Controllers\Categoryupdate;
        use App\Http\Controllers\userlogin;
        use App\Http\Controllers\resetpassword;
        use App\Http\Controllers\RuConstructionUser;
        use App\Http\Controllers\Construction;
        use App\Http\Controllers\CementController;
        use App\Models\User;
        use App\Http\Controllers\SteelController;
        use App\Http\Controllers\TilesController;
        use App\Http\Controllers\Doorcontroller;
        use App\Http\Controllers\sanitaryController;
        use App\Http\Controllers\FettingsController;
        use App\Http\Controllers\Sandcontroller;
        use App\Http\Controllers\HardwareController;
        use App\Http\Controllers\electricController;
        use App\Http\Controllers\PaintController;
        use App\Http\Controllers\ArchitectController;
        use App\Http\Controllers\InteriorController;
        use App\Http\Controllers\VedioController;
        use App\Http\Controllers\LogoController;
        use App\Http\Controllers\FooterController;



/* SteelController sanitaryController FettingsController Architect VedioController LogoController
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

        Route :: get('/',function(){
        $data = User::paginate(3);


            $allvedio=App\Models\Vedio::get();
            foreach($allvedio as $video)
            {

                    $vedioall[]=$video->vedio;
                    $duration[]=$video->duration;



            }



        return view('backend.admin.userdashboard.dashboarduser',compact('data','vedioall','duration'));
        // return view('backend.admin.Landingpage');

        });

        Route :: get('userlogin',function()
        {
            return view('auth.login');

        })->name('login');



        Route :: post('savecontact',[RuConstructionUser:: class,'StoreContact']);

        Route :: post('location2',[RuConstructionUser:: class,'index']);




        Route :: get('employesignup',[EmployeeRegistrationController :: class, 'register'])->name('employesignup');
        Route :: post('store-old-employee',[EmployeeRegistrationController :: class,'saveOldEmployee'])->name('employee.store');
        Route :: post('userlogin',[userlogin :: class,'loginuser'])->name('loginuser');
        Route :: get('dashboard',[DashboardController :: class,'index'])->name('admin.index');



        Route :: get('permission/{userid}',[DashboardController :: class,'permission'])->name('permission');




        Route :: get('Admin.login',[EmployeeRegistrationController :: class, 'adminlogin'])->name('Admin.login');
        Route :: post('adminlogin',[FellowshipsController :: class,'adminlogin'])->name('loginadmin');


        Route :: get('logout-admin',function(){

            Session::flush();
            Auth::logout();
            return redirect()->route('Admin.login');

        });

        Route :: get('logout-custom',function(){
            Session::flush();
            Auth::logout();

            return redirect()->route('login');

            })->name('logout-custom');





    Route::group(['middleware' => 'constructionmid'], function ()
    {

            Route :: post('payslipstore',[RuConstructionUser:: class,'payslip'])->name('renewpayslip');
            Route :: post('projectsaze',[RuConstructionUser:: class,'projectsaze'])->name('project.save');
            Route :: get('renew_fee',[RuConstructionUser:: class,'yearly_renew'])->name('yearly.renewal');

            Route :: get('uploadproject',[RuConstructionUser:: class,'uploadproject'])->name('upload.project');
            Route :: get('land.upload',[Construction :: class,'landIndex'])->name('land.upload');
            Route :: post('land/save',[Construction :: class,'landSave'])->name('land.save');

            Route :: get('add/land',[Construction :: class,'ploatIndex'])->name('upload.ploat');
            Route :: get('brick',[Construction :: class,'brickIndex']);
            Route :: get('add/cement',[CementController :: class,'create'])->name('upload.cement');
            Route :: post('Save/cement',[CementController :: class,'savecement'])->name('Cement.save');
            Route :: get('steels.upload',[SteelController :: class,'index']);
            Route :: post('steels.save',[SteelController :: class,'steelSave'])->name('steel.save');

            Route :: get('upload.tiles',[TilesController :: class,'tilesIndex']);
            Route :: post('tiles/save',[TilesController :: class,'tileSave'])->name('tile.save');
            Route :: get('upload/door',[Doorcontroller :: class,'doorIndex'])->name('upload.door');
            Route :: post('door.save',[Doorcontroller :: class,'doorsave']);
            Route :: get('upload.sanitary',[sanitaryController :: class,'sanitaryIndex']);
            Route :: post('sanitary/save',[sanitaryController :: class,'sanitarysave'])->name('saniatry.save');

            Route :: get('upload.feetings',[FettingsController :: class,'Index']);
            // Route :: post('sanitary/save',[FettingsController :: class,'save'])->name('saniatry.save');

            Route :: get('add/land',[Construction :: class,'hardwareIndex'])->name('upload.hardware');
            Route :: get('upload.architect',[ArchitectController :: class,'uploadProject']);
            Route :: get('upload.interior',[InteriorController :: class,'uploadProject']);
            Route :: get('add/Interior',[Construction :: class,'interiorIndex'])->name('upload.interior');
            Route :: get('add/Electric',[Construction :: class,'electricIndex'])->name('upload.electric');
            Route :: get('add/Ploat',[Construction :: class,'plotIndex'])->name('upload.plot');
            Route :: get('add/paint',[PaintController :: class,'paintIndex'])->name('upload.paint');
            Route :: post('paint.save',[PaintController :: class,'paintSave']);

            Route :: post('Interior.save',[InteriorController :: class,'ProjectSave']);

            Route :: post('upload',[ArchitectController :: class,'ProjectSave'])->name('Architect.save');
            // Post route tile.save upload.feetings Architect.save
            Route :: post('add/brick',[Construction :: class,'bricksave'])->name('brick.save');

            //Post Route brickDashboard adressfind

            //sand upload//

            Route :: get('sand/upload',[Sandcontroller :: class,'sandIndex'])->name('sand.Index');
            Route :: post('sand.save',[Sandcontroller :: class,'sandsave']);

            //sand upload//


            //Hardware upload
            Route :: get('upload.hardware',[HardwareController :: class,'Index']);
            Route :: post('hardwar.save',[HardwareController :: class,'SaveHardware']);



            //Hardware upload

            //Electronic route//
            Route :: get('upload.electric',[electricController :: class,'index']);
            Route :: post('electric.save',[electricController :: class,'SaveElectric']);


            //Electronic route electric.save// vedio.upload Advertise

            //Vedio Upload route UpdateVedio
            Route :: get('Advertise',[VedioController :: class,'AdvertiseList']);

            Route :: get('Vedio.Upload',[VedioController :: class,'index']);
            Route :: get('LogoAdvertise',[LogoController :: class,'index']);
            Route :: post('logoAdd',[LogoController :: class,'LogoAdvertise']);
            Route :: post('Register',[LogoController :: class,'nonRegister']);

            Route :: post('UploadVedio',[VedioController :: class,'VedioSave']);
            Route::get('delete.vedio/{id}',[VedioController :: class,'DeleteVedio']);
            Route::get('edit.vedio/{id}',[VedioController :: class,'EditVedio']);
            Route::post('UpdateVedio/{id}',[VedioController :: class,'UpdateVedio']);

            Route :: get('Logo/List',[LogoController :: class,'Logolist'])->name('Logolist');

            // Admin Role logoAdd

            Route::get('delete.logo/{id}',[LogoController :: class,'DeleteVedio']);
            Route::get('edit.logo/{id}',[LogoController :: class,'EditVedio']);
            Route::post('UpdateLogo/{id}',[LogoController :: class,'UpdateVedio']);

            Route :: get('useraprove/{userid}',[DashboardController :: class,'useraprove']);
            Route :: get('add/category',[DashboardController :: class,'studentaprove'])->name('user.aprove');
            Route :: get('user.delete/{userid}',[DashboardController :: class,'userdelete']);
            // Route :: get('user/{userid}',[DashboardController :: class,'assignrole'])->name('assign.role');
            // Route :: get('permission/{userid}',[DashboardController :: class,'assignpermission'])->name('assign_permission');
            // Route :: post('permission',[DashboardController :: class,'permissionstore'])->name('permission.store');

            //LogoAdvertise nonRegister footerLink delete.footer
            Route :: get('aprovePayslip/{userid}',[RuConstructionUser :: class,'payaprove']);
            Route :: get('deletePayslip/{userid}',[RuConstructionUser :: class,'deletepay']);



            Route :: get('Footer/Link',[FooterController :: class,'Index'])->name('footerLink');
            Route :: get('Addfooter',[FooterController :: class,'Footer']);
            Route :: post('footerAdd',[FooterController :: class,'Store']);

            Route::get('delete.footer/{id}',[FooterController :: class,'DeleteFooter']);


            // profile edit

            Route::get('editprofile/{id}',[userlogin :: class,'editProfile'])->name('edit.profile');
            Route::post('Updateprofile',[userlogin :: class,'upadteProfile'])->name('updateProfile');


            // profile edit updateProfile

     });




            //Reda construction project upload brick.location brickview Land.found
            Route :: get('propertySearch/{userid}',[RuConstructionUser :: class,'searchproperty']);
            Route :: get('brickDashboard',[Construction :: class,'brickdashboard']);
            Route :: get('Brickadress.find',[Construction :: class,'adressfind']);
            Route :: post('bricklocation',[Construction :: class,'brickLocation'])->name('brick.location');
            Route :: get('brick/view/{brickid}',[Construction :: class,'brickview'])->name('brick.view');
            Route :: get('Apt/Location',[Construction :: class,'aptlocation'])->name('Aptlocation.find');
            Route :: get('Ploat/Location',[Construction :: class,'ploatlocation'])->name('Ploatlocation.find');
            Route :: post('Ploat/found',[Construction :: class,'Landfound'])->name('Land.found');
            Route :: get('land/view/{brickid}',[Construction :: class,'Landkview'])->name('Land.view');
            /*cement */
            Route::get('Cement/Dahboard',[CementController :: class,'index'])->name('cementDashboard');
            Route::post('Cement/Location',[CementController :: class,'CementLocation'])->name('cement.location');
            Route::get('Cement/address',[CementController :: class,'CementAdress'])->name('Cementadress.find');
            Route::get('Cement/view/{cementid}',[CementController :: class,'CementView'])->name('Cement.view');
            /*cement */

            /*steel*/
            Route::get('steel.search',[SteelController :: class,'steelSearch']);
            Route :: get('adressfind',[SteelController :: class,'adressfind'])->name('Steeladress.find');
            Route :: post('steel.location',[SteelController :: class,'steelfind'])->name('steel.location');
            Route :: get('steel/view/{stellid}',[SteelController :: class,'steelview'])->name('Steel.view');
            /*steel*/

            /*TilesRoute*/

            Route::get('Tiles.search',[TilesController :: class,'TilesSearch'])->name('Tiles.search');
            Route::get('Tilesadress.find',[TilesController :: class,'adressfind']);
            Route::post('tiles/location',[TilesController :: class,'locationfind'])->name('tiles.location');
            Route :: get('Tiles/view/{stellid}',[TilesController :: class,'tileslview'])->name('Tile.view');
            /*TilesRoute tiles.location*/

            /* Door route*/
            Route::get('Door.search',[Doorcontroller :: class,'DoorSearch'])->name('Door.search');
            Route::get('Dooradress.find',[Doorcontroller :: class,'adressfind']);
            Route::post('Door/location',[Doorcontroller :: class,'locationfind'])->name('door.location');
            Route :: get('door/view/{stellid}',[Doorcontroller :: class,'doorview'])->name('door.view');
            /* Door route*/


            /*Sanitary Route */
            Route::get('sanetary.search',[sanitaryController :: class,'SantarySearch'])->name('Sanetary.search');
            Route::get('Sanitaryadress.find',[sanitaryController :: class,'adressfind']);
            Route::post('sanitary/location',[sanitaryController :: class,'locationfind'])->name('sanitary.location');
            Route :: get('sanitary/view/{stellid}',[sanitaryController :: class,'Sanitaryview'])->name('Sanitary.view');


            /*Sanitary Route */


            // Route::get('Sanitaryadress.find',[sanitaryController :: class,'adressfind']);
            // Route::post('sanitary/location',[sanitaryController :: class,'locationfind'])->name('sanitary.location');
            // Route :: get('Door/view/{stellid}',[sanitaryController :: class,'Sanitaryview'])->name('Sanitary.view');

            /* Feeting route*/
            Route::get('Feeting.search',[FettingsController :: class,'FeetingSearch'])->name('Feeting.search');
            Route::get('feeting.find',[FettingsController :: class,'adressfind']);
            Route::post('feeting.save',[FettingsController :: class,'feetingsave']);
            Route::post('Feeting/location',[FettingsController :: class,'locationfind'])->name('feeting.location');
            Route::get('feetings/view/{stellid}',[FettingsController :: class,'Feetingview'])->name('Feeting.view');
            /* Feeting route */

            // sand route
            Route :: get('sand/search',[Sandcontroller :: class,'search'])->name('sand.search');
            Route::get('Sand.find',[Sandcontroller :: class,'adressfind']);
            Route::post('Sand/location',[Sandcontroller :: class,'Sandlocation'])->name('sand.location');
            Route::get('sand/view/{stellid}',[Sandcontroller :: class,'Sandview'])->name('Sand.view');
            //sand route

            // Hardware about.hardware
            Route :: get('about.hardware/{item}',[HardwareController :: class,'ProductIteam']);
            Route :: get('view.hardware/{itemid}',[HardwareController :: class,'Productview']);
            //


            //About company route

            Route::get('About/Company/{companyid}',[DashboardController::class,'aboutcompany'])->name('about.company');
            //About company route

            //Electric route //
            Route::get('see.electric/{electricid}',[electricController::class,'seeElectric']);
            Route::get('view.electric/{electricid}',[electricController::class,'ElectricProduct']);



            //Electric route //


            //Paint Route paint.location
             Route :: get('paint.search',[PaintController :: class,'search']);
             Route::get('paint.find',[PaintController :: class,'adressfind']);
             Route::post('paint.location',[PaintController :: class,'Paintlocation']);
             Route::get('paint.view/{paintid}',[PaintController::class,'PaintSee']);



            //Paint Route

            //Architect  architect.create // Architect.view

            Route :: get('architect.create',[ ArchitectController  :: class,'Index']);
            Route::get('Architect.find',[ ArchitectController  :: class,'adressfind']);
            Route :: post('Architect/location',[ ArchitectController  :: class,'search'])->name('Architect.location');
            Route::get('Architect/view/{id}',[ ArchitectController  :: class,'View'])->name('Architect.view');

            //Architect  Architect.find//



            //interior.search Interior route

            Route :: get('interior.search',[ InteriorController  :: class,'Index']);
            Route::get('Interior.find',[ InteriorController  :: class,'adressfind']);
            Route :: post('Interior/location',[ InteriorController  :: class,'search'])->name('Interior.location');
            Route::get('Interior.view/{id}',[ InteriorController  :: class,'View']);





   //



           //Steeladress.find Cement.view Land.view Password Reset Routes..assign.role permission.store Aptlocation.find Ploatlocation.find Cementadress.find
            Route::get('password/request', [resetpassword :: class,'showLinkRequestForm'])->name('password.request');
            Route::get('admin/password/request', [resetpassword :: class,'AdminshowLinkRequestForm'])->name('admin.password.request');
            Route::post('password/email', [resetpassword :: class,'mail'])->name('password.email');
            Route::post('admin/password/email', [resetpassword :: class,'adminmail'])->name('admin.password.email');
            Route::get('password/reset', [resetpassword :: class,'passwordreset'])->name('password.reset');
            Route::get('admin/password/reset', [resetpassword :: class,'adminpasswordreset'])->name('admin.password.reset');
            Route::post('password/update', [resetpassword :: class,'passwordupdate'])->name('password.update');
            Route::post('admin/password/update', [resetpassword :: class,'adminpasswordupdate'])->name('Adminpassword.update');

            Route::post('user/password/update', [resetpassword :: class,'userpasswordupdate'])->name('Userpassword.update');

            Route::get('user/password', [resetpassword :: class,'userpasswordreset'])->name('user.password.reset');
