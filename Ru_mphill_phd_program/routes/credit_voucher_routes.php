<?php
use App\Http\Controllers\Vouchers\CreditController;

    Route :: prefix('credit-voucher')->group(function(){
       Route :: get('/',[CreditController :: class,'index'])->name('admin.voucher.credit.index')->middleware('adminmidleware');
       Route :: get('create',[CreditController :: class,'create'])->name('admin.voucher.credit.create')->middleware('adminmidleware');
       Route :: post('store',[CreditController :: class,'store'])->name('admin.voucher.credit.store');
       Route :: get('view/{id}',[CreditController :: class,'view'])->name('admin.voucher.credit.view')->middleware('adminmidleware');
       Route :: get('edit/{id}',[CreditController :: class,'edit'])->name('admin.voucher.credit.edit')->middleware('adminmidleware');
       Route :: post('update/{id}',[CreditController :: class,'update'])->name('admin.voucher.credit.update');
       Route :: post('delete',[CreditController :: class,'delete'])->name('admin.voucher.credit.delete')->middleware('adminmidleware'); 
    });