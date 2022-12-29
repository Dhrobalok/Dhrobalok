<?php
use App\Http\Controllers\BankController;
Route :: prefix('banks')->group(function(){
   Route :: get('/',[BankController :: class,'index'])->name('admin.banks.index')->middleware('permission:view banks');
   Route :: get('/create',[BankController :: class,'create'])->name('admin.banks.create')->middleware('permission:create banks');
   Route :: post('/store',[BankController :: class,'store'])->name('admin.banks.store');
   Route :: get('view/{bank_id}',[BankController :: class,'view'])->name('admin.banks.view')->middleware('permission:view banks');
   Route :: post('update/{bank_id}',[BankController :: class,'update'])->name('admin.banks.update')->middleware('permission:edit banks');
   Route :: get('delete/{bank_id}',[BankController :: class,'delete'])->name('admin.banks.delete')->middleware('permission:delete banks');
   Route :: post('get-banks-info',[BankController :: class,'get_banks_info'])->name('admin.banks.get-banks-info');
});