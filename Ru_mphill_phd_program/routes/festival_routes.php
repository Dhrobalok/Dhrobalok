<?php
use App\Http\Controllers\FestivalController;

Route :: prefix('festivals')->group(function(){
    
    Route :: get('/',[FestivalController :: class,'index'])->name('admin.festival.index')->middleware('permission:view festivals');
    Route :: get('create',[FestivalController :: class,'create'])->name('admin.festival.create')->middleware('permission:create festivals');
    Route :: post('store',[FestivalController :: class,'store'])->name('admin.festival.store');
    Route :: post('update/{festival_id}',[FestivalController :: class,'update'])->name('admin.festival.update');
    Route :: get('edit/{festival_id}',[FestivalController :: class,'edit'])->name('admin.festival.edit')->middleware('permission:edit festivals');
    Route :: post('delete',[FestivalController :: class,'delete'])->name('admin.festival.delete')->middleware('permission:delete festivals');
});
Route :: prefix('bonus')->group(function(){
    Route :: get('set-bonus/{employee_id}',[FestivalController :: class,'set_bonus'])->name('admin.festival.set-bonus')->middleware('permission:edit festivals');
    Route :: post('save-bonus',[FestivalController :: class,'save_bonus'])->name('admin.festival.save-bonus');
    Route :: post('copy-bonus',[FestivalController :: class,'copy_bonus'])->name('admin.festival.copy-bonus');
});