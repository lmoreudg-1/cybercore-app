<?php 

use App\Http\Controllers\ThreatController;
use Illuminate\Support\Facades\Route;

// Ruta principal que lista las amenazas y muestra el formulario
Route::get('/', [ThreatController::class, 'index'])->name('cybercore.index');

// Ruta para procesar el formulario de guardado
Route::post('/threats', [ThreatController::class, 'store'])->name('cybercore.store');

// Ruta para eliminar registros
Route::delete('/threats/{threat}', [ThreatController::class, 'destroy'])->name('cybercore.destroy');