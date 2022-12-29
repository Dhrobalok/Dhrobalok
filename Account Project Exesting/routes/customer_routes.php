<?php
use App\Http\Controllers\Sales\CustomerController;

Route :: group(['prefix' => 'customers','middleware' => ['auth']],function(){
    
    Route :: get('/',[CustomerController :: class,'index'])->name('admin.sales.customers.index');
    Route :: get('create',[CustomerController :: class,'create'])->name('admin.sales.customers.create');
    Route :: post('store',[CustomerController :: class,'store'])->name('admin.sales.customers.store');
    Route :: get('view/{customer_id}',[CustomerController :: class,'view'])->name('admin.sales.customers.view');
    Route :: get('edit/{customer_id}',[CustomerController :: class,'edit'])->name('admin.sales.customers.edit');
    Route :: post('update/{customer_id}',[CustomerController :: class,'update'])->name('admin.sales.customers.update');
    Route :: post('delete',[CustomerController :: class,'delete'])->name('admin.sales.customers.delete');
    Route :: post('save-contacts',[CustomerController :: class,'save_contacts'])->name('admin.sales.customer.contacts.save');
    Route :: get('add-bank-account',[CustomerController :: class,'add_bank_account'])->name('admin.sales.customer.bank-account.add');
});