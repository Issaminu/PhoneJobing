<?php


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
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
    return redirect('/login');
});
Route::get('/react', function () {
    return view('react-test');
});


Route::get('/dashboard', function () {
    if (Auth::user()->type === 'manager') {
        return view('Views-manager/manager-dashboard');
    } elseif (Auth::user()->type === 'teleoperateur') {
        return response()->view('Views-teleoperateur/teleoperateur-dashboard');
    } elseif (Auth::user()->type === 'commercial') {
        return response()->view('Views-commercial/commercial-dashboard');
    } else return redirect('404');
})->middleware(['auth'])->name('dashboard');


Route::get('/my-dashboard', function () { //THIS ROUTE IS FORMALLY REPLACED BY "/dashboard", NOW IT JUST REDIRECTS TO "/dashboard" BUT IT NEEDS TO REMAIN AS A ROUTE FOR BACKWARDS COMPATIBILITY OF SOME OF MY VIEWS
    return redirect('/dashboard');
})->name('my-dashboard');

Route::get('/equipe', [ManagerController::class, 'listTeamMembers'])->middleware(['auth'])->name('equipe');

Route::get('/produits', [ManagerController::class, 'listProducts'])->middleware(['auth'])->name('produits');

Route::get('/clients', [ManagerController::class, 'listClients'])->middleware(['auth'])->name('clients');


Route::get('/historique', function () {
    if (Auth::user()->type === 'teleoperateur') {
        return response()->view('Views-teleoperateur/teleoperateur-historique');
    } elseif (Auth::user()->type === 'commercial') {
        return response()->view('Views-commercial/commercial-historique');
    } else return redirect('404');
})->middleware(['auth'])->name('historique');


Route::get('/scripts', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-scripts');
    } else return redirect('404');
})->middleware(['auth'])->name('scripts');

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

Route::get('/equipe/{slug}', [ManagerController::class, 'profileUser'])->middleware(['auth'])->name('equipe/{slug}');
Route::get('/equipe/{slug}', [ManagerController::class, 'profileUser'])->middleware(['auth'])->name('equipe/{slug}');
Route::get('/clients/{slug}', [ManagerController::class, 'profileClient'])->middleware(['auth'])->name('clients/{slug}');


Route::post('/equipe/ajout-membre', [ManagerController::class, 'storeNewMember'])->middleware(['auth'])->name('/equipe/ajout-membre');
Route::post('/equipe/supprimer-membre', [ManagerController::class, 'deleteMember'])->middleware(['auth'])->name('/equipe/supprimer-membre');
Route::post('/produits/modifier-produit', [ManagerController::class, 'modifyProduct'])->middleware(['auth'])->name('/produits/modifier-produit');
Route::post('/produits/supprimer-produit', [ManagerController::class, 'deleteProduct'])->middleware(['auth'])->name('/produits/supprimer-produit');
Route::post('/produits/ajout-produit', [ManagerController::class, 'storeNewProduct'])->middleware(['auth'])->name('/produits/ajout-produit');
Route::post('/clients/ajout-client', [ManagerController::class, 'storeNewClient'])->middleware(['auth'])->name('/clients/ajout-client');
Route::post('/clients/supprimer-client', [ManagerController::class, 'deleteClient'])->middleware(['auth'])->name('/clients/supprimer-client');

// Route::get('/test', [ManagerController::class, 'listTeamMembers']);
Route::get('/test', function () {
    return view('Views-manager/test');
});
