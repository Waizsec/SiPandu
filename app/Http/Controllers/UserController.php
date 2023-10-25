<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\Stocks;
use App\Models\User;
use App\Models\Usertokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request){
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');
        session(['username' => Auth::user()->name]);

        $calculation = $totalIncome - $totalOutcome;
        if ($calculation < 0) {
            $totalmoney = '-';
        } elseif ($calculation >= 1000000) { 
            $totalmoney = floor($calculation / 1000); 
        } else {
            $totalmoney = $calculation; 
        }
    
        if (isset($request->search)) {
            $searchTerm = $request->search;
            $cashflows = $cashflows->filter(function($cashflow) use ($searchTerm) {
                return str_contains(strtolower($cashflow->cashflow), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->type), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->category), strtolower($searchTerm));
            });
            return view('user/dashboard', compact('cashflows', 'totalIncome', 'totalOutcome', 'searchTerm', 'totalmoney'));
        }else{
            return view('user/dashboard', compact('cashflows', 'totalIncome', 'totalOutcome', 'totalmoney'));
        }
        
    }


    public function showFinance(Request $request)
    {
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        if (isset($request->search)) {
            $searchTerm = $request->search;
            $cashflows = $cashflows->filter(function($cashflow) use ($searchTerm) {
                return str_contains(strtolower($cashflow->cashflow), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->type), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->category), strtolower($searchTerm));
            });
            return view('user/finance', compact('cashflows', 'searchTerm'));
        }else{
            return view('user/finance', compact('cashflows'));
        }
    }
    

    public function showSetting(){
        $tokencashier = Usertokens::where('userid', Auth::id())->where('role', 'cashier')->value('tokens');
        $tokenstock = Usertokens::where('userid', Auth::id())->where('role', 'stock')->value('tokens');
        $userInfo = Auth::user();

        // Years since joined
        $userRegistrationDate = $userInfo->created_at;
        $currentDate = Carbon::now();
        $years = $currentDate->diffInYears($userRegistrationDate);        

        // Total Eearning
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');

        $calculation = $totalIncome - $totalOutcome;
        if ($calculation < 0) {
            $totalmoney = '-';
        } elseif ($calculation >= 1000000) { 
            $totalmoney = floor($calculation / 1000000); 
        } else {
            $totalmoney = $calculation; 
        }
        
       if ($tokencashier != null) {
        return view('user/setting', compact('tokencashier', 'tokenstock', 'userInfo', 'years', 'totalmoney'));
       }else{
        return view('user/setting', compact('userInfo', 'years', 'totalmoney'));
       }
    }

    public function showStock(){
        if (session('tokens')) {
            $tokens = session('tokens');
            $user = Usertokens::where('tokens', $tokens)->where('role', 'stock')->first();
            if ($user) {
                $userId = $user->userid;
                $username = User::where('id', $userId)->value('name');
                if ($username) {
                    session(['username' => $username]);
                    session(['userid' => $userId]);
                    $stocks = Stocks::where('iduser', $userId)->get();
                    $types = Stocks::where('iduser',$userId)->distinct()->pluck('type')->unique()->all();
                    return view('/staff/stockdashboard', compact('stocks', 'types'));
                } else {
                    return redirect('/staff/login');
                }
            } else {
                return redirect('/staff/login');
            }
        } else {
            return redirect('/staff/login');
        }
    }
    
    public function showCashier(){

        if (session('tokens') != null) {
            $tokens = session('tokens');
            $user = Usertokens::where('tokens', $tokens)->where('role', 'cashier')->first();
            
            if ($user) {
                $userId = $user->userid;
                
                $username = User::where('id', $userId)->value('name');
                if ($username) {
                    session(['username' => $username]);
                    session(['userid' => $userId]);
                    $stocks = Stocks::where('iduser', $userId)->get();
                    $types = Stocks::where('iduser', $userId)->distinct()->pluck('type')->unique()->all();
                    return view('/staff/cashierdashboard', compact('stocks', 'types'));
                }
            }else{
                return redirect('/staff/login');
            }
        }else{
            return redirect('/staff/login');
        }
        
    }
}
