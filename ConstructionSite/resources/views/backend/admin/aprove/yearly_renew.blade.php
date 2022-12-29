@extends('backend.admin.index')
@section('content')
<style>
    /* * {
  box-sizing: border-box;
} */

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(3.5); /* IE 9 */
  -webkit-transform: scale(3.5); /* Safari 3-8 */
  transform: scale(3.5); 
}
</style>

<div class="card">


<div class="card-body">
    <div class="table-responsive">

    
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead class="bg-info">
            <tr class="text-white">

                <th class="d-none d-sm-table-cell text-center">Id</th>
                <th class="d-none d-sm-table-cell text-center">Name</th>
               
                
                <th class="d-none d-sm-table-cell text-center">Status</th>
                
                <th class="d-none d-sm-table-cell text-center">Payslip</th>
                <th class="d-none d-sm-table-cell text-center"></th>
            </tr>
        </thead>
           
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ( $payslips as $allpayslips )
            @php
                $users=App\Models\User::find($allpayslips->employee_id)->name;
            @endphp

            <tr>
                @if ($users)
                    
                 <td>{{ $i++ }}</td>
                <td>{{ ucwords($users) }}</td>
                
               @if ($allpayslips->status==1)
               <td ><span class="badge badge-success">Active</span></td>
               @elseif ($allpayslips->status==0)
               <td><span class="badge badge-danger">InActive</span></td>
                @endif
                {{-- <td><img src = "{{ URL :: to($users -> employee_photo) }}" height = "50px" width = "50px"></td> --}}
                <td><img class="zoom" src = "{{ URL :: to($allpayslips -> payslip) }}" height = "20px" width = "20px"></td>

                <td class="text-center">
                   <a href="{{ url('aprovePayslip',$allpayslips->id) }}"><button type="button" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i></button></a>
                   <a href="{{ url('deletePayslip',$allpayslips->id)}}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            
                   
                </td>
                @endif
            </tr>
                
            @endforeach
            

        </tbody>
    </table>
</div>
</div>
</div>
@endsection