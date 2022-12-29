<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CashBook;
class cashBookEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cashbook:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cashbook updated successfully';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start_date = date('Y-m-01');
        $end_date = date('Y-m-t');
        $next_month = intval(explode("-",$end_date)[1]) + 1;
        $next_month_year = intval(explode("-",$end_date)[0]);
        
        if($next_month  > 12)
        {
            $next_month -= 1;
            $next_month_year += 1;
        }
        $next_month_first_day_date = $next_month_year."-".$next_month."-01";

        $entries = CashBook :: whereBetween('transaction_date',[$start_date,$end_date])
                                     ->get();
        $debit_amount_cash = $entries -> where('entry_position','Debit')
                                       ->where('cash_amount','!=',0)
                                       ->sum('cash_amount');
        $debit_amount_bank = $entries -> where('entry_position','Debit')
                            ->where('bank_amount','!=',0)
                            ->sum('bank_amount');
        $credit_amount_cash = $entries -> where('entry_position','Credit')
                            ->where('cash_amount','!=',0)
                            ->sum('cash_amount');
        $credit_amount_bank = $entries -> where('entry_position','Credit')
                 ->where('bank_amount','!=',0)
                 ->sum('bank_amount');
        $trial_balance_cash = $debit_amount_cash - $credit_amount_cash;
        $trial_balance_bank = $debit_amount_bank - $credit_amount_bank;
         CashBook :: create([
             'transaction_date' => $end_date,
             'coa_id' => NULL,
             'cash_amount' => $trial_balance_cash,
             'bank_amount' => $trial_balance_bank,
             'entry_position' => 'Credit'
         ]);
         
         CashBook :: create([
            'transaction_date' => NULL,
            'coa_id' => NULL,
            'cash_amount' => $debit_amount_cash,
            'bank_amount' => $debit_amount_bank,
            'entry_position' => 'Debit'
         ]);
         CashBook :: create([
             'transaction_date' => $next_month_first_day_date,
             'coa_id' => NULL,
             'cash_amount' => $trial_balance_cash,
             'bank_amount' => $trial_balance_bank,
             'entry_position' => 'Debit'
         ]);
        return 0;
    }
}
