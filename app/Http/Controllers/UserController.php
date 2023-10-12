<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $cashflows = Cashflows::all(); 
        $totalIncome = Cashflows::where('type', 'income')->sum('total');
        $totalOutcome = Cashflows::where('type', 'outcome')->sum('total');
        $netIncome = $totalIncome - $totalOutcome;
        return view('user/dashboard', compact('cashflows', 'totalIncome', 'totalOutcome', 'netIncome')); 
    }
    public function register(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ];
        User::create($data);

 
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/dashboard');
        }else{
            return redirect('login');
        }
    }

    public function login(Request $request)
    {
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/dashboard');
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }   
    
}
