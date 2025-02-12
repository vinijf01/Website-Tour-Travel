<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SlideController;

use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\WhyUsController;
use App\Http\Controllers\Admin\SertifikasiController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\JamaahAdminController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DataController;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/kontak', function () {
    return view('contact');
})->name('kontak');

Auth::routes();

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
// Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', function () {
    return view('admin.beranda');
})->middleware('auth:admin');

Route::resource('admin/news', NewsController::class);
Route::get('/admin/data/user', [DataController::class, 'index'])->name('data.index');
Route::resource('admin/jamaah', JamaahAdminController::class);
Route::resource('admin/slide', SlideController::class);
Route::resource('admin/bank', BankController::class);
Route::resource('admin/galeri', GaleriController::class);
Route::resource('admin/sertifikasi', SertifikasiController::class);
Route::resource('admin/informasi', InformasiController::class);
Route::resource('admin/testimoni', TestimoniController::class);
Route::resource('admin/whyus', WhyUsController::class);
Route::resource('admin/mitra', MitraController::class);
Route::resource('admin/profile', ProfileController::class);
Route::get('/admin/order', [OrderController::class, 'index_order'])->name('index_orderALL');
Route::get('/admin/user', [JamaahController::class, 'show_jamaah'])->name('show_jamaah');


Route::put('/status/{id}/update', [OrderController::class, 'status'])->name('update_status');

Route::get('/admin/service/create', [ServiceController::class, 'create_service'])->name('create_service');
Route::post('/admin/service/create', [ServiceController::class, 'store_service'])->name('store_service');
Route::get('/service/{service}/edit', [ServiceController::class, 'edit_service'])->name('edit_service');
Route::patch('/service/{service}/update', [ServiceController::class, 'update_service'])->name('update_service');
Route::get('/service/umroh', [ServiceController::class, 'umroh_service'])->name('umroh_service');
Route::get('/service/haji', [ServiceController::class, 'haji_service'])->name('haji_service');
Route::get('/service/paket', [ServiceController::class, 'paket_service'])->name('paket_service');
Route::get('/admin/service', [ServiceController::class, 'index_service'])->name('index_service');
Route::get('/service/{service}', [ServiceController::class, 'show_service'])->name('show_service');
Route::delete('/service/{service}', [ServiceController::class, 'delete_service'])->name('delete_service');
Route::get('admin/service/{id}', [ServiceController::class, 'detailService'])->name('detail-service');

Route::get('/order', [OrderController::class, 'index_order_user'])->name('index_order');
Route::post('/order', [OrderController::class, 'store_order'])->name('store_order');
Route::get('/order/{order}/edit', [OrderController::class, 'dp_receipt'])->name('dp_receipt');
Route::patch('/order/{order}/update', [OrderController::class, 'submit_dp_receipt'])->name('submit_dp_receipt');
Route::get('/order/{order}/edita', [OrderController::class, 'payment_receipt'])->name('payment_receipt');
Route::patch('/order/{order}/updatea', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
Route::patch('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
Route::get('order/status/{status}', [OrderController::class, 'statusOrder'])->name('order.status');

Route::get('/jamaah/confirm-{id}', [JamaahController::class, 'create_jamaah'])->name('create_jamaah');
Route::post('/jamaah/{service}/create', [JamaahController::class, 'store_jamaah'])->name('store_jamaah');
Route::get('jamaah-{id}', [OrderController::class, 'detailJamaah'])->name('jamaah.detail');

Route::get('detail-{id}', [OrderController::class, 'detail'])->name('order.detail.order');
Route::get('transaksi-order/{id}', 'OrderController@detailOrder')->name('detail-order');

// Route::get('/order/create', [OrderController::class, 'create_order'])->name('create_service');
// Route::post('/order/create', [OrderController::class, 'store_order'])->name('store_service');
// Route::get('/', [ServiceController::class, 'our_service'])->name('our_service');

Route::get('news-{id}', [NewsController::class, 'detailNews'])->name('news.detail.news');
Route::get('/member/news', [NewsController::class, 'show'])->name('news.show');

Route::get('/detail/jamaah/{jamaahDetail}/edit', [JamaahController::class, 'detail_edit_jamaah'])->name('detail_edit_jamaah');
Route::put('/detail/jamaah/{jamaahDetail}/update', [JamaahController::class, 'detail_update_jamaah'])->name('detail_update_jamaah');
Route::get('data-jamaah-{id}', [OrderController::class, 'detailJamaah'])->name('detail.jamaah');
Route::get('list-data-jamaah-{id}', [JamaahController::class, 'dataJamaah'])->name('list-data-detail');
