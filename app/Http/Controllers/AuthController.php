<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usertokens;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = [
            'name' => ucfirst($request->name),
            'email' => $request->email,
            'phone' => $request->phone,
            'region' => ucfirst($request->region),
            'income_start' => $request->income_start,
            'password' => Hash::make($request->password),
            'created_at' => now(),  // Set the 'created_at' column
            'updated_at' => now(),  
        ];
        
        // Insert into the 'users' table using the Query Builder
        DB::table('users')->insert($data);

 
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            session(['rating' => $user->rating]);
            session(['type' => $user->type]);
            return redirect('/dashboard');
        }else{
            return redirect('/register');
        }
    }

    public function login(Request $request)
    {
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            session(['rating' => $user->rating]);
            session(['type' => $user->type]);
            switch ($user->type) {
                case 'admin':
                    return redirect('/admin');
                case 'user':
                case 'company':
                    return redirect('/dashboard');
                default:
                    return redirect('/');
            }
        } else {
            return redirect('/');
        }
        
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        // Ini buat ngapus session nanti ke direct ke halaman login
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }   

    public function logoutStaff(Request $request){
        Auth::logout();
        // Ini buat ngapus session staff nanti direct ke halaman login staff
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/staff/login');
    }

    public function loginStaff(Request $request)
    {
        $count = Usertokens::where('role', $request->role)
                            ->where('tokens', $request->tokens)
                            ->count();
    
        if ($count == 1) {
            session(['tokens' => $request->tokens]);
            if ($request->role == 'cashier') {
                return redirect('/cashier/dashboard');
            }elseif($request->role == 'stock'){
                return redirect('/stock/dashboard');
            }
        }else{
            return redirect('/staff/login');
        }
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
            session(['type' => 'user']);
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
            session(['type' => 'company']);
        }
        return redirect('/setting');
    }

    public function rating(Request $request)
    {
        if ($request->remove !== null) {
            session(['rating' => 'false']);
            return redirect('/dashboard');
        }else{
            $request->validate([
                'rating' => 'required|integer|between:1,5',
            ]);
            $user = Auth::user();
            DB::table('users')->where('id', $user->id)->update(['rating' => $request->rating]);
            session(['rating' => $request->rating]);
            return redirect('/dashboard');
        }
       
    }

}
