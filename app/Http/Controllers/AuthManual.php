<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthManual extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role_id;
        
            if ($role == 1) {
                return redirect()->route('admin.index');
            } elseif ($role == 2) {
                return redirect()->route('petugas.index');
            } elseif ($role == 3) {
                return redirect()->route('cust.index');
            } else {
                Auth::logout();
                return back()->with('error', 'Role tidak dikenali');
            }
        }
        
        return back()->with('error', 'Incorrect Email or Password!');
    }

    function registerProses(Request $request){
        $validated =$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'no_telp' => 'required',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'password' => Hash::make($validated['password']),
            'role_id' => '3',
        ]);
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
