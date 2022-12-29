<?php
  use App\Http\Controllers\VoucherManagementController;

   Route :: prefix('voucher-management')->group(function(){
       Route :: get('approved-vouchers',[VoucherManagementController :: class,'approved_vouchers'])->name('admin.voucher.approved');//->middleware('permission:view vouchers');
       Route :: get('rejected-vouchers',[VoucherManagementController :: class,'rejected_vouchers'])->name('admin.voucher.rejected');//->middleware('permission:view vouchers');
       Route :: get('generated-vouchers',[VoucherManagementController :: class,'generated_vouchers'])->name('admin.voucher.generated');//->middleware('permission:view vouchers');
       Route :: post('generate-vouchers',[VoucherManagementController :: class,'generate_vouchers'])->name('admin.voucher.generate');//->middleware('permission:generate vouchers');
       Route :: get('view/{voucher_id}',[VoucherManagementController :: class,'view'])->name('admin.voucher.generated.view');//->middleware('permission:view vouchers');
       Route :: get('download-voucher/{voucher_id}',[VoucherManagementController :: class,'download'])->name('admin.voucher.download');//->middleware('permission:view vouchers');
       /* advance voucher
       */
       Route :: get('advance-voucher/{voucher_id}',[VoucherManagementController :: class,'advance_download'])->name('admin.advance_voucher.download');
       Route :: get('advance-view/{voucher_id}',[VoucherManagementController :: class,'advance_view'])->name('admin.voucher.advance_generated.view');
       Route :: get('download-cheque-book/{voucher_id}',[VoucherManagementController :: class,'download_cheque_book'])->name('admin.voucher.download.cheque-book');//->middleware('permission:view vouchers');
       Route :: get('debit-voucher/{voucher_id}/download',[VoucherManagementController :: class,'debit_voucher_download'])->name('admin.debit-voucher.download');//->middleware('permission:view vouchers');
   });
