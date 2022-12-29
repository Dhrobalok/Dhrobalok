<?php
use App\Http\Controllers\BankInputController;

    Route :: prefix('bank-input')->group(function(){
      Route :: get('/',[BankInputController::class,'index'])->name('admin.bank-input.index');
       Route :: post('get-accounts',[BankInputController :: class,'get_accounts'])->name('journal.voucher.get-accounts');
       Route :: post('save-bank-input',[BankInputController :: class,'save_bank_input'])->name('save-bank-input');
       Route :: get('get/coa/info',[BankInputController :: class,'get_coa_info'])->name('get-coa-info');
       Route :: get('create',[BankInputController :: class,'create_bank_input'])->name('create-bank-input');
       Route :: get('edit/{id}',[BankInputController :: class,'edit'])->name('edit-bank-input');
       Route :: post('update',[BankInputController :: class,'update_bank_input'])->name('update-bank-input');
       Route :: get('view/{id}',[BankInputController :: class,'view'])->name('view-bank-input');
       Route :: post('delete',[BankInputController :: class,'delete'])->name('delete-bank-input');
       Route :: post('add-new-bank-input-entry',[BankInputController :: class,'add_new_transaction'])->name('add-new-bank-input-entry');
       Route :: post('update-bank-input-master',[BankInputController :: class,'update_bank_input_master'])->name('update-bank-input-master');
 
      
});