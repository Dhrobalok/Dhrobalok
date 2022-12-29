<?php
use App\Http\Controllers\Expenditure\ExpenditureController;

    Route :: prefix('expenditure')->group(function(){
       Route :: get('/',[ExpenditureController :: class,'index'])->name('admin.voucher.expenditure.index')->middleware('permission:view vouchers');
       Route :: get('create',[ExpenditureController :: class,'create'])->name('admin.voucher.expenditure.create')->middleware('permission:create vouchers');
       Route :: post('store',[ExpenditureController :: class,'store'])->name('admin.voucher.expenditure.store');
       Route :: get('view/{id}',[ExpenditureController :: class,'view'])->name('admin.voucher.expenditure.view')->middleware('permission:view vouchers');
       Route :: get('edit/{id}',[ExpenditureController :: class,'edit'])->name('admin.voucher.expenditure.edit')->middleware('permission:edit vouchers');
       Route :: post('update/{id}',[ExpenditureController :: class,'update'])->name('admin.voucher.expenditure.update');
       Route :: post('delete',[ExpenditureController :: class,'delete'])->name('admin.voucher.expenditure.delete')->middleware('permission:delete vouchers');
    });