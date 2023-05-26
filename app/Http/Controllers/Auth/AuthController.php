<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formRegister()
	{
		return view('auth.register');
	}

	public function formLogin()
	{
		if (Auth::check())
			return redirect()->route('user.index');

		return view('auth.login');
	}

	public function login(AuthLoginRequest $request)
	{
		$credentials = $request->validated();

		if (Auth::attempt($credentials)) {

			$request->session()->regenerate();

			return redirect()->intended(route('user.index'));
		}

		return redirect()->route('auth.login');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('auth.login');
	}
}
