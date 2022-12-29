<?php
use App\Http\Controllers\Sales\VendorController;

Route :: group(['prefix' => 'vendors','middleware' => ['auth']],function(){
    
    Route :: get('/',[VendorController :: class,'index'])->name('admin.sales.vendors.index');
    Route :: get('create',[VendorController :: class,'create'])->name('admin.sales.vendors.create');
    Route :: post('store',[VendorController :: class,'store'])->name('admin.sales.vendors.store');
    Route :: get('view/{vendor_id}',[VendorController :: class,'view'])->name('admin.sales.vendors.view');
    Route :: get('edit/{vendor_id}',[VendorController :: class,'edit'])->name('admin.sales.vendors.edit');
    Route :: post('update/{vendor_id}',[VendorController :: class,'update'])->name('admin.sales.vendors.update');
    Route :: post('delete',[VendorController :: class,'delete'])->name('admin.sales.vendors.delete');
    Route :: post('save-contacts',[VendorController :: class,'save_contacts'])->name('admin.sales.vendor.contacts.save');
    Route :: get('add-bank-account',[VendorController :: class,'add_bank_account'])->name('admin.sales.vendor.bank-account.add');
});