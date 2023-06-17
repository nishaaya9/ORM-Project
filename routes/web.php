<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function () {
     return view('index');
});

Route::resource('student', StudentController::class);

Route::controller(StudentController::class)->group(function(){
     Route::get('/aboutus','aboutus')->name('aboutus');
     Route::get('/contactus','contactus')->name('contactus');
     Route::get('/gallery', 'gallery')->name('gallery');
});

// Route::get('/data', function () {
//     return view('data');
// });

//Route::get('/registration', [UserController::class, 'registration'])->name('registration');
//Route::post('/registerr', [EmployeeController::class, 'store'])->name('registerr');
//Route::get('/create', [StudentController::class, 'create'])->name('create')->middleware('employeemanagementsystem');
// Route::get('/login', [UserController::class, 'login'])->name('login');
// Route::post('/checklogin', [EmployeeController::class, 'index'])->name('checklogin');
// Route::get('/sessioncreate', [EmployeeController::class, 'sessioncreate'])->name('sessioncreate');
// Route::get('/logout', [EmployeeController::class, 'logout']);
// Route::resource('/student', StudentController::class)->middleware('employeemanagementsystem');
// Route::get('/student/{sid}/{sname?}', function ($sid, $sname = NULL) {
//     echo "Student Id=" . $sid . "<br>Student Name=" . $sname;
// })->where(['sid' => '[0-9]+', 'sname' => '[A-Za-z]+']);
