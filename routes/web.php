<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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




Route::get('/', function () {
    return view('welcome');
});
Route::get('/react', function () {
    return view('react-test');
});


Route::get('/dashboard', function () {    //THIS WILL GET REMOVED
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/my-dashboard', function () {

    if (Auth::user()->type === 'manager') {
        return view('manager-dashboard');
    } elseif (Auth::user()->type === 'teleoperateur') {
        return response()->view('teleoperateur-dashboard');
    } elseif (Auth::user()->type === 'commercial') {
        return response()->view('commercial-dashboard');
    } else return redirect('404');
})->middleware(['auth'])->name('my-dashboard');

Route::get('/equipe', function () {

    if (Auth::user()->type === 'manager') {
        return response()->view('manager-equipe');
    } elseif (Auth::user()->type === 'teleoperateur') {
        return response()->view('teleoperateur-equipe');
    } elseif (Auth::user()->type === 'commercial') {
        return response()->view('commercial-equipe');
    } else return redirect('404');
})->middleware(['auth'])->name('equipe');

Route::get('/clients', function () {

    if (Auth::user()->type === 'manager') {
        return response()->view('manager-clients');
    } elseif (Auth::user()->type === 'teleoperateur') {
        return response()->view('teleoperateur-clients');
    } else return redirect('404');
})->middleware(['auth'])->name('clients');


Route::get('/historique', function () {
    if (Auth::user()->type === 'teleoperateur') {
        return response()->view('teleoperateur-historique');
    } elseif (Auth::user()->type === 'commercial') {
        return response()->view('commercial-historique');
    } else return redirect('404');
})->middleware(['auth'])->name('historique');


Route::get('/scripts', function () {
    if (Auth::user()->type === 'manager') {
        return response()->view('manager-scripts');
    } else return redirect('404');
})->middleware(['auth'])->name('scripts');

Route::get('/rendezvous', function () {
    if (Auth::user()->type === 'commercial') {
        return response()->view('commercial-rendezvous');
    } else return redirect('404');
})->middleware(['auth'])->name('rendezvous');
