<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\Invoice;
use App\Models\Invoicedetail;
use App\Models\Stocks;
use App\Models\User;
use App\Models\Usertokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function getAdmin(){

        // Average Rating
        $averageRating = User::whereNotNull('rating')->avg('rating');

        // Average Growth
        $averageDifference = round(DB::table('cashflow_difference_view')->value('average_difference'));
        $averageIncomeStart = round(User::whereNotNull('income_start')->avg('income_start'));
        $growth = $averageDifference - $averageIncomeStart;
        $percentageDifference = (($averageDifference - $averageIncomeStart) / abs($averageIncomeStart)) * 100;

        // Grafik Total User
        $totaluser = DB::table('fact_totalusers')
            ->join('dim_regions', 'fact_totalusers.sk_regions', '=', 'dim_regions.sk_regions')
            ->join('dim_usertypes', 'fact_totalusers.sk_usertypes', '=', 'dim_usertypes.sk_usertypes')
            ->join('dim_dates', 'fact_totalusers.year_month', '=', 'dim_dates.year_month')
            ->get();

        //Grafik User Growth 
        $userGrowth = DB::table('fact_avggrowth')
            ->join('dim_regions', 'fact_avggrowth.sk_regions', '=', 'dim_regions.sk_regions')
            ->join('dim_usertypes', 'fact_avggrowth.sk_usertypes', '=', 'dim_usertypes.sk_usertypes')
            ->join('dim_dates', 'fact_avggrowth.year_month', '=', 'dim_dates.year_month')
            ->get();   

        // Grafik Selling Items
        $sellingItems = DB::table('fact_sellingitems')
            ->join('dim_regions', 'fact_sellingitems.sk_regions', '=', 'dim_regions.sk_regions')
            ->join('dim_dates', 'fact_sellingitems.year_month', '=', 'dim_dates.year_month')
            ->join('dim_items', 'fact_sellingitems.itemid', '=', 'dim_items.itemid')
            ->select('dim_regions.region', 'dim_dates.dates', 'dim_items.items', 'fact_sellingitems.total_quantity')
            ->get();

        
        $bestSellingItems = DB::table('fact_sellingitems')
            ->select(
                'dim_items.items',
                'dim_dates.dates',
                DB::raw('SUM(fact_sellingitems.total_quantity) as total_quantity'),
                DB::raw('ROUND(AVG(fact_sellingitems.total_quantity)) as avg_quantity')
            )
            ->groupBy('dim_items.items', 'dim_dates.dates')
            ->join('dim_items', 'fact_sellingitems.itemid', '=', 'dim_items.itemid')
            ->join('dim_dates', 'fact_sellingitems.year_month', '=', 'dim_dates.year_month')
            ->get();
            
        $regions = DB::table('dim_regions')->select('region')->get();
        
        return Inertia::render('Admin', [
            'averageRating' => number_format($averageRating, 1),
            'averageIncomeStart' => number_format($averageIncomeStart),
            'averageGrowth' => number_format($growth),
            'percentageDifference' => number_format($percentageDifference,1),
            'totaluser' => $totaluser,
            'usergrowth' => $userGrowth,
            'sellingItems' => $sellingItems,
            'bestSellingItems' => $bestSellingItems,
            'regions' => $regions
        ]);
    }



    
    public function index(Request $request){
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');
        session(['username' => Auth::user()->name]);

        $totalmoney = number_format($totalIncome - $totalOutcome, 0);
        $totalIncome = number_format($totalIncome, 0);
        $totalOutcome = number_format($totalOutcome, 0);
    
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
        $types = Cashflows::where('iduser',Auth::id())->distinct()->pluck('category')->unique()->all();
        if (isset($request->search)) {
            $searchTerm = $request->search;
            $cashflows = $cashflows->filter(function($cashflow) use ($searchTerm) {
                return str_contains(strtolower($cashflow->cashflow), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->type), strtolower($searchTerm))
                    || str_contains(strtolower($cashflow->category), strtolower($searchTerm));
            });
            return view('user/finance', compact('cashflows', 'searchTerm', 'types'));
        }else{
            return view('user/finance', compact('cashflows', 'types'));
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
    
    public function showCashier(Request $request){
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
                    if(session()->has('cart')) { 
                        $cart = session('cart'); 
                        $totalPrice = 0;
                        foreach ($cart as $item) {
                            $stock = Stocks::where('stockid', $item['id'])->first(); 
                            if ($stock) {
                                $cartItem = [
                                    'id' => $stock->stockid,
                                    'items' => $stock->items,
                                    'amount' => $item['amount'],
                                    'prices' => number_format($stock->sell_price, 2, '.', ','), 
                                    'total' => number_format($stock->sell_price * $item['amount'], 2, '.', ',') 
                                ];                                
                                $carts[] = $cartItem;
                                $totalPrice += ($stock->sell_price * $item['amount']);
                            }
                        }
                        $plainTotalPrice = $totalPrice;
                        $totalPrice = number_format($totalPrice, 2, '.', ',');
                        
                        if (isset($request->search)) {
                            $searchTerm = $request->search;
                            $stocks = $stocks->filter(function($stocks) use ($searchTerm) {
                                return str_contains(strtolower($stocks->items), strtolower($searchTerm))
                                    || str_contains(strtolower($stocks->type), strtolower($searchTerm));
                            });
                            return view('/staff/cashierdashboard', compact('stocks', 'types', 'carts', 'totalPrice', 'plainTotalPrice', 'searchTerm'));
                        }else{
                            return view('/staff/cashierdashboard', compact('stocks', 'types', 'carts', 'totalPrice', 'plainTotalPrice'));
                        }
                    }else{
                        if (isset($request->search)) {
                            $searchTerm = $request->search;
                            $stocks = $stocks->filter(function($stocks) use ($searchTerm) {
                                return str_contains(strtolower($stocks->items), strtolower($searchTerm))
                                    || str_contains(strtolower($stocks->type), strtolower($searchTerm));
                            });
                            return view('/staff/cashierdashboard', compact('stocks', 'types', 'searchTerm'));
                        }else{
                            return view('/staff/cashierdashboard', compact('stocks', 'types'));
                        }
                        
                    }
                }
            }else{
                return redirect('/staff/login');
            }
        }else{
            return redirect('/staff/login');
        }
    }

    public function ShowCashierHistory(Request $request){
        $invoices = Invoice::where('iduser', session('userid'))->get();
        if (isset($request->search)) {
            $searchTerm = $request->search;
            $invoices = $invoices->filter(function($invoices) use ($searchTerm) {
                return str_contains(strtolower($invoices->custname), strtolower($searchTerm))
                    || str_contains(strtolower($invoices->total), strtolower($searchTerm));
            });
            return view('staff/cashierhistory', compact('invoices',  'searchTerm'));
        }else{
            return view('staff/cashierhistory', compact('invoices'));
        }
    }

    public function updateCart(Request $request){
        if ($request->has(['amount', 'id'])) { 
            $cartItem = ['id' => $request->id, 'amount' => $request->amount]; 
            if (session()->has('cart')) { 
                $cart = session('cart'); 
                $itemIndex = array_search($request->id, array_column($cart, 'id')); 
                if ($itemIndex !== false) { 
                    $cart[$itemIndex]['amount'] += $request->amount;
                    session()->forget('cart');
                    session(['cart' => $cart]);
                    return redirect()->to('cashier/dashboard');
                }else{ 
                    $cart[] = $cartItem; 
                    session(['cart' => $cart]); 
                    return redirect()->to('cashier/dashboard');
                }
            }else{ 
                session(['cart' => [$cartItem]]);  
                return redirect()->to('cashier/dashboard');
            }
        }
    }

    public function resetCart(){
        session()->forget('cart');
        return redirect()->to('/cashier/dashboard');
    }
}

