
<?php

use App\Http\Controllers\AdddataController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
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

Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/home', [CustomAuthController::class, 'homeregis'])->name('homeRegis');

Route::get('/new',[UserController::class, 'new'])->name('new');

// เช็คก่อนว่าล็อคอินหรือไม่ 
Route::group(['middleware' => 'AlreadyLogIn'], function () {
    Route::get('/login', [CustomAuthController::class, 'login'])->name('homelogin');
    Route::get('/regis', [CustomAuthController::class, 'regis'])->name('homeregis');

    // เส้นทางอื่นๆที่ต้องใช้ middleware เช่นเดียวกัน
});

//ต้องล็อคอินก่อน
Route::group(['middleware' => 'IsLoggedIn'], function () {
        Route::get('/', [AdddataController::class, 'adminhome'])->name('adminhome');
        Route::get('/pageadd', [AdddataController::class, 'addpage'])->name('pageadd');
        Route::get('/pagedatajson', [AdddataController::class, 'pagedatajson'])->name('pagedatajson');
        Route::get('/editpage/{page_id}', [AdddataController::class, 'editpage'])->name('editpage');
        Route::put('/updatePage', [AdddataController::class, 'updatePage'])->name('updatePage');
        Route::post('/storePage', [AdddataController::class, 'storePage'])->name('storePage');
        Route::get('/createHome', [AdddataController::class, 'addhome'])->name('createHome');
        Route::get('/toggle-status/{page_id}', [AdddataController::class, 'changeStatus'])->name('changeStatusPage');
        Route::get('/dbdata/{page_id}', [AdddataController::class, 'dbdata'])->name('dbdata');
        Route::post('/storedata', [AdddataController::class, 'store'])->name('storedata');
});

Route::get('/logout', [CustomAuthController::class, 'logoutUser'])->name('logout');
