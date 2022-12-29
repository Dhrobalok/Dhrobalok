<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\ChartOfAccount;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax :: all();
        return view('backend.admin.taxes.index',['taxes' => $taxes]);
    }
    public function create()
    {
        return view('backend.admin.taxes.create');
    }
    public function store(Request $request)
    {
        $tax_name = $request -> tax_name;
        $tax_scope = $request -> tax_scope;
        $tax_computation_type = $request -> tax_computation_type;
        $tax_rate = $request -> tax_rate;
        $status = $request -> status;
        $receivable_account = $request -> receivable_account;
        $payable_account = $request -> payable_account;
        $label_on_invoice = $request -> label_on_invoice;
        $is_including = $request -> is_including;

         Tax :: create([
             'tax_name' => $tax_name,
             'tax_scope' => $tax_scope,
             'tax_computation_type' => $tax_computation_type,
             'amount' => $tax_rate,
             'label_on_invoice' => $label_on_invoice,
             'is_including_price' => $is_including ? $is_including : 0,
             'receivable_account' => $receivable_account ? $receivable_account : NULL,
             'payable_account' => $payable_account ? $payable_account : NULL,
             'status' => $status
         ]);

         return redirect() -> route('admin.taxes.index')->with('success-message',"New Tax(".$tax_name.") saved successfully");
    }
    public function view($tax_id)
    {
        $tax = Tax :: find($tax_id);
        return view('backend.admin.taxes.view',['tax' => $tax]);
    }

    public function edit($tax_id)
    {
       $tax = Tax :: find($tax_id);
       $accounts = ChartOfAccount :: all();
       
       return view('backend.admin.taxes.edit',['tax' => $tax,'accounts' => $accounts]);
    }

    public function update(Request $request,$tax_id)
    {
        $tax_name = $request -> tax_name;
        $tax_scope = $request -> tax_scope;
        $tax_computation_type = $request -> tax_computation_type;
        $tax_rate = $request -> tax_rate;
        $status = $request -> status;
        $receivable_account = $request -> receivable_account;
        $payable_account = $request -> payable_account;
        $label_on_invoice = $request -> label_on_invoice;
        $is_including = $request -> is_including;
        $tax = Tax :: find($tax_id);
        $tax -> update([
             'tax_name' => $tax_name,
             'tax_scope' => $tax_scope,
             'tax_computation_type' => $tax_computation_type,
             'amount' => $tax_rate,
             'label_on_invoice' => $label_on_invoice,
             'is_including_price' => $is_including ? $is_including : 0,
             'receivable_account' => $receivable_account ? $receivable_account : NULL,
             'payable_account' => $payable_account ? $payable_account : NULL,
             'status' => $status
         ]);

         return redirect() -> route('admin.taxes.index')->with('success-message',"Tax record updated successfully");
    }

    public function delete(Request $request)
    {
       $tax = Tax :: find($request -> taxId);
       $message = $tax -> tax_name;
       $tax -> delete();
       return 'Tax named '.$message.' deleted successfully';
    }
}
