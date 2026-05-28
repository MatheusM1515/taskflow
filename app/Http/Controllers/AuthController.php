<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|min:5'
        ]);

        $usuario = User::create([ 
            'name' => $request->nome, 
            'email' => $request->email,
            'password' => bcrypt($request->senha) 
        ]);

        Auth::login($usuario);

        $request->session()->regenerate();

        return redirect('/dashboard')->with('sucesso', 'Conta criada com sucesso!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->senha
        ])) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with('erro', 'Email ou senha inválidos');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}