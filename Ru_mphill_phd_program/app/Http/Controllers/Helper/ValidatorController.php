<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\SelectCorrectAccount;
use App\Rules\CheckAmountValue;
/**
 * This controller helps us to validate chart of account,amount and particulars.
 */
class ValidatorController extends Controller
{
    public function validate_entry(Request $request)
    {
         /**
     * This function is just validate an voucher enrty.
     * @param Require three parametes called a chart of account,amount and particular of a voucher respectively.
     * @return a validation status if it is ok or not. If find any error,then return an object in json format.
     */
        $request ->validate([
            'select_expense_account' => [new SelectCorrectAccount],
            'amount' => ['required',new CheckAmountValue],
            'particulars' => ['required']
        ]);
    }
}
