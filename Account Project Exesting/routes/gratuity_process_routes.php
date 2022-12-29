<?php
use App\Http\Controllers\GratuityProcessController;

Route :: prefix('/gratuity-process')->group(function(){
  Route :: get('/', [GratuityProcessController :: class, 'index'])->name('admin.gratuity-process.index');
  Route :: get('generate-preview/{id}',[GratuityProcessController :: class,'generate_preview'])->name('admin.gratuity-process.generate-preview');    
  Route :: post('generate/{id}',[GratuityProcessController :: class,'generate'])->name('admin.gratuity-process.generate');    
  Route :: get('view/{id}',[GratuityProcessController :: class,'view'])->name('admin.gratuity-process.view');    
  Route :: post('download/{id}',[GratuityProcessController :: class,'download'])->name('admin.gratuity-process.download');    
});