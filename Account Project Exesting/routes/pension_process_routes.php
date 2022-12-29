<?php
use App\Http\Controllers\PensionProcessController;

Route :: prefix('pension-process')->group(function(){
  Route :: get('/', [PensionProcessController :: class, 'index'])->name('admin.pension-process.index')->middleware('permission:view pension');
  Route :: get('view/{id}',[PensionProcessController :: class,'view'])->name('admin.pension-process.view')->middleware('permission:view pension');    
  Route :: get('download/{id}',[PensionProcessController :: class,'download'])->name('admin.pension-process.download')->middleware('permission:view pension');
  Route :: get('generate',[PensionProcessController :: class,'generate'])->name('admin.pension.generate');
  Route :: post('generate-confirm',[PensionProcessController :: class,'generateConfirm'])->name('admin.pension.generate.confirm');
  Route :: post('mark-as-paid',[PensionProcessController :: class,'markAsPaid'])->name('admin.pension.mark-as-paid');   
});