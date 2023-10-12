<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\User;
use App\Models\Usertokens;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Tampilan
    public function index(){
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');
        session(['username' => Auth::user()->name]);
        return view('user/dashboard', compact('cashflows', 'totalIncome', 'totalOutcome'));
    }

    public function showSetting(){
        $tokencashier = Usertokens::where('userid', Auth::id())->where('role', 'cashier')->value('tokens');
        $tokenstock = Usertokens::where('userid', Auth::id())->where('role', 'stock')->value('tokens');

        
       if ($tokencashier != null) {
        return view('user/setting', compact('tokencashier', 'tokenstock'));
       }else{
        return view('user/setting');
       }
    
        
    }
    
    // Authentification
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
            // ngegenerate session
            $request->session()->regenerate();
            return redirect('/dashboard');
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        // Ini buat ngapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }   

    public function updateStatus()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        
        if ($user->type === 'company') {
            if (DB::table('users')
                ->where('id', $userId)
                ->update(['type' => 'user'])) {
                if (DB::table('usertokens')
                    ->where('userid', $userId)
                    ->delete());
            } 
        } elseif ($user->type === 'user') {
            if (DB::table('users')
                ->where('id', $userId)
                ->update(['type' => 'company'])) {
                $cashierToken = Str::random(10);
                $stockToken = Str::random(10);
                if (DB::table('usertokens')->insert([
                    ['userid' => $userId, 'tokens' => $cashierToken, 'role' => 'cashier'],
                    ['userid' => $userId, 'tokens' => $stockToken, 'role' => 'stock'],
                ])); 
            } 
        }
        return redirect('/setting');
    }
    
}
