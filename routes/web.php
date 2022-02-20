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
    return view('welcome');
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

Route::get('/clients', function () {

    if (Auth::user()->type === 'manager') {
        return response()->view('Views-manager/manager-clients');
    } elseif (Auth::user()->type === 'teleoperateur') {
        return response()->view('Views-teleoperateur/teleoperateur-clients');
    } else return redirect('404');
})->middleware(['auth'])->name('clients');


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
})->middleware(['auth'])->name('/equipe/ajout-membre');

Route::post('/equipe/ajout-membre', [ManagerController::class, 'storeNewMember'])->middleware(['auth'])->name('/equipe/ajout-membre');
Route::post('/equipe/supprimer-membre', [ManagerController::class, 'deleteMember'])->middleware(['auth'])->name('/equipe/supprimer-membre');

// Route::get('/test', [ManagerController::class, 'listTeamMembers']);
Route::get('/test', function () {
    return view('Views-manager/test');
});
