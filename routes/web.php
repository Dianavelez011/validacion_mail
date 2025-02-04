<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivacionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
    
    // Ruta para mostrar el formulario
    Route::get('/activacion', [ActivacionController::class, 'mostrarFormulario'])->name('activacion');
    
    // Ruta para procesar el formulario (si necesitas esta ruta)
    Route::post('/procesar', [ActivacionController::class, 'procesarFormulario'])->name('procesar.procesar');
});
