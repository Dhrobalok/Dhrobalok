
<table class = "table table-sm table-striped table-bordered">
    <tr class = "text-center">
        <th>Month</th>
        <th>Principal Outstanding at the begining</th>
        <th>EMI</th>
        <th>Interest on Outstanding Principal</th>
        <th>Principal Repayment</th>
        <th>Principal Outstanding at the end</th>
    </tr>
    @foreach($records as $record)
      <tr class = "text-center">
         <td>{{ $record['month'] }}</td>
         <td>{{ $record['pm_begin'] }}</td>
         <td>{{ $record['emi'] }}</td>
         <td>{{ $record['interest'] }}</td>
         <td>{{ $record['repayment'] }}</td>
         <td>{{ $record['close_balance'] }}</td>
      </tr>
    @endforeach
</table>