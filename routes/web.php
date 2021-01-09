<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SendToViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentsModelController;
use App\Http\Controllers\EmployeeControllerModel;
use App\Http\Controllers\SessionCookieController;
use App\Http\Controllers\UploadFileController;

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
    return view('welcome');
});


Route::get("send-to-view",[SendToViewController::class,'index']);
Route::get("send-to-view/with",[SendToViewController::class,'usingWith']);
Route::get("send-to-view/with-name",[SendToViewController::class,'usingWithName']);
Route::get("send-to-view/with-compact",[SendToViewController::class,'usingCompact']);
Route::resource("products",ProductController::class);

//(lect7)
Route::resource("continents",ContinentController::class);
Route::resource("students",StudentsController::class);
Route::get("students/{id}/delete" ,[StudentsController::class,'destroy'])->name("students.delete");

//(lect 8)
Route::resource("employees",EmployeeController::class);
Route::get("employees/{id}/delete" ,[EmployeeController::class,'destroy'])->name("employees.delete");

// for Model (lect.9)
Route::get("students-model/paging" ,[StudentsModelController::class,'paging'])->name("students-paging");
Route::get("students-model/search" ,[StudentsModelController::class,'search'])->name("students-search");
Route::get("students-model/search-paging-advanced" ,[StudentsModelController::class,'searchPagingAdvanced'])->name("students-search-paging-advanced");
Route::get("students-model/search-paging" ,[StudentsModelController::class,'searchPaging'])->name("students-search-paging");

Route::resource("students-model",StudentsModelController::class);
Route::get("students-model/{id}/delete" ,[StudentsModelController::class,'destroy'])->name("students-model.delete");

//task for lect.9
Route::resource("employees-model",EmployeeControllerModel::class);
Route::get("employees-model/{id}/delete" ,[EmployeeControllerModel::class,'destroy'])->name("employees-model.delete");

Route::get("session-cookie/secure",[SessionCookieController::class,'sessionSecure'])->name("session-secure");
Route::get("session-cookie/login",[SessionCookieController::class,'sessionLogin'])->name("session-login");
Route::post("session-cookie/login",[SessionCookieController::class,'sessionPostLogin'])->name("session-post-login");
Route::get("session-cookie/signout",[SessionCookieController::class,'sessionSignout'])->name("session-signout");

Route::get ("upload-file",[UploadFileController::class,'uploadFile'])->name("upload-file");
Route::post ("upload-file",[UploadFileController::class,'postUploadFile'])->name("post-upload-file");
Route::get ("download-file",[UploadFileController::class,'getSecureFile'])->name("download-file");


