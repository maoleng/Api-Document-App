<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView(): Application|View|Factory
    {
        return view('login');
    }

    public function login(Request $request): array
    {

        return $request->all();
    }
}
