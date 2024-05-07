<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


// <?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\LoginRequest;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\View\View;

// class AuthenticatedSessionController extends Controller
// {
//     /**
//      * Display the login view.
//      */
//     public function create(): View
//     {
//         return view('auth.login');
//     }

//     /**
//      * Handle an incoming authentication request.
//      */
//     public function store(LoginRequest $request): RedirectResponse
//     {
//         if ($request->wantsJson()) {
//             // API authentication
//             if (!Auth::guard('api')->attempt($request->only('email', 'password'))) {
//                 return response()->json(['error' => 'Unauthorized'], 401);
//             }

//             $user = Auth::guard('api')->user();
//             $token = $user->createToken('API Token')->plainTextToken;

//             return response()->json(['token' => $token]);
//         }

//         // Web authentication
//         $request->authenticate();

//         $request->session()->regenerate();

//         return redirect()->intended(RouteServiceProvider::HOME);
//     }

//     /**
//      * Destroy an authenticated session.
//      */
//     public function destroy(Request $request): RedirectResponse
//     {
//         if ($request->wantsJson()) {
//             // API logout
//             Auth::guard('api')->logout();
//             return response()->json(['message' => 'Logged out']);
//         }

//         // Web logout
//         Auth::guard('web')->logout();

//         $request->session()->invalidate();

//         $request->session()->regenerateToken();

//         return redirect('/');
//     }
// }
