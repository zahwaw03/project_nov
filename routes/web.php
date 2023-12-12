<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;

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

// route login
route::get('/', [AuthController::class, 'login'])->name('login');
route::post('/', [AuthController::class, 'authenticated']);

// route logout
route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// route register
route::get('/register', [AuthController::class, 'register'])->name('register');
route::post('/register', [AuthController::class, 'register_action'])->name('register.action');

// route error
route::get('/unauthorized', [AdminController::class, 'error'])->name('error');

// dashboard diakses oleh admin dan user
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    // 
    route::get('/add-post' , [AuthorController::class, 'addPost']);
    route::post('/add-post' , [AuthorController::class, 'addPost_action'])->name('addPost.action');
    route::get('/add-post/edit/{id}' , [AuthorController::class , 'edit'])->name('add-post.edit');
    route::put('/add-post/update/{id}' , [AuthorController::class , 'update'])->name('add-post.update');
    route::get('/add-post/{posts}' , [AuthorController::class , 'destroy'])->name('add-post.destroy');

    // 
    route::get('/change-password' , [AuthController::class , 'password']);
    route::post('/change-password' , [AuthController::class , 'password_action'])->name('password.action');

});


// sebagai admin
Route::middleware(['auth', 'admin'])->group(function () {
    // route yang perlu diakses oleh pengguna dengan middleware 'auth' dan 'admin' di sini
    
    // 
    route::get('/add-user', [AdminController::class, 'addUser'])->name('addUser');
    route::post('/add-user', [AdminController::class, 'addUser_action'])->name('addUser.action');
    
    // 
    route::get('/manage-admin', [AdminController::class, 'dataAdmin']);
    route::get('/manage-admin/edit/{id}' , [AdminController::class, 'edit'])->name('manage-admin.edit');
    route::put('/manage-admin/update/{id}' , [AdminController::class, 'update'])->name('manage-admin.update');
    route::delete('/manage-admin/{user}' , [AdminController::class , 'destroy'])->name('manage-admin.destroy');

    // 
    route::get('/add-category' , [AdminController::class, 'addCategory']);
    route::post('/add-category' , [AdminController::class, 'addCategory_action'])->name('addCategory.action');

    // 
    route::get('/manage-category' , [AdminController::class , 'manageCategory']);
    route::get('/manage-category/edit/{id}' , [AdminController::class, 'edit1'])->name('manage-category.edit1');
    route::PUT('/manage-category/update/{id}' , [AdminController::class , 'update1'])->name('manage-category.update1');
    route::delete('/manage-category/{categories}' , [AdminController::class , 'destroy1'])->name('manage-category.destroy1');
});



// sebagai user
Route::middleware(['auth', 'author'])->group(function () {
    // route yang perlu diakses oleh pengguna dengan middleware 'auth' dan 'user' di sini
});
