<div class="row">
    <div class="col-md-6">
       
          <h6 class = "f-100 text-black">Cost Center {{$report_type == 'head' ? 'Head' : '' }} : {{ $name }}</h6>
    
    </div>
    <div class="col-md-6 text-right">
        <h6 class = "f-100 text-black">{{ $start_date }} to {{ $end_date }}</h6>
    </div>
</div>
<table class="table table-sm table-striped  table-bordered">
    <thead>
        <tr class="text-center text-black">
            <td>Date</td>
            @if($report_type == 'head')
              <td>Cost Center</td>
            @endif
            <td>Particulars</td>
            <td>Voucher Type</td>
            <td>Voucher No</td>
            <td>Debit</td>
            <td>Credit</td>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        @php $voucher = $record -> voucher; @endphp
        <tr class="text-center">
            <td>{{ $record -> voucher_date }}</td>
            @if($report_type == 'head')
              <td>{{ $record -> getCostCenterInfo -> name }}</td>
            @endif
            <td>{{ $record -> coa_info -> name }}</td>
            <td>{{ $voucher ? $voucher -> voucher_type -> code : ''}}</td>
            <td>{{ $voucher ? $voucher -> voucher_no : '' }}</td>
            <td>{{ $record -> debit_amount ? $record -> debit_amount  : '' }}</td>
            <td>{{ $record -> credit_amount ? $record -> credit_amount : '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>