<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use Illuminate\Http\Request;

class CashflowsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
  
        $cashflow = new Cashflows();
        $cashflow->cashflow = $request->cashflow;
        $cashflow->type = $request->type;
        $cashflow->category = $request->category;
        $cashflow->total = $request->total;
        $cashflow->desc = $request->desc;
        $cashflow->save();

        return redirect('/finance');
    }

    public function show()
    {
        $cashflows = Cashflows::all(); 
        return view('user/finance', compact('cashflows')); 
    }
    

 
    public function edit(Cashflows $cashflows)
    {
        //
    }

    public function update(Request $request, Cashflows $cashflows)
    {
        //
    }

    public function destroy(Cashflows $cashflows)
    {
        //
    }
}
