<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PaymentTerm;
use App\Models\PaymentTermDetail;
class PaymentTermsController extends Controller
{
    public function index()
    {
        $terms  = PaymentTerm :: all();
        return view('backend.admin.payment_terms.index',['terms' => $terms]);
    }
    public function create()
    {
        return view('backend.admin.payment_terms.create');
    }

    public function store(Request $request)
    {
       $name = $request -> payment_term_name;
       $description_on_invoice = $request -> description_on_invoice;
       $due_types = $request -> due_types;
       $amounts = $request -> amounts;
       $days_array = $request -> days_array;
       $options_array = $request -> options_array;

       $payment_term = PaymentTerm :: create([
           'name' => $name,
           'description_on_invoice' => $description_on_invoice,
           'status' => 1,
           'user_id' => Auth :: user() -> id
       ]);

       for($i = 0; $i < count($due_types); $i++)
       {
           PaymentTermDetail :: create([
             'payment_terms_id' => $payment_term -> id,
             'due_type' => $due_types[$i],
             'amount' => $amounts[$i],
             'number_of_days' => $days_array[$i],
             'option' => $options_array[$i]
           ]);
       }
       
       return redirect() -> route('admin.payment-terms.index')->with('success-message','New Payment Term saved successfully');
    }

    public function view($term_id)
    {
       $term = PaymentTerm :: find($term_id);
       return view('backend.admin.payment_terms.view',['term' => $term]);
    }

    public function edit($term_id)
    {
        $term = PaymentTerm :: find($term_id);
        return view('backend.admin.payment_terms.edit',['term' => $term]);
    }


    public function update(Request $request, $term_id)
    {

       $name = $request -> payment_term_name;
       $description_on_invoice = $request -> description_on_invoice;
       $due_types = $request -> due_types;
       $amounts = $request -> amounts;
       $days_array = $request -> days_array;
       $options_array = $request -> options_array;
       $status = $request -> status;
       $payment_term  = PaymentTerm :: find($term_id);
       
       foreach($payment_term -> details as $detail)
       {
           $detail -> delete();
       }

       $payment_term -> update([
           'name' => $name,
           'description_on_invoice' => $description_on_invoice,
           'status' => $status
       ]);

       for($i = 0; $i < count($due_types); $i++)
       {
           PaymentTermDetail :: create([
             'payment_terms_id' => $payment_term -> id,
             'due_type' => $due_types[$i],
             'amount' => $amounts[$i],
             'number_of_days' => $days_array[$i],
             'option' => $options_array[$i]
           ]);
       }
       
       return redirect() -> route('admin.payment-terms.index')->with('success-message','Updated successfully');
    }

    public function delete(Request $request)
    {
       $term = PaymentTerm :: find($request -> termId);
       $message = 'Payment Term named('.$term -> name.') deleted successfully';
       $term -> delete();
       return $message;
    }

    public function new_rule(Request $request)
    {
        $type = $request -> type;
        $amount = $request -> amount;
        $days = $request -> days;
        $option = $request -> option_text;
       return view('backend.admin.payment_terms.new-rule',['type' => $type,'amount' => $amount,'days' => $days,'option' => $option]);
    }
}
