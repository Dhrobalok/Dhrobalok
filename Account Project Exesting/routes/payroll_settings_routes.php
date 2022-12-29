<?php
use App\Http\Controllers\PayrollSettingController;

Route :: prefix('payroll-settings')->group(function(){

    Route :: get('/',[PayrollSettingController :: class,'index'])->name('admin.payroll.settings.index');
    Route :: post('update',[PayrollSettingController :: class,'updateSettings'])->name('admin.settings.update');
});