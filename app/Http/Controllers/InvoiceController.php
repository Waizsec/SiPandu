<?php

namespace App\Http\Controllers;

use App\Models\Cashflows;
use App\Models\Invoice;
use App\Models\Invoicedetail;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
  public function createInvoice(Request $request){

    // Create new record in table invoices
    if ($request->custname === null) {
      return redirect()->to('/cashier/dashboard');
      // dd($request->custname)
    }else{
      $invoice = new Invoice();
      $invoice->custname = $request->custname;
      $invoice->iduser = session('userid');
      $invoice->total = $request->total;
      $invoice->save();
  
      $invoiceId = $invoice->id;
  
      // create all the items into invoice
      $cart = session('cart'); 
      foreach ($cart as $item) {
          $stock = Stocks::where('stockid', $item['id'])->first();
          if ($stock) {
              $invoiceDetail = new Invoicedetail();
              $invoiceDetail->invoiceid = $invoiceId;
              $invoiceDetail->items = $stock->items;
              $invoiceDetail->amount = $item['amount'];
              $invoiceDetail->prices = ($stock->sell_price * $item['amount']);
              $invoiceDetail->save();
  
              DB::table('stocks')->where('stockid', $item['id'])->decrement('stock', $item['amount']);
          }
      }
  
      // Create a new cashflow
      $cashflow = new Cashflows();
      $cashflow->cashflow = "Penjualan : ".$request->custname;
      $cashflow->type = 'income';
      $cashflow->category = 'invoice';
      $cashflow->total = $invoice->total;
      $cashflow->desc = '-';
      $cashflow->invoiceid = $invoiceId;
      $cashflow->iduser = session('userid');
      $cashflow->save(); 
  
      session()->forget('cart');
      return redirect()->to('/cashier/dashboard');
    }
    // dd($request->total);
  }
}
