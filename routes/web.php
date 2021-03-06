<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PenggunaanBarangController;
use App\Http\Controllers\Transaksi2Controller;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SimulasigajiController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\SimulasiBarangController;
use App\Models\Simulasi;
use GuzzleHttp\Middleware;

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
    return view('/dashboard.index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::resource('/dashboard/user', UserController::class)->middleware('auth');
// Route::resource('/dashboard/member', MemberController::class)->middleware('auth');
// Route::resource('/dashboard/outlet', OutletController::class)->middleware('auth');
// Route::resource('/dashboard/paket', PaketController::class)->middleware('auth');

Route::group(['prefix' => 'a', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('a.dashboard');
    Route::resource('member', MemberController::class);
    Route::get('export/member', [MemberController::class, 'exportMember'])->name('export-member');
    Route::get('template/member', [MemberController::class, 'template'])->name('template-member');
    Route::post('member/import', [MemberController::class, 'importMember'])->name('import-member');

    //enggunaanBarang
    Route::resource('PenggunaanBarang', PenggunaanBarangController::class);
    Route::post('StatusBarang', [PenggunaanBarangController::class, 'StatusBarang'])->name('StatusBarang');
    Route::get('export/PenggunaanBarang', [PenggunaanBarangController::class, 'exportPenggunaanBarang'])->name('export-PenggunaanBarang');
    Route::post('import/PenggunaanBarang', [PenggunaanBarangController::class, 'importPenggunaanBarang'])->name('import-PenggunaanBarang');
    Route::resource('penjemputan', PenjemputanController::class);
    Route::resource('transaksi', TransaksiController::class);

    Route::resource('paket', PaketController::class);
    Route::get('export/paket', [PaketController::class, 'exportPaket'])->name('export-paket');
    Route::post('paket/import', [PaketController::class, 'importPaket'])->name('import-paket');

    Route::resource('outlet', OutletController::class);
    Route::get('export/outlet', [OutletController::class, 'exportOutlet'])->name('export-outlet');
    Route::post('import/outlet', [OutletController::class, 'importOutlet'])->name('import-outlet');

    Route::resource('user', UserController::class);


    Route::get('data_buku', [SimulasiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('simulasigaji', [SimulasigajiController::class, 'index']);
    Route::get('simulasibarang', [SimulasibarangController::class, 'index']);
    Route::get('transaksi/faktur/{faktur}', [TransaksiController::class, 'faktur']);
    Route::post('status', [PenjemputanController::class, 'status'])->name('status');
    Route::get('export/penjemputan', [PenjemputanController::class, 'exportData'])->name('export-penjemputan');
    Route::post('import/penjemputan', [penjemputanController::class, 'importData'])->name('import-penjemputan');
});

Route::group(['prefix' => 'k', 'middleware' => ['isKasir', 'auth']], function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('k.dashboard');
    Route::resource('member', MemberController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('paket', PaketController::class);
    Route::get('laporan', [LaporanController::class, 'index']);
});

Route::group(['prefix' => 'o', 'middleware' => ['isOwner', 'auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('o.dashboard');
    Route::get('laporan', [LaporanController::class, 'index']);
});
