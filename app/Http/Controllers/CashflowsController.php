<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\Invoice;
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

        $cashflows = Cashflows::where('iduser', Auth::id())->get();
        $totalIncome = $cashflows->where('type', 'income')->sum('total');
        $totalOutcome = $cashflows->where('type', 'outcome')->sum('total');
        session(['username' => Auth::user()->name]);
        $totalmoney = number_format($totalIncome - $totalOutcome, 0);
        $totalIncome = number_format($totalIncome, 0);
        $totalOutcome = number_format($totalOutcome, 0);
        $requestedMonth = $request->month;
        $requestedYear = $request->year;
        $previousMonth = ($requestedMonth == 1) ? 12 : ($requestedMonth - 1);
        $previousYear = ($requestedMonth == 1) ? ($requestedYear - 1) : $requestedYear;
        $query = DB::table('cashflows')->where('iduser', Auth::id());
        $currentMonthCashflow = $query->where('type', 'income')
        ->whereMonth('created_at','=', $requestedMonth)
        ->whereYear('created_at', '=',  $requestedYear)
        ->sum('total')
        - $query->where('type', 'outcome')
        ->whereMonth('created_at','=',  $requestedMonth)
        ->whereYear('created_at', '=',  $requestedYear)
        ->sum('total');
        $query = DB::table('cashflows')->where('iduser', Auth::id());
        $previousMonthCashflow = $query->where('type', 'income')
        ->whereMonth('created_at', '=', $previousMonth)
        ->whereYear('created_at', '=',$previousYear)
        ->sum('total')
        - $query->where('type', 'outcome')
        ->whereMonth('created_at','=', $previousMonth)
        ->whereYear('created_at','=', $previousYear)
        ->sum('total');
        $totalImprovement = ($previousMonthCashflow == 0) ? 100 : ROUND(($currentMonthCashflow - $previousMonthCashflow) / $previousMonthCashflow * 100);

        // Menghitung Customer
        $customers = Invoice::whereMonth('created_at', $requestedMonth)
            ->whereYear('created_at', $previousYear)
            ->get();
        $totalCustomer = $customers->count();
        $dailyCustomerData = [];
        foreach (range(1, 31) as $day) {
            $customerCount = DB::table('invoices')->whereMonth('created_at', '=', $requestedMonth)->whereDay('created_at', '=', $day)->count();;
            $percentage = $totalCustomer > 0 ? ($customerCount / $totalCustomer) * 100 : 0;
            if ($customerCount > 0) {
                $dailyCustomerData[$day] = [
                    'count' => $customerCount ?? 0, 
                    'percentage' => round($percentage, 2),
                    'day' => $day
                ];
            }
        }
        return view('/generate/report', compact('cashflows', 'totalIncome', 'totalOutcome', 'totalmoney', 'totalImprovement', 'requestedMonth', 'requestedYear', 'totalCustomer', 'dailyCustomerData'));
    }
    
}
