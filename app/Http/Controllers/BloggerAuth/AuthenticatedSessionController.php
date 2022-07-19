<?php

namespace App\Http\Controllers\BloggerAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blogger.login.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
    
        $request->authenticate('blogger');

        $request->session()->regenerate();
        

        if(auth('blogger')->user()->active){
            return redirect()->route('blogger.dashboard');

        }else{
            Auth::guard('blogger')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            throw ValidationException::withMessages([
                'active' => trans('auth.actived'),
            ]);

            return redirect()->route('blogger.login');
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('blogger')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('blogger.login');
    }
}
