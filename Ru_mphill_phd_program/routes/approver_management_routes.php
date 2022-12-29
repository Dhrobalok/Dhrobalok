<?php
use App\Http\Controllers\ManageApproverController;

    Route :: prefix('approver')->group(function(){
       Route :: get('/',[ManageApproverController :: class,'index'])->name('admin.approver.index');//->middleware('permission:approve_setup vouchers');
       Route :: post('get-users',[ManageApproverController :: class,'get_users'])->name('admin.approvers.get-users');
       Route :: get('edit-voucher-approver',[ManageApproverController :: class,'edit_voucher_approver'])->name('edit-voucher-approvers');//->middleware('permission:approve_setup vouchers');
       Route :: post('save-approval-flow',[ManageApproverController :: class,'save_approver_setting'])->name('save-approver-settings');
       Route :: get('add-new-approver',[ManageApproverController :: class,'addNewApprover'])->name('add-new-approver');
    });

