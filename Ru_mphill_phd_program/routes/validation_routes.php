<?php
use App\Http\Controllers\Helper\ValidatorController;
Route :: post('validate-entry',[ValidatorController :: class,'validate_entry'])->name('validate-entry');