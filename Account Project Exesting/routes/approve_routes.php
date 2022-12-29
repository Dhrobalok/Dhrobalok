<?php
use App\Http\Controllers\ApproveController;

    Route :: prefix('approval')->group(function(){


       Route :: get('/',[ApproveController :: class,'index'])->name('admin.approve.index')->middleware('permission:approve vouchers');
       Route :: get('AdvanceVoucherApprove/{voucher_id}',[ApproveController :: class,'approve_voucher'])->name('AdvanceVoucherAprove');
       Route :: get('AdvanceVoucherAproveConfirm/{voucher_id}',[ApproveController :: class,'AdvanceApprove'])->name('AdvanceVoucherAproveConfirm');
       Route :: get('declined/{voucher_id}',[ApproveController :: class,'backward_voucher'])->name('backward-voucher')->middleware('permission:approve vouchers');
       Route :: get('approve/{voucher_id}',[ApproveController :: class,'approve_voucher'])->name('approve-voucher')->middleware('permission:approve vouchers');
       Route :: post('approve/{voucher_id}/confirm',[ApproveController :: class,'approveConfirm'])->name('admin.voucher.approve.confirm')->middleware('permission:approve vouchers');
       Route :: post('decline/{voucher_id}/confirm',[ApproveController :: class,'declineConfirm'])->name('admin.voucher.decline.confirm')->middleware('permission:approve vouchers');
       Route :: get('AdvanceVoucherDecline/{voucher_id}',[ApproveController :: class,'advance_decline_voucher'])->name('AdvanceVoucherDecline');
       Route :: get('AdvanceVoucherDeclineConfirm/{voucher_id}',[ApproveController :: class,'AdvanceDeclined'])->name('AdvanceVoucherDeclineConfirm');
       Route :: post('VoucherDecline/{voucher_id}/confirm',[ApproveController :: class,'DeclineComment'])->name('VoucherDeclineComment');

    });
