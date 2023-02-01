<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FraisController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RenumerationController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\KilometrageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testController;
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


//Route::middleware(['auth'])->group(function(){});

//Partie d'etudiant
Route::get('/etudiant/index', [EtudiantController::class, 'index'])->middleware(['auth'])->name('etudiant.index');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->middleware(['auth'])->name('etudiant.create');
Route::post('/etudiant/store', [EtudiantController::class, 'store'])->middleware(['auth'])->name('etudiant.store');
Route::get('/etudiant/show{id}', [EtudiantController::class, 'show'])->middleware(['auth'])->name('etudiant.show');
Route::get('/etudiant/edit{id}', [EtudiantController::class, 'edit'])->middleware(['auth'])->name('etudiant.edit');
Route::post('/etudiant/update{id}', [EtudiantController::class, 'update'])->middleware(['auth'])->name('etudiant.update');
Route::delete('/etudiant/destroy{id}', [EtudiantController::class, 'destroy'])->middleware(['auth'])->name('etudiant.destroy');

//Partie du frais
Route::get('/Frais/index',[FraisController::class, 'index'])->middleware(['auth'])->name('Frais.index');
Route::get('/Frais/create',[FraisController::class, 'create'])->middleware(['auth'])->name('Frais.create');
Route::post('/Frais/store',[FraisController::class, 'store'])->middleware(['auth'])->name('Frais.store');
Route::get('/Frais/show{frais}',[FraisController::class, 'show'])->middleware(['auth'])->name('Frais.show');
Route::get('/Frais/edit{frais}',[FraisController::class, 'edit'])->middleware(['auth'])->name('Frais.edit');
Route::post('/Frais/update{frais}',[FraisController::class, 'update'])->middleware(['auth'])->name('Frais.update');
Route::delete('/Frais/destroy{id}',[FraisController::class, 'destroy'])->middleware(['auth'])->name('Frais.destroy');
Route::get('/Frais/TestPdf{frais}',[FraisController::class, 'pdf'])->middleware(['auth'])->name('Frais.pdf');
//Partie d'ecole
Route::get('/ecole/index',[EcoleController::class, 'index'])->middleware(['auth'])->name('Ecole.index');
Route::get('/ecole/create',[EcoleController::class, 'create'])->middleware(['auth'])->name('Ecole.create');
Route::post('/ecole/store',[EcoleController::class, 'store'])->middleware(['auth'])->name('Ecole.store');
Route::get('/ecole/show{id}',[EcoleController::class, 'show'])->middleware(['auth'])->name('Ecole.show');
Route::get('/ecole/edit{id}',[EcoleController::class, 'edit'])->middleware(['auth'])->name('Ecole.edit');
Route::post('/ecole/update{id}',[EcoleController::class, 'update'])->middleware(['auth'])->name('Ecole.update');
Route::delete('/ecole/destroy{id}',[EcoleController::class, 'destroy'])->middleware(['auth'])->name('Ecole.destroy');

//Partie d'employe
Route::get('/employe/index',[EmployeController::class, 'index'])->middleware(['auth'])->name('Employe.index');
Route::get('/employe/create',[EmployeController::class, 'create'])->middleware(['auth'])->name('Employe.create');
Route::post('/employe/store',[EmployeController::class, 'store'])->middleware(['auth'])->name('Employe.store');
Route::get('/employe/show{id}',[EmployeController::class, 'show'])->middleware(['auth'])->name('Employe.show');
Route::get('/employe/edit{id}',[EmployeController::class, 'edit'])->middleware(['auth'])->name('Employe.edit');
Route::post('/employe/update{id}',[EmployeController::class, 'update'])->middleware(['auth'])->name('Employe.update');
Route::delete('/employe/destroy{id}',[EmployeController::class, 'destroy'])->middleware(['auth'])->name('Employe.destroy');

//Partie du fournisseur
Route::get('/fournisseur/index',[FournisseurController::class, 'index'])->middleware(['auth'])->name('Fournisseur.index');
Route::get('/fournisseur/create',[FournisseurController::class, 'create'])->middleware(['auth'])->name('Fournisseur.create');
Route::post('/fournisseur/store',[FournisseurController::class, 'store'])->middleware(['auth'])->name('Fournisseur.store');
Route::get('/fournisseur/show{id}',[FournisseurController::class, 'show'])->middleware(['auth'])->name('Fournisseur.show');
Route::get('/fournisseur/edit{id}',[FournisseurController::class, 'edit'])->middleware(['auth'])->name('Fournisseur.edit');
Route::post('/fournisseur/update{id}',[FournisseurController::class, 'update'])->middleware(['auth'])->name('Fournisseur.update');
Route::delete('/fournisseur/destroy{id}',[FournisseurController::class, 'destroy'])->middleware(['auth'])->name('Fournisseur.destroy');

