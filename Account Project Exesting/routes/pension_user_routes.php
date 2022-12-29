<?php
use App\Http\Controllers\PensionUserController;

    Route :: prefix('/pension-users')->group(function(){
      Route :: get('/',[PensionUserController :: class,'index'])->name('admin.pension-users.index')->middleware('permission:view pension');
       Route :: get('create',[PensionUserController :: class,'create'])->name('admin.pension-users.create')->middleware('permission:create pension');
       Route :: post('store',[PensionUserController :: class,'store'])->name('admin.pension-users.store');
       Route :: get('edit/{id}',[PensionUserController :: class,'edit'])->name('admin.pension-users.edit')->middleware('permission:edit pension');
       Route :: patch('update/{id}',[PensionUserController :: class,'update'])->name('admin.pension-users.update');
       Route :: get('view/{id}',[PensionUserController :: class,'view'])->name('admin.pension-users.view')->middleware('permission:view pension');
       Route :: post('delete',[PensionUserController :: class,'delete_pension'])->name('admin.pension-users.delete')->middleware('permission:delete pension');
       Route :: post('approve-confirm',[PensionUserController :: class,'approvePensionUser'])->name('admin.pension-user.approve');
       Route :: get('approval-pendings',[PensionUserController :: class,'pendingApprovalUsers'])->name('admin.pension-user.approval-pendings');
    });