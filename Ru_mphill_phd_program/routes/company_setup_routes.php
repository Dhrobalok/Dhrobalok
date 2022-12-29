<?php
use App\Http\Controllers\CompanySetupController;

Route :: post('company-profile-store',[CompanySetupController :: class,'store_profile'])->name('admin.company-profile.store');
