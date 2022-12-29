<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\ChartOfAccount;
use Str;
use App\Models\Product;
use App\Models\ProductTaxes;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product :: all();
       return view('backend.admin.products.index',['products' => $products]);
    }
    public function create()
    {
        $taxes = Tax :: all();
        $accounts = ChartOfAccount :: all();
       return view('backend.admin.products.create',['taxes' => $taxes,'accounts' => $accounts]);
    }
    public function store(Request $request)
    {
       $name = $request -> product_name;
       $product_type = $request -> product_type;
       $product_price = $request -> product_price;
       $internal_ref = $request -> internal_ref;
       $product_bar_code = $request -> product_bar_code;
       $cost = $request -> cost;
       $income_account = $request -> income_account;
       $expense_account = $request -> expense_account;
       $product_image = $request -> file('product_image');
       $customer_taxes = $request -> customer_taxes;
       $vendor_taxes = $request -> vendor_taxes;
       $product_image_url = NULL;

       if($product_image)
       {
           $image_name = Str :: random(20);
           $extension = strtolower($product_image -> getClientOriginalExtension());
           $image_full_name = $image_name . '.' . $extension;
           $upload_path = 'product_images/';
           $image_url = $upload_path.$image_full_name;
           $image -> move($upload_path,$image_full_name);
           $product_image_url = $image_url;
       }

       $product = Product :: create([
           'product_name' => $name,
           'product_type' => $product_type,
           'price' => $product_price,
           'cost' => $cost,
           'account_receivable' => $income_account == 0 ? NULL : $income_account,
           'account_payable' => $expense_account == 0 ? NULL : $expense_account,
           'internal_reference' => $internal_ref,
           'bar_code' => $product_bar_code,
           'product_image' => $product_image_url
       ]);
      
       if($customer_taxes)
       {
          foreach($customer_taxes as $customer_tax)
           {
             ProductTaxes :: create([
               'product_id' => $product -> id,
               'tax_id' => $customer_tax
             ]);
           }
       }
       if($vendor_taxes)
       {
          foreach($vendor_taxes as $vendor_tax)
           {
             ProductTaxes :: create([
               'product_id' => $product -> id,
               'tax_id' => $vendor_tax
             ]);
           }
       }
    
       return redirect() -> route('admin.products.index')->with('success-message','New product saved successfully');
    }

    public function view($product_id)
    {
       $product = Product :: find($product_id);
       return view('backend.admin.products.view',['product' => $product]);
    }
    public function edit($product_id)
    {
        $product = Product :: find($product_id);
        $taxes = Tax :: all();
        $accounts = ChartOfAccount :: all();
        return view('backend.admin.products.edit',['product' => $product,'taxes' => $taxes,'accounts' => $accounts]);
    }
    public function update(Request $request,$product_id)
    {
      $product = Product :: find($product_id);
      $name = $request -> product_name;
      $product_type = $request -> product_type;
      $product_price = $request -> product_price;
      $internal_ref = $request -> internal_ref;
      $product_bar_code = $request -> product_bar_code;
      $cost = $request -> cost;
      $income_account = $request -> income_account;
      $expense_account = $request -> expense_account;
      $product_image = $request -> file('product_image');
      $customer_taxes = $request -> customer_taxes;
      $vendor_taxes = $request -> vendor_taxes;
      $product_image_url = $product -> product_image;

      if($product_image)
      {
          $image_name = Str :: random(20);
          $extension = strtolower($product_image -> getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $extension;
          $upload_path = 'product_images/';
          $image_url = $upload_path.$image_full_name;
          $image -> move($upload_path,$image_full_name);
          $product_image_url = $image_url;
      }

      $product -> update([
        'product_name' => $name,
        'product_type' => $product_type,
        'price' => $product_price,
        'cost' => $cost,
        'account_receivable' => $income_account == 0 ? NULL : $income_account,
        'account_payable' => $expense_account == 0 ? NULL : $expense_account,
        'internal_reference' => $internal_ref,
        'bar_code' => $product_bar_code,
        'product_image' => $product_image_url
     ]);
     
     foreach($product -> taxes as $product_tax)
     {
       $product_tax -> delete();
     }

     if($customer_taxes)
      {
          foreach($customer_taxes as $customer_tax)
           {
             ProductTaxes :: create([
               'product_id' => $product -> id,
               'tax_id' => $customer_tax
             ]);
           }
      }
      if($vendor_taxes)
      {
         foreach($vendor_taxes as $vendor_tax)
          {
            ProductTaxes :: create([
              'product_id' => $product -> id,
              'tax_id' => $vendor_tax
            ]);
          }
      }

      return redirect() -> route('admin.products.index')->with('success-message','Record updated successfully');
    }
    public function delete(Request $request)
    {
        $product_id = $request -> product_id;
        $product = Product :: find($product_id);
        $product_name = $product -> product_name;
        $product -> delete();
        return 'Product named '.$product_name.' deleted successfully';
    }
}
