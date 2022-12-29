<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\apiloginController;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route :: get('/emergency',[apiloginController :: class,'apiemergency']);
Route :: get('/rajshahi_city',[apiloginController :: class,'apirajshahi']);
Route :: get('/additional_duty',[apiloginController :: class,'ProfileDetails']);
Route :: get('/faculty',[apiloginController :: class,'facultyDetails']);
Route :: get('/office',[apiloginController :: class,'OfficeDetails']);
Route :: get('/teacher/{code}',[apiloginController :: class,'adminDetails']);
Route :: get('/officer/{code}',[apiloginController :: class,'OfficerDetails']);
Route :: get('/stuff/{code}',[apiloginController :: class,'StaffDetails']);
Route :: POST('/Loginpage',[apiloginController :: class,'loginpage']);


