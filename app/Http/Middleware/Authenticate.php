<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
     //   if (!Auth::check()) {
            // หากผู้ใช้ไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า login
     //       return redirect()->route('login');
     //   }

        // หากผู้ใช้ล็อกอินแล้ว ให้ดำเนินการต่อไป
     //   return $next($request);
    }
    }

