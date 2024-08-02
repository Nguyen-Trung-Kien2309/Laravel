<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Kiểm tra nếu người dùng không đăng nhập hoặc không có quyền
        if (!Auth::check() || $request->user()->role !== $role) {
            // Redirect hoặc abort nếu không có quyền
            return redirect('/')->with('error', 'Unauthorized action.');
        }

        return $next($request);
    }
}
