<div class="row">
    <div class="col-md-12">
        <h4 class="text-center f-100 text-uppercase">CashBook entry for the month of {{ $month }},{{ $year }} (Bank
            Column Only)</h4>
    </div>
</div>
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr class="text-center text-black">
            <th colspan="4">
                Debit
            </th>
            <th colspan="4">
                Credit
            </th>
        </tr>
        <tr class="text-center text-black">
            <th>Date</th>
            <th>Particulars</th>
            <th>V. No</th>
            <th>Bank</th>
            <th>Date</th>
            <th>Particulars</th>
            <th>V. No</th>
            <th>Bank</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i < $max_cnt; $i++) 
         <tr class = "text-center">
             @if(isset($debit_entries[$i]))
              <td>{{ $debit_entries[$i] -> transaction_date }}</td>
              @if(isset($debit_entries[$i] -> coa_id))
                <td>To {{ $debit_entries[$i] -> coaInfo -> name }}</td>
              @else
               <td>To Balance b/d</td>
              @endif
              <td></td>
              <td>{{ $debit_entries[$i] -> bank_amount }}</td>
             @else
               <td></td>
               <td></td>
               <td></td>
               <td></td>
             @endif
             @if(isset($credit_entries[$i]))
              <td>{{ $credit_entries[$i] -> transaction_date }}</td>
              @if(isset($credit_entries[$i] -> coa_id))
                <td>By {{ $credit_entries[$i] -> coaInfo -> name }}</td>
              @else
               <td>By Balance c/d</td>
              @endif
              <td></td>
              <td>{{ $credit_entries[$i] -> bank_amount }}</td>
             @else
               <td></td>
               <td></td>
               <td></td>
               <td></td>
             @endif
         </tr>
        @endfor
        <tr class = "text-center">
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $debit_sum }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $debit_sum }}</td>
        </tr>
    </tbody>
</table>
<input type="hidden" id="curr_balance" value="{{ $current_balance }}">