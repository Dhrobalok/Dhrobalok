<?php
use App\Http\Controllers\Vouchers\CreditController;

    Route :: prefix('credit-voucher')->group(function(){
       Route :: get('/',[CreditController :: class,'index'])->name('admin.voucher.credit.index')->middleware('permission:view vouchers');
       Route :: get('create',[CreditController :: class,'create'])->name('admin.voucher.credit.create')->middleware('permission:create vouchers');
       Route :: post('store',[CreditController :: class,'store'])->name('admin.voucher.credit.store');
       Route :: get('view/{id}',[CreditController :: class,'view'])->name('admin.voucher.credit.view')->middleware('permission:view vouchers');
       Route :: get('edit/{id}',[CreditController :: class,'edit'])->name('admin.voucher.credit.edit')->middleware('permission:edit vouchers');
       Route :: post('update/{id}',[CreditController :: class,'update'])->name('admin.voucher.credit.update');
       Route :: post('delete',[CreditController :: class,'delete'])->name('admin.voucher.credit.delete')->middleware('permission:delete vouchers'); 
    });