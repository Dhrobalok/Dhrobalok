<?php
use App\Http\Controllers\Vouchers\DebitController;

    Route :: prefix('debit-voucher')->group(function(){
       Route :: get('/',[DebitController :: class,'index'])->name('admin.voucher.debit.index')->middleware('permission:view vouchers');
       Route :: get('create',[DebitController :: class,'create'])->name('admin.voucher.debit.create')->middleware('permission:create vouchers');
       Route :: post('store',[DebitController :: class,'store'])->name('admin.voucher.debit.store');
       Route :: get('view/{id}',[DebitController :: class,'view'])->name('admin.voucher.debit.view')->middleware('permission:view vouchers');
       Route :: get('edit/{id}',[DebitController :: class,'edit'])->name('admin.voucher.debit.edit')->middleware('permission:edit vouchers');
       Route :: post('update/{id}',[DebitController :: class,'update'])->name('admin.voucher.debit.update');
       Route :: post('delete',[DebitController :: class,'delete'])->name('admin.voucher.debit.delete')->middleware('permission:delete vouchers');  
    });