<?php
use App\Http\Controllers\TaxController;

Route :: prefix('taxes')->group(function(){
    
    Route :: get('/',[TaxController :: class,'index'])->name('admin.taxes.index');
    Route :: get('create',[TaxController :: class,'create'])->name('admin.taxes.create');
    Route :: post('store',[TaxController :: class,'store'])->name('admin.taxes.store');
    Route :: get('view/{tax_id}',[TaxController :: class,'view'])->name('admin.taxes.view');
    Route :: get('edit/{tax_id}',[TaxController :: class,'edit'])->name('admin.taxes.edit');
    Route :: post('update/{tax_id}',[TaxController :: class,'update'])->name('admin.taxes.update');
    Route :: post('delete',[TaxController :: class,'delete'])->name('admin.taxes.delete');
});