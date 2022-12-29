<?php
use App\Http\Controllers\GratuityUserController;

    Route :: prefix('/gratuity-users')->group(function(){
      Route :: get('/',[GratuityUserController :: class,'index'])->name('admin.gratuity-users.index');
       //Route :: post('payscales',[GratuityUserController :: class,'get_payscales'])->name('get-payscales');
      // Route :: post('payscale-details',[GratuityUserController :: class,'get-payscale-details'])->name('get-payscale-details');
       //Route :: get('get-coa-info',[GratuityUserController :: class,'get_coa_info'])->name('get-coa-info');
       Route :: get('create',[GratuityUserController :: class,'create'])->name('admin.gratuity-users.created');
       Route :: post('store',[GratuityUserController :: class,'store'])->name('admin.gratuity-users.store');
       Route :: get('edit/{id}',[GratuityUserController :: class,'edit'])->name('admin.gratuity-users.edit');
       Route :: patch('update/{id}',[GratuityUserController :: class,'update'])->name('admin.gratuity-users.update');
       Route :: get('view/{id}',[GratuityUserController :: class,'view'])->name('admin.gratuity-users.view');
       Route :: post('delete',[GratuityUserController :: class,'delete_gratuity'])->name('admin.gratuity-users.delete');
       Route :: post('approve-confirm',[GratuityUserController :: class,'approveGratuityUser'])->name('admin.gratuity-user.approve');
       Route :: post('complete',[GratuityUserController :: class,'completePayment'])->name('admin.gratuity-user.complete');
       Route :: get('approval-pendings',[GratuityUserController :: class,'approvalPendingsUsers'])->name('admin.gratuity-user.approval-pending');
       Route :: get('download-gaturity/{generate_id}',[GratuityUserController :: class,'gratunity_download'])->name('gaturity_download');
    });