<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // ตรวจสอบว่าผู้ใช้ล็อกอินแล้วและเป็น admin หรือไม่
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // เปลี่ยนเส้นทางไปยังหน้า dashboard ถ้าไม่ใช่ admin
        return redirect()->route('dashboard');  // ใช้ชื่อเส้นทางแทน URL
    }
}
