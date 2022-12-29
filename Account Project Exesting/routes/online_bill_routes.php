<?php
use App\Http\Controllers\OnlineBillUserController;
Route :: get('bill-users',[OnlineBillUserController :: class,'index'])->name('admin.bill-users.index');
Route :: get('bill-users-view/{id}',[OnlineBillUserController :: class,'view'])->name('admin.bill-user.view');
Route :: post('approve-bill-user',[OnlineBillUserController :: class,'approve_bill_user'])->name('approve-bill-user');
Route :: post('save-bill-voucher',[OnlineBillUserController :: class,'save_bill_voucher'])->name('save-bill-voucher');