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

    Route::get('/users',[App\Http\Controllers\UsersController::class,'users'])
        ->name('users');

    //register login Route
    Route::middleware(['guest:web'])->group(function(){
        Route::get('/register',[App\Http\Controllers\RegisterController::class,'create'])
        ->name('register');
        Route::post('/register',[App\Http\Controllers\RegisterController::class,'store'])
            ->name('regist.post');
        Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])
            ->name('login');
        Route::post('/login',[App\Http\Controllers\LoginController::class,'doLogin'])
            ->name('doLogin');
    });

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin'])->group(function(){
            Route::get('/register',[App\Http\Controllers\AdminController::class,'create'])
            ->name('register');
            Route::post('/register',[App\Http\Controllers\AdminController::class,'store'])
                ->name('regist.post');
            Route::get('/login',[App\Http\Controllers\AdminController::class,'index'])
                ->name('login');
            Route::post('/login',[App\Http\Controllers\AdminController::class,'doLogin'])
                ->name('doLogin');
        });

        Route::middleware(['auth:admin'])->group(function(){
            Route::post('/logout',[App\Http\Controllers\AdminController::class,'logout'])
            ->name('logout');
            Route::get('/home',[App\Http\Controllers\AdminController::class,'home'])
            ->name('home');

            // 掲示板の削除
            Route::delete('/board/delete/{id}',[App\Http\Controllers\BulletinBoardsController::class,'destroy'])
            ->name('board.delete');
            // 管理人からの連絡作成
            Route::post('/info/store',[App\Http\Controllers\InfomationsController::class,'store'])
            ->name('info.post');
            // グループの削除
            Route::delete('/office/delete/{id}',[App\Http\Controllers\OfficesController::class,'destroy'])
            ->name('office.delete');

        });
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])
        ->name('logout');

        //user
        Route::get('/', [App\Http\Controllers\UsersController::class,'index'])
            ->name('home');
        Route::get('/show/{id}',[App\Http\Controllers\UsersController::class,'show'])
            ->name('user.show');
        Route::get('/create/{id}',[App\Http\Controllers\UsersController::class,'create'])
            ->name('user.create');
        Route::put('/edit/{id}',[App\Http\Controllers\UsersController::class,'edit'])
            ->name('user.edit');

        //board
        Route::get('/boards',[App\Http\Controllers\BulletinBoardsController::class,'index'])
            ->name('board.index');
        Route::get('/boards/form',[App\Http\Controllers\BulletinBoardsController::class,'form'])
            ->name('board.form');
        Route::post('/boards',[App\Http\Controllers\BulletinBoardsController::class,'store'])
            ->name('board.post');
        Route::get('/board/show/{id}',[App\Http\Controllers\BulletinBoardsController::class,'show'])
            ->name('board.show');
        Route::post('/{id}/opinions',[App\Http\Controllers\OpinionsController::class,'store'])
            ->name('opinion.post');

        //ajax
        Route::get('/community-app/ajax/messages',[App\Http\Controllers\Ajax\MessagesController::class,'index']);
        Route::get('/community-app/ajax/users',[App\Http\Controllers\Ajax\MessagesController::class,'users']);
        Route::get('/community-app/ajax/authUser',[App\Http\Controllers\Ajax\MessagesController::class,'authUser']);

        //scheduleSS
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


