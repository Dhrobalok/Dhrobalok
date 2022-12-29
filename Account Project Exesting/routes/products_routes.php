<?php
use App\Http\Controllers\ProductController;

Route :: prefix('products')->group(function(){
    
    Route :: get('/',[ProductController :: class,'index'])->name('admin.products.index');
    Route :: get('create',[ProductController :: class,'create'])->name('admin.products.create');
    Route :: post('store',[ProductController :: class,'store'])->name('admin.products.store');
    Route :: get('view/{product_id}',[ProductController :: class,'view'])->name('admin.products.view');
    Route :: get('edit/{product_id}',[ProductController :: class,'edit'])->name('admin.products.edit');
    Route :: post('update/{product_id}',[ProductController :: class,'update'])->name('admin.products.update');
    Route :: post('delete',[ProductController :: class,'delete'])->name('admin.products.delete');
});