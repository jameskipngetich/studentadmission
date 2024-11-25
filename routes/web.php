<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\User;
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
    $usersdata=User::all();
    return view('admin.users.showUsers',compact(['usersdata']));
});

Route::get('/hostels',[App\Http\Controllers\HostelController::class,'index']);
       
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//USERS MANAGEMENT
Route::get('/adminShowUsers',[App\Http\Controllers\UserController::class,'adminShowUsers'])->name('adminShowUsers');
Route::post('/adminAddUsers',[App\Http\Controllers\UserController::class,'adminAddUsers'])->name('adminAddUsers');
Route::post('/adminUpdateUsers',[App\Http\Controllers\UserController::class,'adminUpdateUsers'])->name('adminUpdateUsers');
Route::post('/adminDeleteUsers',[App\Http\Controllers\UserController::class,'adminDeleteUsers'])->name('adminDeleteUsers');
Route::get('/adminExportUsersAsExcel',[App\Http\Controllers\UserController::class,'adminExportUsersAsExcel'])->name('adminExportUsersAsExcel');
Route::get('/adminExportUsersAsPdf',[App\Http\Controllers\UserController::class,'adminExportUsersAsPdf'])->name('adminExportUsersAsPdf');
Route::post('/adminImportUsersData',[App\Http\Controllers\UserController::class,'adminImportUsersData'])->name('adminImportUsersData');

//TRAINERS MANAGEMENT
Route::get('/adminShowTrainers',[App\Http\Controllers\TrainerController::class,'adminShowTrainers'])->name('adminShowTrainers');
Route::post('/adminAddTrainers',[App\Http\Controllers\TrainerController::class,'adminAddTrainers'])->name('adminAddTrainers');
Route::post('/adminUpdateTrainers',[App\Http\Controllers\TrainerController::class,'adminUpdateTrainers'])->name('adminUpdateTrainers');
Route::post('/adminDeleteTrainers',[App\Http\Controllers\TrainerController::class,'adminDeleteTrainers'])->name('adminDeleteTrainers');

//TRAINEES MANAGEMENT
Route::get('/adminShowTrainees',[App\Http\Controllers\TraineeController::class,'adminShowTrainees'])->name('adminShowTrainees');
Route::post('/adminAddTrainees',[App\Http\Controllers\TraineeController::class,'adminAddTrainees'])->name('adminAddTrainees');
Route::post('/adminUpdateTrainees',[App\Http\Controllers\TraineeController::class,'adminUpdateTrainees'])->name('adminUpdateTrainees');
Route::post('/adminDeleteTrainees',[App\Http\Controllers\TraineeController::class,'adminDeleteTrainees'])->name('adminDeleteTrainees');

//SCHOOL MANAGEMENT
Route::get('/adminShowSchools',[App\Http\Controllers\SchoolController::class,'adminShowSchools'])->name('adminShowSchools');
Route::post('/adminAddSchools',[App\Http\Controllers\SchoolController::class,'adminAddSchools'])->name('adminAddSchools');
Route::post('/adminUpdateSchools',[App\Http\Controllers\SchoolController::class,'adminUpdateSchools'])->name('adminUpdateSchools');
Route::post('/adminDeleteSchools',[App\Http\Controllers\SchoolController::class,'adminDeleteSchools'])->name('adminDeleteSchools');


//DEPARTMENT MANAGEMENT
Route::get('/adminShowDepartments',[App\Http\Controllers\DepartmentController::class,'adminShowDepartments'])->name('adminShowDepartments');
Route::post('/adminAddDepartment',[App\Http\Controllers\DepartmentController::class,'adminAddDepartment'])->name('adminAddDepartment');
Route::post('/adminUpdateDepartment',[App\Http\Controllers\DepartmentController::class,'adminUpdateDepartment'])->name('adminUpdateDepartment');
Route::post('/adminDeleteDepartment',[App\Http\Controllers\DepartmentController::class,'adminDeleteDepartment'])->name('adminDeleteDepartment');
Route::get('/adminExportDepartmentsAsExcel',[App\Http\Controllers\DepartmentController::class,'adminExportDepartmentsAsExcel'])->name('adminExportDepartmentsAsExcel');
Route::get('/adminExportDepartmentsAsPdf',[App\Http\Controllers\DepartmentController::class,'adminExportDepartmentsAsPdf'])->name('adminExportDepartmentsAsPdf');
Route::post('/adminImportDepartmentsData',[App\Http\Controllers\DepartmentController::class,'adminImportDepartmentsData'])->name('adminImportDepartmentsData');



//CLASSES MANAGEMENT
Route::get('/adminShowClass',[App\Http\Controllers\ClassController::class,'adminShowClass'])->name('adminShowClass');
Route::post('/adminAddClass',[App\Http\Controllers\ClassController::class,'adminAddClass'])->name('adminAddClass');
Route::post('/adminUpdateClass',[App\Http\Controllers\ClassController::class,'adminUpdateClass'])->name('adminUpdateClass');
Route::post('/adminDeleteClass',[App\Http\Controllers\ClassController::class,'adminDeleteClass'])->name('adminDeleteClass');
Route::get('/adminExportClassesAsExcel',[App\Http\Controllers\ClassController::class,'adminExportClassesAsExcel'])->name('adminExportClassesAsExcel');
Route::get('/adminExportClassesAsPdf',[App\Http\Controllers\ClassController::class,'adminExportClassesAsPdf'])->name('adminExportClassesAsPdf');
Route::post('/adminImportClassesData',[App\Http\Controllers\ClassController::class,'adminImportClassesData'])->name('adminImportClassesData');



//EXTRAS
Route::get('/example', function(){
    echo"Hello World";
})
?>
