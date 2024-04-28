<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Inside app/Http/Middleware/IsAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{



    // public function handle(Request $request, Closure $next)
    // {
    //     if (auth()->check()) {
    //         if (auth()->user()->role === 'ADMIN') {
    //             $adminName = auth()->user()->name;
    //             View::share('adminName', $adminName);
    //         } else {
    //             // If the user is not an admin, redirect to home page or where appropriate
    //             return redirect()->route('home')->with('error', 'You do not have access to this page.');
    //         }
    //     }
    
    //     return $next($request);
    // }



    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has the 'ADMIN' role
        if (auth()->check() && auth()->user()->role === 'ADMIN') {
            return $next($request);
        } else {
            // If not admin, redirect to the home page with an error message
            return redirect()->route('home')->with('error', 'You do not have access to this page.');
        }
    }
}
