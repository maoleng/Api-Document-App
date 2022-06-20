<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView(): Application|Factory|View|RedirectResponse
    {
        if (session()->get('level') !== null) {
            return redirect()->route('api.index');
        }
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->all();
        $user = User::query()
            ->where('email', $data['email'])
            ->where('password', $data['password'])
            ->first();
        if (isset($user)) {
            session()->put('level', $user->level);
            session()->put('id', $user->id);
            return redirect()->route('api.index');
        }

        return redirect()->back();
    }

    public function logout(): RedirectResponse
    {
        session()->flush();
        return redirect()->route('login_view');
    }
}
