<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Client;
use App\Models\Script;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use PDO;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function dashboardRouting(Request $request)
    {
        if (Auth::user()->type === 'manager') {
            $ManagerController = new ManagerController;
            return $ManagerController->dashboard($request);
        } elseif (Auth::user()->type === 'teleoperateur') {
            $TeleoperateurController = new TeleoperateurController;
            return $TeleoperateurController->callSetup($request);
        } elseif (Auth::user()->type === 'commercial') {
            return view('Views-commercial/commercial-dashboard');
        } else return redirect('404');
    }
}
