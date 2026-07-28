<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        $titulo='Login de usuarios';
        return view('modules.auth.login', compact('titulo'));
    }
    public function logear(Request $request){
        $credenciales = $request->validate([
            'email'=> 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->withErrors(['email' => 'Credencial incorrecta.'])->withInput();
        }
        if(!$user->activo){
            return back()->withErrors(['email'=> 'Tu cuenta esta inactiva'])->withInput();
        }
         
        Auth::login($user);
        $request->session()->regenerate();
        return to_route('home');

    }
    public function crearAdmin(){
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'activo' => true,
            'rol'=> 'admin'
        ]);
        return "Admin creado con exito!";
    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
