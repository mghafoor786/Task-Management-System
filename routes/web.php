<?php

use App\Http\Controllers\AdduserController;
use App\Http\Controllers\AlluserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsertaskController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.admin.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('send-email', [EmailController::class, 'sendEmail']);



//admin group
Route::group(['prefix' => 'admin/task-managment-system', 'as' => 'admin.', 'middleware' => ['auth',AdminMiddleware::class]], function () {

    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboardd');


    // Route::get('/admin',[AdminController::class,'admin'])->middleware(['auth'])->name('admin');

    Route::group(['prefix' => 'user'], function () {
        //All User routes
        Route::get('/all-users', [AlluserController::class, 'index'])->name('allUser');
        Route::post('/delete/{user}', [AlluserController::class, 'delete'])->name('delete');
        Route::get('/edit/{user}', [AlluserController::class, 'edit'])->name('edit');
        Route::post('/update/{user}', [AlluserController::class, 'update'])->name('update');
        Route::post('/form-submit', [AlluserController::class, 'store'])->name('formSubmit');
        //Add user
        Route::get('/add-users', [AdduserController::class, 'index'])->name('addUser');
    });


    Route::group(['prefix' => 'task'], function () {
        //tasks routes
        Route::get('/all-task', [TaskController::class, 'taskPage'])->name('allTask');

        Route::post('/add-task', [TaskController::class, 'storeTask'])->name('addTask');

        Route::get('/create-task', [TaskController::class, 'allTaskPage'])->name('createTask');

        Route::get('/delete/{task}', [TaskController::class, 'deleteTask'])->name('deleteTask');

        Route::get('/edit-task/{task}', [TaskController::class, 'editTask'])->name('editTask');

        Route::post('/update-task/{task}', [TaskController::class, 'updateTask'])->name('updateTask');

        Route::get('/view-task/{task}', [TaskController::class, 'viewTask'])->name('viewTask');
    });






    // Route::get('/delete{task}',[TaskController::class,'delete'])->name('delete');

    // Route::get('/delete{user}', [TaskController::class, 'delete'])->name('delete');

});


//user group

Route::group(['prefix' => 'user/task-managment-system', 'as' => 'user.', 'middleware' => ['auth',UserMiddleware::class]], function () {

    Route::get('/user', [UsertaskController::class, 'dashboard'])->name('dashboard');

    Route::get('/task', [UsertaskController::class, 'userTask'])->name('mytask');

    Route::get('/edit-user-task{task}', [UsertaskController::class, 'editUserTask'])->name('editUserTask');

    Route::post('/update-status-task{task}', [UsertaskController::class, 'updateStatus'])->name('updateStatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
