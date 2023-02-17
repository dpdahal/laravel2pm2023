<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages';

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view($this->backendPath . '.auth.login');
        }

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $userName = $request->username;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['username' => $userName, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}

