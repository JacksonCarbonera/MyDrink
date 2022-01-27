<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\ValidaCPF;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $form = $request->validate([
            'email' => 'email|required|string',
            'password' => 'string|required'
        ]);

        
        if(!auth()->attempt($form)){ 
            return redirect()->route('home');
        }

        $auth = auth()->user(); 

        return redirect()->route('home')->with([
            'token' => $auth->createToken('LaravelSanctumAuth')->plainTextToken,
            'name' => $auth->name
        ]);
    }

    public function register(Request $request)
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
       ;
        $input['password'] = bcrypt($form['password']);
        $user = User::create($form);
        
        return redirect()->route('home')->with([
            'token' => $user->createToken('LaravelSanctumAuth')->plainTextToken,
            'name' => $user->name
        ]);
    }
}
