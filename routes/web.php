<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Models\Dokter;
use App\Models\Pasien;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ETS
Route::get('/form', function () {
    return view('form');
});
Route::get("/form", [RecordController::class, 'index']);
Route::get('/record', [RecordController::class, 'record']);
Route::post('/record-success', [RecordController::class, 'proses']);
Route::get('/record/{record:slug}', [RecordController::class, 'content']);

Route::get("/dokter/{dokter:id}", function(Dokter $dokter) {
    return view('form', [
        'title' => 'Formulir Rekam Medis',
        'formulir' => $dokter->formulir
    ]);
});
Route::get("/pasien/{pasien:id}", function(Pasien $pasien) {
    return view('form', [
        'title' => 'Formulir Rekam Medis',
        'formulir' => $pasien->formulir
    ]);
});

require __DIR__.'/auth.php';
