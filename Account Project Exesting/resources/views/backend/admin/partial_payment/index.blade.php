@extends('backend.admin.index')

@section('content')
<div class="container">
    <!-- Page Content -->
    <!-- Dynamic Table Full -->


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">

                <a class="mr-2 btn f-100 btn-sm" id = "decline_btn"
                            href="#" data-target = "#decline" data-toggle = "modal"
                            style="color:#1dbf73;border:2px solid #1dbf73;font-weight:700;font-size:18px"><i
                                class="fa fa-times mr-2"></i>Partial Payment </a>
            </h3>
            
         
            <a href="{{route('admin.partial.create')}}"><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Budget"></i></a>
           
            
        </div>



            <div class="block-content block-content-full">
                
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
             <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>

                            <th class="d-none d-sm-table-cell text-center">Agreement id</th>
                            <th class="d-none d-sm-table-cell text-center">Agreement NAME</th>
                            <th class="d-none d-sm-table-cell text-center">Coustomer NAME</th>
                            <th class="d-none d-sm-table-cell text-center">Vender Name</th></th>
                            <th class="d-none d-sm-table-cell text-center">Agreement Amount</th></th>


                            <th class="d-none d-sm-table-cell text-center">Total_Pay</th>

                            <th class="d-none d-sm-table-cell text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>



                        @foreach ($agreements as $agreement)


                        <tr>
                            <td class="text-center">{{$agreement->id}}</td>
                            <td class="text-center">{{$agreement->agreement_name}}</td>
                            @php
                                $coustomer=App\Models\Customer::where('id',$agreement->customer_id)->first();
                            @endphp
                            <td class="text-center">{{$coustomer->name}}</td>

                            @php

                                $vender = App\Models\Vendor::where('id',$agreement->vender_id)->first();

                            @endphp

                          <td class="text-center">{{$vender->name}}</td>
                          <td class="text-center">{{$agreement->amount}}</td>

                           @if( $agreement->total == $agreement->amount )
                           <td class="text-center"><input type="text" class="form-control" value="Payed Complete" readonly></td>


                           @elseif($agreement->total < $agreement->amount)


                           <td class="text-center"><input type="text" class="form-control" value="{{ $agreement->total }}" readonly></td>

                           
                           @endif

                            <td class="text-center">
                                

                         <a class="btn btn-sm btn-danger btn-sm text-white"  href="{{ route('partial.download',['agreemnt_id' =>$agreement->id]) }}"
                         ><i class="fa fa-download"></i></a>&nbsp;&nbsp;


                               


                                
                            </td>

                            
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
         </div>

        <!-- END Dynamic Table Full -->
        </div>
    <!-- END Page Content



    -->

    <!--  partial payment -->

    <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-100" style="font-size:20px;color:#1dbf73">Partial Payment</div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                   <form id="decline_confirm">

                    <div class="row form-group justify-content-center">
                        <div class="col-md-3">
                            <label>Agreement Name</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" id="level_id" name="agreement_id" required>
                                <option value=0>Please Select Label</option>
                                @foreach ( $agreements as $agreement)
                                <option value="{{$agreement->id}}">{{$agreement->agreement_name}}</option>
                               @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row form-group justify-content-center">
                        <div class="col-md-3">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="number" name="amount" required>
                        </div>
                    </div>


                       <div class="row text-center">
                           <div class="col-md-12">
                             <button type = "submit" style = "border:2px solid #1dbf73;color:#1dbf73;"  class = "btn f-100">CONFIRM</button>
                           </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $('#decline_confirm').on('submit',function(e){

         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "{{ csrf_token() }}"
            }
        });
        $.ajax({
            url : "{{ route('partialpayment') }}",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {
               $('#decline').modal('hide');
               $('#decline_btn').text('Payment Add');
            }

        })
    });
</script>
@endpush
 



