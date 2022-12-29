<?php
use App\Http\Controllers\PaymentTermsController;

Route :: prefix('payment-terms')->group(function(){
    
    Route :: get('/',[PaymentTermsController :: class,'index'])->name('admin.payment-terms.index');
    Route :: get('create',[PaymentTermsController :: class,'create'])->name('admin.payment-terms.create');
    Route :: post('store',[PaymentTermsController :: class,'store'])->name('admin.payment-terms.store');
    Route :: get('view/{terms_id}',[PaymentTermsController :: class,'view'])->name('admin.payment-terms.view');
    Route :: get('edit/{terms_id}',[PaymentTermsController :: class,'edit'])->name('admin.payment-terms.edit');
    Route :: post('update/{terms_id}',[PaymentTermsController :: class,'update'])->name('admin.payment-terms.update');
    Route :: post('delete',[PaymentTermsController :: class,'delete'])->name('admin.payment-terms.delete');
    Route :: get('new-rule',[PaymentTermsController :: class,'new_rule'])->name('admin.payment-terms.new-rule');
});