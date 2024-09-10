<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // ตรวจสอบว่าเป็น admin หรือไม่
        if (Auth::user()->is_admin) {
            // ผู้ใช้เป็น admin
            return redirect()->route('admin.dashboard');
        } else {
            // ผู้ใช้ทั่วไป
            return redirect()->route('user.dashboard');
        }
    }
}
