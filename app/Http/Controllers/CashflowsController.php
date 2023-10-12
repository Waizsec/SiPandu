<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashflowsController extends Controller
{
    public function store(Request $request)
    {
        $cashflow = new Cashflows();
        $cashflow->cashflow = $request->cashflow;
        $cashflow->type = $request->type;
        $cashflow->category = $request->category;
        $cashflow->total = $request->total;
        $cashflow->desc = $request->desc;
        $cashflow->iduser = Auth::id(); 
        $cashflow->save();
    
        return redirect('/finance');
    }

    public function show()
    {
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        return view('user/finance', compact('cashflows')); 
    }
    
 
    public function detail(Request $request)
    {
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $cashflowdetail = Cashflows::where('idFinance', $request->id)->first();
        return view('user/finance', compact('cashflows', 'cashflowdetail')); 
        
    }

    public function delete(Request $request){
        $status = DB::table('cashflows')->where('IdFinance', $request->id)->delete();
        return redirect('/finance');
    }
}
