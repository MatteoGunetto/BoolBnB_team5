<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApartmentController;

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
//     return view('Apartment.index');
// });



Route::get('/', [ApartmentController::class, "index"])->name('Apartment.index');

Route::get('Apartment/show/{id}', [ApartmentController::class, "show"])->name('Apartment.show');

Route::get('Apartment/edit', [ApartmentController::class, "edit"])->name('Apartment.edit');

Route::put('Apartment/update', [ApartmentController::class, "update"])->name('Apartment.update');

// aggiunto middleware per rendere rotta accessibile solo a utenti loggati
Route::get('Apartment/create', [ApartmentController::class, "create"])->name('Apartment.create')
->middleware(['auth', 'verified']);

Route::post('Apartment/store', [ApartmentController::class, "store"])->name('Apartment.store')
->middleware(['auth', 'verified']);

Route::get('Apartment/edit', [ApartmentController::class, "edit"])->name('Apartment.edit')
->middleware(['auth', 'verified']);

Route::put('Apartment/update', [ApartmentController::class, "update"])->name('Apartment.update')
->middleware(['auth', 'verified']);

Route::get('Apartment/myApartments', [ApartmentController::class, "showOnlyYourApartments"])->name('Apartment.myApartments')
->middleware(['auth', 'verified']);

Route :: delete('Apartment/destroy/{id}', [ApartmentController :: class, 'destroy'])
    -> name('Apartment.destroy')->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
