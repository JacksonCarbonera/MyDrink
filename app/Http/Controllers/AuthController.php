<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\ValidaCPF;
class AuthController extends Controller
{


    public function insert(Request $request)
    {
        $form = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'confirm_email' => 'required|same:email',
            'telefone' => 'required',
            'cpf' => ['required', new ValidaCPF],
        ]);

        $User = (new User)->fill($form);
        $User->password = Hash::make($form['password']);
        $User->save();

        return redirect()->route('home');
    }

    // Ações de login
    public function login(Request $request)
    {

        $form = $request->validate([
            'email' => 'email|required|string',
            'password' => 'string|required'
        ]);

        
        if (Auth::attempt($form)){
            session()->regenerate();
            return redirect()->route('home');
        }
    
        return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos.');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
