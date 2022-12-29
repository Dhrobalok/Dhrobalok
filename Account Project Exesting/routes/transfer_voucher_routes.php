<?php
use App\Http\Controllers\TransferVoucherController;

    Route :: prefix('transfer-voucher')->group(function(){
       Route :: get('/',[TransferVoucherController :: class,'index'])->name('admin.voucher.transfer.index')->middleware('permission:view vouchers');
       Route :: get('create',[TransferVoucherController :: class,'create'])->name('admin.voucher.transfer.create')->middleware('permission:create vouchers');
       Route :: post('store',[TransferVoucherController :: class,'store'])->name('admin.voucher.transfer.store');
       Route :: get('edit/{id}',[TransferVoucherController :: class,'edit'])->name('admin.voucher.transfer.edit')->middleware('permission:edit vouchers');
       Route :: post('update/{id}',[TransferVoucherController :: class,'update'])->name('admin.voucher.transfer.update');
       Route :: get('view/{id}',[TransferVoucherController :: class,'view'])->name('admin.voucher.transfer.view')->middleware('permission:view vouchers');
       Route :: post('delete',[TransferVoucherController :: class,'delete'])->name('admin.voucher.transfer.delete')->middleware('permission:delete vouchers');
    });