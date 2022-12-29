<?php
use App\Http\Controllers\Vouchers\DebitController;

    Route :: prefix('debit-voucher')->group(function(){
       Route :: get('/',[DebitController :: class,'index'])->name('admin.voucher.debit.index')->middleware('adminmidleware');
       Route :: get('create',[DebitController :: class,'create'])->name('admin.voucher.debit.create')->middleware('adminmidleware');
       Route :: post('store',[DebitController :: class,'store'])->name('admin.voucher.debit.store');
       Route :: get('view/{id}',[DebitController :: class,'view'])->name('admin.voucher.debit.view')->middleware('adminmidleware');
       Route :: get('edit/{id}',[DebitController :: class,'edit'])->name('admin.voucher.debit.edit')->middleware('adminmidleware');
       Route :: post('update/{id}',[DebitController :: class,'update'])->name('admin.voucher.debit.update');
       Route :: post('delete',[DebitController :: class,'delete'])->name('admin.voucher.debit.delete')->middleware('adminmidleware');  
    });