<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    public function addStock(Request $request)
    {
        $stock = new Stocks();
        $stock->items = $request->items;
        $stock->sell_price = $request->sell_price;
        $stock->buy_price = $request->buy_price;
        $stock->stock = $request->stock;
        if ($request->type == 'others') {
            $stock->type = $request->customtype;
        }else{
            $stock->type = $request->type;
        }
        $stock->iduser = session('userid'); 
        $stock->save();

        return redirect('/stock/dashboard');
    }

    public function detail(Request $request)
    {
        $stocks = Stocks::where('iduser', Auth::id())->get();
        $types = Stocks::where('iduser', Auth::id())->distinct()->pluck('type')->unique()->all();
        $stockdetail = Stocks::where('stockid', $request->id)->first();
        return view('staff/stockdashboard', compact('stocks', 'stockdetail', 'types')); 
        
    }
    
    public function delete(Request $request){
        $result = DB::table('stocks')->where('stockid', $request->id)->delete();
        return redirect('/stock/dashboard');
    }

    public function update(Request $request) {   
        $affected = DB::table('stocks')
            ->where('stockid', $request->id)
            ->update([
                'items' => $request->items,
                'sell_price' => $request->sell_price,
                'buy_price' => $request->buy_price,
                'stock' => $request->stock,
                'type' => $request->type,
            ]);
    
        if ($affected) {
            return redirect('/stock/dashboard');
        }else{
            return redirect('/stock/dashboard');
        }
    }
}
