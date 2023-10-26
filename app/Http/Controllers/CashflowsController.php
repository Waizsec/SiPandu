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
    
 
    public function detail(Request $request)
    {
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $cashflowdetail = Cashflows::where('id', $request->id)->first();
        return view('user/finance', compact('cashflows', 'cashflowdetail')); 
        
    }

    public function delete(Request $request){
        $status = DB::table('cashflows')->where('id', $request->id)->delete();
        return redirect('/finance');
    }

    public function update(Request $request) {
        $id = $request->id;
    
        $affected = DB::table('cashflows')
            ->where('id', $id)
            ->update([
                'cashflow' => $request->cashflow,
                'type' => $request->type,
                'category' => $request->category,
                'total' => $request->total,
                'desc' => $request->desc,
            ]);
    
        if ($affected) {
            return redirect('/finance');
        }else{
            return redirect('/finance');
        }
    }

    public function generateReport(Request $request){
        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');
        session(['username' => Auth::user()->name]);

        $totalmoney = number_format($totalIncome - $totalOutcome, 0);
        $totalIncome = number_format($totalIncome, 0);
        $totalOutcome = number_format($totalOutcome, 0);
        return view('/generate/report', compact('cashflows', 'totalIncome', 'totalOutcome', 'totalmoney'));
    }
    
}
