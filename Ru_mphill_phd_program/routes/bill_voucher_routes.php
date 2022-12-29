<?php
use App\Http\Controllers\OnlineBillUserController;

Route :: get('bill-vouchers',[OnlineBillUserController :: class,'bill_vouchers'])->name('admin.bill-vouchers.index')->middleware('permission:view vouchers');
Route :: get('bill-voucher-view/{id}',[OnlineBillUserController :: class,'view_voucher'])->name('view-bill-voucher')->middleware('permission:view vouchers');
Route :: get('bill-voucher-edit/{id}',[OnlineBillUserController :: class,'edit_voucher'])->name('edit-bill-voucher')->middleware('permission:edit vouchers');
Route :: post('update-bill',[OnlineBillUserController :: class,'update'])->name('update-bill');