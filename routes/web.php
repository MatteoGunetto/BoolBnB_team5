<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\MessageController;

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

// aggiunto middleware per rendere rotta accessibile solo a utenti loggati
Route::get('Apartment/create', [ApartmentController::class, "create"])->name('Apartment.create')
->middleware(['auth', 'verified']);

Route::post('Apartment/store', [ApartmentController::class, "store"])->name('Apartment.store')
->middleware(['auth', 'verified']);

Route::put('Apartment/update/{id}', [ApartmentController::class, "update"])->name('Apartment.update')
->middleware(['auth', 'verified']);

Route::get('Apartment/edit/{id}', [ApartmentController::class, "edit"])->name('Apartment.edit')
->middleware(['auth', 'verified']);

Route::get('Apartment/myApartments', [ApartmentController::class, "showOnlyYourApartments"])->name('Apartment.myApartments')
->middleware(['auth', 'verified']);
Route::get('Apartment/myMessages', [MessageController::class, "showOnlyYourMessages"])->name('Apartment.myMessages')
->middleware(['auth', 'verified']);

Route :: delete('Apartment/destroy/{id}', [ApartmentController :: class, 'destroy'])
    -> name('Apartment.destroy')->middleware(['auth', 'verified']);

Route::get('/Apartment/myApartments', function () {
    return view('Apartment/myApartments');
})->middleware(['auth', 'verified'])->name('Apartment/myApartments');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::post('Apartment/show/{apartmentid}/message', [MessageController::class, "store"])->name('message.store')
;


//apre la pagina dove puoi scegliere la promozione per l'appartamento
Route::get('Apartment/selectSponsorship/{id}', [ApartmentController::class, "selectSponsorship"])->name('Apartment.selectSponsorship')
->middleware(['auth', 'verified']);

//qui ti fa vedere opzione selezionata e ti fa compilare il form per il pagamento
Route::get('Apartment/sponsorApartment/{apartment_id}/{promotion_id}', [ApartmentController::class, "sponsorApartment"])->name('Apartment.sponsorApartment')
->middleware(['auth', 'verified']);

//rotta per creare promozione per appartamento dopo il pagamento
Route::post('Apartment/payPromotion', [ApartmentController::class, "payPromotion"])->name('Apartment.payPromotion')
->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
