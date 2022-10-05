<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\UsersController::class,'index'])
    ->name('home');
Route::get('/show/{id}',[App\Http\Controllers\UsersController::class,'show'])
    ->name('user.show');
Route::get('/create/{id}',[App\Http\Controllers\UsersController::class,'create'])
    ->name('user.create');
Route::put('/edit/{id}',[App\Http\Controllers\UsersController::class,'edit'])
    ->name('user.edit');

//register login Route
Route::get('/register',[App\Http\Controllers\RegisterController::class,'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register',[App\Http\Controllers\RegisterController::class,'store'])
    ->middleware('guest')
    ->name('regist.post');

Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login',[App\Http\Controllers\LoginController::class,'auth'])
    ->middleware('guest')
    ->name('auth');
    Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])
    ->middleware('auth')
    ->name('logout');

    //board
Route::group(['middleware'=>['auth']],function(){
    Route::get('/users',[App\Http\Controllers\UsersController::class,'users'])
        ->name('users');
        
    Route::get('/boards',[App\Http\Controllers\BulletinBoardsController::class,'index'])
        ->name('board.index');
    Route::get('/boards/form',[App\Http\Controllers\BulletinBoardsController::class,'form'])
        ->name('board.form');
    Route::post('/boards',[App\Http\Controllers\BulletinBoardsController::class,'store'])
        ->name('board.post');
    Route::get('/board/show/{id}',[App\Http\Controllers\BulletinBoardsController::class,'show'])
        ->name('board.show');
    Route::delete('/board/delete/{id}',[App\Http\Controllers\BulletinBoardsController::class,'destroy'])
        ->name('board.delete');

    Route::post('/{id}/opinions',[App\Http\Controllers\OpinionsController::class,'store'])
        ->name('opinion.post');

    //schedule
    Route::post('/schedules',[App\Http\Controllers\SchedulesController::class,'store'])
        ->name('schedule.post');
    Route::get('/schedules/form/{id}',[App\Http\Controllers\SchedulesController::class,'form'])
        ->name('schedule.form');
    Route::get('/schedules',[App\Http\Controllers\SchedulesController::class,'currentMonth'])
        ->name('schedule.current');
    Route::get('/schedules/all',[App\Http\Controllers\SchedulesController::class,'index'])
        ->name('schedules.all');
    Route::get('/schedules/edit/{id}',[App\Http\Controllers\SchedulesController::class,'edit'])
        ->name('schedule.edit');
    Route::put('/schedules/update/{id}',[App\Http\Controllers\SchedulesController::class,'update'])
        ->name('schedule.update');
    Route::delete('/schedules/delete/{id}',[App\Http\Controllers\SchedulesController::class,'destroy'])
        ->name('schedule.delete');

    //infomation
    Route::get('/info/form',[App\Http\Controllers\InfomationsController::class,'form'])
        ->name('info.form');
    Route::post('/info/store',[App\Http\Controllers\InfomationsController::class,'store'])
        ->name('info.post');
    Route::get('/info',[App\Http\Controllers\InfomationsController::class,'index'])
        ->name('info.index');
    Route::get('/info/show/{id}',[App\Http\Controllers\InfomationsController::class,'show'])
        ->name('info.show');


    //office
    Route::post('/office/store',[App\Http\Controllers\OfficesController::class,'store'])
        ->name('office.post');
    Route::get('/office',[App\Http\Controllers\OfficesController::class,'index'])
        ->name('office.index');
    Route::get('office/form',[App\Http\Controllers\OfficesController::class,'form'])
        ->name('office.form');
    Route::get('/office/show/{id}',[App\Http\Controllers\OfficesController::class,'show'])
        ->name('office.show');
});
