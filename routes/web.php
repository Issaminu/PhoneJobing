<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeleoperateurController;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/manager-dashboard', function () {
//     return view('manager-dashboard');
// });
// Route::get('/manager-equipe', function () {
//     return view('manager-equipe');
// });
// Route::get('/manager-clients', function () {
//     return view('manager-clients');
// });
// Route::get('/manager-scripts', function () {
//     return view('manager-scripts');
// });
// Route::get('/login-verification', function () {


//     //return view('manager-scripts');
// });
// Route::get('/login', [RegisterController::class, 'login'])->middleware('guest');
// Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Route::post('/logout', [SessionsController::class, 'destroy']);

require __DIR__ . '/auth.php';



Route::get('/', function () {
    // return view('welcome');
    return redirect('/dashboard');
});
Route::get('/react', function () {
    return view('react-test');
});


Route::get('/dashboard', [DashboardController::class, 'dashboardRouting'])->middleware(['auth'])->name('dashboard');


Route::get('/my-dashboard', function () { //THIS ROUTE IS FORMALLY REPLACED BY "/dashboard", NOW IT JUST REDIRECTS TO "/dashboard" BUT IT NEEDS TO REMAIN AS A ROUTE FOR BACKWARDS COMPATIBILITY OF SOME OF MY VIEWS
    return redirect('/dashboard');
})->name('my-dashboard');

Route::get('/equipe', [ManagerController::class, 'listTeamMembers'])->middleware(['auth'])->name('equipe');

Route::get('/produits', [ManagerController::class, 'listProducts'])->middleware(['auth'])->name('produits');

Route::get('/clients', [ManagerController::class, 'listClients'])->middleware(['auth'])->name('clients');

Route::get('/scripts', [ManagerController::class, 'listScripts'])->middleware(['auth'])->name('scripts');

Route::get('/historique', [ManagerController::class, 'listCalls'])->middleware(['auth'])->name('historique');


Route::get('/rendezvous', function () {
    if (Auth::user()->type === 'commercial') {
        return response()->view('Views-commercial/commercial-rendezvous');
    } else return redirect('404');
})->middleware(['auth'])->name('rendezvous');

Route::get('/equipe/ajout-membre', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-add-member');
    } else return redirect('404');
})->middleware(['auth'])->name('equipe/ajout-membre');

Route::get('/produits/ajout-produit', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-add-product');
    } else return redirect('404');
})->middleware(['auth'])->name('produits/ajout-produit');

Route::get('/clients/ajout-client', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-add-client');
    } else return redirect('404');
})->middleware(['auth'])->name('clients/ajout-client');

Route::get('/scripts/ajout-script', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-add-script');
    } else return redirect('404');
})->middleware(['auth'])->name('scripts/ajout-script');

Route::get('/scripts/modifier-script/{slug}', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/modify-script');
    } else return redirect('404');
})->middleware(['auth'])->name('scripts/modifier-script/{slug}');

Route::get('/equipe/{slug}', [ManagerController::class, 'profileMember'])->middleware(['auth'])->name('equipe/{slug}');
Route::get('/clients/{slug}', [ManagerController::class, 'profileClient'])->middleware(['auth'])->name('clients/{slug}');
Route::get('/scripts/{slug}', [ManagerController::class, 'profileScript'])->middleware(['auth'])->name('scripts/{slug}');

Route::post('/equipe/ajout-membre', [ManagerController::class, 'storeNewMember'])->middleware(['auth'])->name('/equipe/ajout-membre');
Route::post('/equipe/modifier-membre', [ManagerController::class, 'modifyMember'])->middleware(['auth'])->name('/equipe/modifier-membre');
Route::post('/equipe/supprimer-membre', [ManagerController::class, 'deleteMember'])->middleware(['auth'])->name('/equipe/supprimer-membre');
Route::post('/produits/ajout-produit', [ManagerController::class, 'storeNewProduct'])->middleware(['auth'])->name('/produits/ajout-produit');
Route::post('/produits/modifier-produit', [ManagerController::class, 'modifyProduct'])->middleware(['auth'])->name('/produits/modifier-produit');
Route::post('/produits/supprimer-produit', [ManagerController::class, 'deleteProduct'])->middleware(['auth'])->name('/produits/supprimer-produit');
Route::post('/clients/ajout-client', [ManagerController::class, 'storeNewClient'])->middleware(['auth'])->name('/clients/ajout-client');
Route::post('/clients/modifier-client', [ManagerController::class, 'modifyClient'])->middleware(['auth'])->name('/clients/modifier-client');
Route::post('/clients/supprimer-client', [ManagerController::class, 'deleteClient'])->middleware(['auth'])->name('/clients/supprimer-client');
Route::post('/scripts/ajout-script', [ManagerController::class, 'storeNewScript'])->middleware(['auth'])->name('/scripts/ajout-script');
Route::post('/scripts/modifier-script', [ManagerController::class, 'changeScript'])->middleware(['auth'])->name('/scripts/modifier-script');
Route::post('/scripts/enregistrer-script', [ManagerController::class, 'modifyScript'])->middleware(['auth'])->name('/scripts/enregistrer-script');
Route::post('/scripts/supprimer-script', [ManagerController::class, 'deleteScript'])->middleware(['auth'])->name('/scripts/supprimer-script');

// The function callSetup is defined in DashboardController. for more info, check the route "/dashboard" in this current file.
Route::post('/dashboard/appel', [TeleoperateurController::class, 'callStart'])->middleware(['auth'])->name('/dashboard/appel');
Route::post('/dashboard/sauvegarder-appel', [TeleoperateurController::class, 'callSave'])->middleware(['auth'])->name('/dashboard/sauvegarder-appel');



Route::post('/test/test', [ManagerController::class, 'test'])->middleware(['auth']);
Route::get('/test', function () {
    return view('Views-manager/test');
})->middleware(['auth']);
