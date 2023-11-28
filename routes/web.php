<?php

use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/storeInSession', [ContactController::class, 'storeInSession'])->name('storeInSession');


// Show Coach Form And Save
Route::get('/coach', [ContactController::class, 'showCoachForm'])->name('coach');
Route::post('/saveAllData', [ContactController::class, 'saveAllData'])->name('saveAllData');

Route::get('/success' , [ContactController::class, 'Thankyou'])->name('success');





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
