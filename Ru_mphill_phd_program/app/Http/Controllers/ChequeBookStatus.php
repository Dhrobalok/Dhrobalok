<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * This controller just contains some constant which is used in cheque book controller.
 * More specificly these are the status of a cheque book.
 */
class ChequeBookStatus extends Controller
{
    public const Active = 1;
    public const Inactive = 0;
    public const Used = 2;
    public const Locked = 3;
}
