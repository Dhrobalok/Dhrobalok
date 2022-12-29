@extends('backend.admin.index')
@section('content')
@include('backend.admin.Rumaster.master')
<div class="col-md-12">
    <p style="text-align:center;font-weight:bold;font-size:16px;">Define Budget</p>

</div>

<div class="block-content block-content-full">
    <div class="table-responsive">
        <form action="{{ route('budget.store') }}" method="POST">
            @csrf
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Account Name</th>
                <th class="d-none d-sm-table-cell text-center">Total Amount</th>
                <th class="d-none d-sm-table-cell text-center">Define Budget</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
          
                
            </tr>
        </thead>

        <tbody>
            @foreach ($ChartOfAccount as $account )
           
                
            
            <tr>
                <td class="text-center">{{ $account->id }}</td>
                <td class="text-center">{{ $account->name }} <input type="hidden" name="account[]" value="{{ $account->id }}"></td>
                @php
                    // $account_amount=App\Models\Rubudget::where('account_id',$account->id)->first();
                    $total=App\Models\Budgetmaster::where('accountid',$account->id)->sum('amount');
                    
                @endphp
                

                 <td class="text-center">{{ $total }}</td>
                
                <td class="text-center"><input type="number" name="amount[]" class="form-control"></td>
                <td class="text-center">
                    <select name="change[]" id="" class="form-control">
                        <option value="1">Variable</option>
                        <option value="2">Fixed</option>
                    </select>
                </td>
               
                {{-- <td class="text-center"><img src = "{{ URL :: to($teaches ->image) }}" height = "100px" width = "100px"> </td> --}}
            </tr>

            @endforeach
        </tbody>
    </table>

    <div class="row text-center">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <button class="btn btn-primary f-100" onclick="update_permissions();">Save Changes</button>
        </div>
    </div>
   </div>
</form>
 </div>
</div>  

@endsection