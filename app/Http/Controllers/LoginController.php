<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') { // หรือ $user->is_admin === true;
            return redirect('/admin/dashboard');
        }

        return redirect('/home');
    }
}
