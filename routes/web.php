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
    Route::get('/boards/create',[App\Http\Controllers\BulletinBoardsController::class,'create'])
        ->name('board.create');
    Route::post('/boards',[App\Http\Controllers\BulletinBoardsController::class,'store'])
        ->name('board.post');
    Route::get('/board/{id}/show',[App\Http\Controllers\BulletinBoardsController::class,'show'])
        ->name('board.show');

    Route::post('/{id}/opinions',[App\Http\Controllers\OpinionsController::class,'store'])
        ->name('opinion.post');

    //schedule
    Route::get('/schedules/create',[App\Http\Controllers\SchedulesController::class,'create'])
        ->name('schedule.create');
    Route::post('/schedules',[App\Http\Controllers\SchedulesController::class,'store'])
        ->name('schedule.post');
    Route::get('/schedules',[App\Http\Controllers\SchedulesController::class,'currentMonth'])
        ->name('schedule.current');
    Route::get('/schedules/all',[App\Http\Controllers\SchedulesController::class,'index'])
        ->name('schedules.all');
    Route::get('/schedules/{id}/edit',[App\Http\Controllers\SchedulesController::class,'edit'])
        ->name('schedule.edit');
    Route::put('/schedules/{id}/update',[App\Http\Controllers\SchedulesController::class,'update'])
        ->name('schedule.update');
    Route::delete('/schedules/{id}/delete',[App\Http\Controllers\SchedulesController::class,'destroy'])
        ->name('schedule.delete');

    //infomation
    Route::get('/info/create',[App\Http\Controllers\InfomationsController::class,'create'])
        ->name('info.create');
    Route::post('/info/store',[App\Http\Controllers\InfomationsController::class,'store'])
        ->name('info.post');
    Route::get('/info/{id}/show',[App\Http\Controllers\InfomationsController::class,'show'])
        ->name('info.show');
    Route::get('/info',[App\Http\Controllers\InfomationsController::class,'index'])
        ->name('info.index');
});
