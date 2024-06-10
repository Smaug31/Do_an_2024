<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'home']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem']);
Route::get('/dang-ki', [IndexController::class, 'dangki'])->name('dang-ki');
Route::get('/dang-nhap', [IndexController::class, 'dangnhap'])->name('dang-nhap');
Route::get('/dang-xuat', [IndexController::class, 'dangxuat'])->name('dang-xuat');
Route::get('/yeu-thich', [IndexController::class, 'yeu_thich'])->name('yeu-thich');

Route::post('/register-publisher', [IndexController::class, 'register_publisher'])->name('register-publisher');
Route::post('/login-publisher', [IndexController::class, 'login_publisher'])->name('login-publisher');
Route::post('/themyeuthich', [IndexController::class, 'themyeuthich'])->name('themyeuthich');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);

