<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AuthLogin extends Controller
{
    public function AuthUser(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        

        if (Auth::attempt($credentials)) {
                
            $request->session()->regenerate();
            

            $dtuser = User::where('email', $credentials['email'])->first();

            // Mengambil data biji kopi dan jumlah stock biji kopi
                           

            if( $dtuser->role == "admin"){
            
                return redirect('/dashboard_regprogpelanggan/'.$dtuser->id);
                
                
            } elseif ($dtuser->role == "user") {
                // Mengirimkan objek pengguna ke view  
                return redirect('/pelanggan/'.$dtuser->id);
                
            } 
            
        }
        
        return back()->withErrors([
            'email' => 'The email and/or password is incorrect !!',
        ])->onlyInput('email');    
        
    }

    public function Logout(Request $request) 
    {
        Auth::logout();
        $request -> session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');

    }
}