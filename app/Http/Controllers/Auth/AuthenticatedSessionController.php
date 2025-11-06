<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     *

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

        $user = $request->user();

        //$tipo = strtolower($user->time);

        // if ($tipo === 'd') {
        //     return redirect()->route('tarrpt_dev.index'); // ou direto /tarrpt_dev
        // }

        // if ($tipo === 's') {
        //     return redirect()->route('tarrpt.index'); // ou direto /tarrpt
        // }

        return redirect('/home'); // fallback padrão
    }


    public function devIndex(){
        $rpt = \App\Models\Tarrpt::paginate(10); // 10 por página, você pode alterar
        return view('tarrpt_dev', compact('rpt'));
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
