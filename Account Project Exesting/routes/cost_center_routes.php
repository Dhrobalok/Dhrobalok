<?php
use App\Http\Controllers\CostCenter\CostCenterController;
use App\Http\Controllers\CostCenter\TypeController;

   Route :: prefix('cost-centers')->group(function(){

      Route :: get('/',[CostCenterController :: class,'index']) -> name('cost-center-index')->middleware('permission:view cost');
      Route :: get('create',[CostCenterController :: class,'create'])->name('create-cost')->middleware('permission:create cost');
      Route :: post('store',[CostCenterController :: class,'store'])->name('admin.cost-center.store');
      Route :: get('edit/{id}',[CostCenterController :: class ,'edit'])->name('admin.cost-center.edit')->middleware('permission:edit cost');
      Route :: post('update/{id}',[CostCenterController :: class,'update'])->name('admin.cost-center.update');
      Route :: get('view/{id}',[CostCenterController :: class,'view'])->name('admin.cost-center.view')->middleware('permission:view cost');
      Route :: post('delete',[CostCenterController :: class,'delete']) ->name('admin.cost-center.delete')->middleware('permission:delete cost');
      Route :: get('add-new-cost-account',[CostCenterController :: class,'addNewCostAccount'])->name('admin.cost-center.add-new-cost-account');

   });
  
   Route :: prefix('cost-center-type')->group(function(){
      Route :: get('/',[TypeController :: class,'index'])->name('admin.cost-center.type.index');
      Route :: get('create',[TypeController :: class,'create'])->name('admin.cost-center.type.create');
      Route :: post('store',[TypeController :: class,'store'])->name('admin.cost-center.type.store');
      Route :: get('view/{id}',[TypeController :: class,'view'])->name('admin.cost-center.type.view');
      Route :: get('edit/{id}',[TypeController :: class,'edit'])->name('admin.cost-center.type.edit');
      Route :: post('update/{id}',[TypeController :: class,'update'])->name('admin.cost-center.type.update');
      Route :: post('delete',[TypeController :: class,'delete'])->name('admin.cost-center.type.delete');
   });