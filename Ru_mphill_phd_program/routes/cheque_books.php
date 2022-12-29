<?php
use App\Http\Controllers\ChequeBookController;
 Route :: prefix('cheque-book')->group(function(){
    Route :: get('/',[ChequeBookController :: class,'index'])->name('admin.cheque-book.index');//->middleware('permission:view cheque');
    Route :: get('/create',[ChequeBookController :: class,'create'])->name('admin.cheque-book.create');//->middleware('permission:create cheque');
    Route :: post('/store',[ChequeBookController :: class,'store'])->name('admin.cheque-book.store');
    Route :: get('view/{id}',[ChequeBookController :: class,'view'])->name('admin.cheque-book.view');//->middleware('permission:view cheque');
    Route :: post('update/{id}',[ChequeBookController :: class,'update'])->name('admin.cheque-book.update');
    Route :: get('delete',[ChequeBookController :: class,'delete'])->name('admin.cheque-book.delete');//->middleware('permission:delete cheque');
    Route :: get('get-cheque-number',[ChequeBookController :: class,'get_cheque_no'])->name('admin.cheque-book.get-cheque-no');
 });