<?php
use App\Http\Controllers\Vouchers\JournalVoucherController;

    Route :: prefix('journal-voucher')->group(function(){
       Route :: get('/',[JournalVoucherController :: class,'index'])->name('admin.voucher.journal.index')->middleware('permission:view vouchers');
       Route :: post('store',[JournalVoucherController :: class,'store'])->name('admin.voucher.journal.store');
       Route :: get('create',[JournalVoucherController :: class,'create'])->name('admin.voucher.journal.create')->middleware('permission:create vouchers');
       Route :: get('edit/{id}',[JournalVoucherController :: class,'edit'])->name('admin.voucher.journal.edit')->middleware('permission:edit vouchers');
       Route :: post('update/{id}',[JournalVoucherController :: class,'update'])->name('admin.voucher.journal.update');
       Route :: get('view/{id}',[JournalVoucherController :: class,'view'])->name('admin.voucher.journal.view')->middleware('permission:view vouchers');
       Route :: post('delete',[JournalVoucherController :: class,'delete'])->name('admin.voucher.journal.delete')->middleware('permission:delete vouchers');
    });