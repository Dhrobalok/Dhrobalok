<?php
use App\Http\Controllers\ProvidentFundContributionController;
use App\Http\Controllers\ProvidentFundProcessController;
use App\Http\Controllers\ReportManager;
    Route :: prefix('/pf-contribution')->group(function(){
      Route :: get('/',[ProvidentFundContributionController :: class,'index'])->name('admin.pf-contribution.index')->middleware('permission:view provident');
      //  Route :: post('payscales',[PensionUserController :: class,'get_payscales'])->name('get-payscales');
      //  Route :: post('payscale-details',[PensionUserController :: class,'get-payscale-details'])->name('get-payscale-details');
      // Route :: get('get-coa-info',[ProvidentFundContributionController :: class,'get_coa_info'])->name('get-coa-info');
       Route :: get('create',[ProvidentFundContributionController :: class,'create'])->name('admin.pf-contribution.create')->middleware('permission:create provident');
       Route :: post('store',[ProvidentFundContributionController :: class,'store'])->name('admin.pf-contribution.store');
       Route :: get('edit/{id}',[ProvidentFundContributionController :: class,'edit'])->name('admin.pf-contribution.edit')->middleware('permission:edit provident');
       Route :: patch('update/{id}',[ProvidentFundContributionController :: class,'update'])->name('admin.pf-contribution.update');
       Route :: get('view/{id}',[ProvidentFundContributionController :: class,'view'])->name('admin.pf-contribution.view')->middleware('permission:view provident');
       Route :: post('delete',[ProvidentFundContributionController :: class,'delete'])->name('admin.pf-contribution.delete')->middleware('permission:delete provident');

       Route :: post('save-pf-process',[ProvidentFundProcessController :: class,'save_pf_process'])->name('admin.pf-process.save');
       Route :: post('update-pf-rate',[ProvidentFundContributionController :: class,'updatePFContributionRate'])->name('admin.pf-contribution.rate.update');
      
    });