//Partie du profil
Route::get('/profil/index',[ProfilController::class, 'index'])->middleware(['auth'])->name('Profil.index');
Route::get('/profil/create',[ProfilController::class, 'create'])->middleware(['auth'])->name('Profil.create');
Route::post('/profil/store',[ProfilController::class, 'store'])->middleware(['auth'])->name('Profil.store');
Route::get('/profil/show{id}',[ProfilController::class, 'show'])->middleware(['auth'])->name('Profil.show');
Route::get('/profil/edit{id}',[ProfilController::class, 'edit'])->middleware(['auth'])->name('Profil.edit');
Route::post('/profil/update{id}',[ProfilController::class, 'update'])->middleware(['auth'])->name('Profil.update');
Route::delete('/profil/destroy{id}',[ProfilController::class, 'destroy'])->middleware(['auth'])->name('Profil.destroy');

//Partie du renumeration
Route::get('/Renumeration/index',[RenumerationController::class, 'index'])->middleware(['auth'])->name('Renumeration.index');
Route::get('/Renumeration/create',[RenumerationController::class, 'create'])->middleware(['auth'])->name('Renumeration.create');
Route::post('/Renumeration/store',[RenumerationController::class, 'store'])->middleware(['auth'])->name('Renumeration.store');
Route::get('/Renumeration/show{renumeration}',[RenumerationController::class, 'show'])->middleware(['auth'])->name('Renumeration.show');
Route::get('/Renumeration/edit{renumeration}',[RenumerationController::class, 'edit'])->middleware(['auth'])->name('Renumeration.edit');
Route::post('/Renumeration/update{renumeration}',[RenumerationController::class, 'update'])->middleware(['auth'])->name('Renumeration.update');
Route::delete('/Renumeration/destroy{id}',[RenumerationController::class, 'destroy'])->middleware(['auth'])->name('Renumeration.destroy');

//Partie du depense
Route::get('/depense/index',[DepenseController::class, 'index'])->middleware(['auth'])->name('Depense.index');
Route::get('/depense/create',[DepenseController::class, 'create'])->middleware(['auth'])->name('Depense.create');
Route::post('/depense/store',[DepenseController::class, 'store'])->middleware(['auth'])->name('Depense.store');
Route::get('/depense/show{depense}',[DepenseController::class, 'show'])->middleware(['auth'])->name('Depense.show');
Route::get('/depense/download{depense}',[DepenseController::class, 'download'])->middleware(['auth'])->name('Depense.download');
Route::get('/depense/edit{depense}',[DepenseController::class, 'edit'])->middleware(['auth'])->name('Depense.edit');
Route::post('/depense/update{depense}',[DepenseController::class, 'update'])->middleware(['auth'])->name('Depense.update');
Route::delete('/depense/destroy{id}',[DepenseController::class, 'destroy'])->middleware(['auth'])->name('Depense.destroy');

//Partie du transport
Route::get('/transport/index',[TransportController::class, 'index'])->middleware(['auth'])->name('Transport.index');
Route::get('/transport/create',[TransportController::class, 'create'])->middleware(['auth'])->name('Transport.create');
Route::post('/transport/store',[TransportController::class, 'store'])->middleware(['auth'])->name('Transport.store');
Route::get('/transport/show{transport}',[TransportController::class, 'show'])->middleware(['auth'])->name('Transport.show');
Route::get('/transport/edit{transport}',[TransportController::class, 'edit'])->middleware(['auth'])->name('Transport.edit');
Route::post('/transport/update{transport}',[TransportController::class, 'update'])->middleware(['auth'])->name('Transport.update');
Route::delete('/transport/destroy{id}',[TransportController::class, 'destroy'])->middleware(['auth'])->name('Transport.destroy');

//Partie du kilometrage
Route::get('/kilometrage/index',[KilometrageController::class, 'index'])->middleware(['auth'])->name('Kilometrage.index');
Route::get('/kilometrage/create',[KilometrageController::class, 'create'])->middleware(['auth'])->name('Kilometrage.create');
Route::post('/kilometrage/store',[KilometrageController::class, 'store'])->middleware(['auth'])->name('Kilometrage.store');
Route::get('/kilometrage/show{kilometrage}',[KilometrageController::class, 'show'])->middleware(['auth'])->name('Kilometrage.show');
Route::get('/kilometrage/edit{kilometrage}',[KilometrageController::class, 'edit'])->middleware(['auth'])->name('Kilometrage.edit');
Route::post('/kilometrage/update{kilometrage}',[KilometrageController::class, 'update'])->middleware(['auth'])->name('Kilometrage.update');
Route::delete('/kilometrage/destroy{id}',[KilometrageController::class, 'destroy'])->middleware(['auth'])->name('Kilometrage.destroy');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';

//Test
Route::get('/test', [testController::class, 'create'])->name('test');
