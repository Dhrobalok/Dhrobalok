<?php
use App\Http\Controllers\PartialPayment;


Route :: prefix('partial_payment')->group(function()
{

    Route :: post('agreementstore',[PartialPayment :: class,'store'])->name('agreement.create');
    Route :: get('agreementcreate',[PartialPayment :: class,'create'])->name('admin.partial.create');

    Route :: get('index',[PartialPayment :: class,'index'])->name('admin.partial.index');
    Route :: post('payment.create',[PartialPayment :: class,'partial_payment'])->name('payment.create');
    Route :: post('partial_payment',[PartialPayment :: class,'partial_payment'])->name('partialpayment');
    Route :: get('/payment/bulk',[PartialPayment :: class,'bulk_index'])->name('bulk.index');
    Route :: get('Bulk_create',[PartialPayment :: class,'bulk_create'])->name('bulk.create');

    Route :: post('Bulk_Order',[PartialPayment :: class,'bulk_store'])->name('bulk.store');
    Route :: post('Bulk_Payment',[PartialPayment :: class,'bulk_payment'])->name('bulkpayment');
    Route :: get('bulk.duration',[PartialPayment :: class,'bulk_duration'])->name('bulk.duration');
    Route :: post('report.duration',[PartialPayment :: class,'daily_report'])->name('report.duration');

    Route :: get('bulk_download',[PartialPayment :: class,'bulk_download'])->name('agreement.download');

    Route :: get('partial.download/{agreemnt_id}',[PartialPayment :: class,'partial_download'])->name('partial.download');
    Route :: get('bulk_adjust/{agreemnt_id}',[PartialPayment :: class,'bulk_adjustment'])->name('bulk_adjust');
    Route :: get('daily_stone_selling_report.download',[PartialPayment :: class,'daily_report'])->name('daily_stone_selling_report.download');




});
