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
                                class="fa fa-times mr-2"></i>Bulk Payment </a>
            </h3>

            
            <a href="{{route('bulk.create')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New Order"></i></a>
                       


         
        </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                               <th class="d-none d-sm-table-cell text-center">Agreement id</th>
                                <th class="d-none d-sm-table-cell text-center">Agreement Name</th>
                                <th class="d-none d-sm-table-cell text-center">Customer Name</th>
                                <th class="d-none d-sm-table-cell text-center">Vender Name</th></th>
                                <th class="d-none d-sm-table-cell text-center">Quantity</th></th>
                                <th class="d-none d-sm-table-cell text-center">Total_Pay</th>
                                <th class="d-none d-sm-table-cell text-center">Action</th>
                            </tr>
                        </thead>
    
                            <tbody>
                                @foreach ( $bulk as $agreement)
    
    
                            <tr>
                                <td class="text-center">{{$agreement->id}}</td>
                                <td class="text-center">{{$agreement->agreement_name}}</td>
    
                                @php
                                    $coustomer=App\Models\Customer::where('id',$agreement->customer_id)->first();
                                @endphp
    
    
                                @php
    
                                    $vender = App\Models\Vendor::where('id',$agreement->vender_id)->first();
    
                                @endphp
                              <td class="text-center">{{$coustomer->name}}</td>
                              <td class="text-center">{{$vender->name}}</td>
                              @if($agreement->quantity_sign==1)
                              <td class="text-center">{{$agreement->quantity}}&nbspKg</td>
    
    
                              @elseif ($agreement->quantity_sign==2)
                              <td class="text-center">{{$agreement->quantity}}&nbspton</td>
    
    
                              @endif
    
                              @if($agreement->total_pay == NULL)
                              <td class="text-center"><input type="text" class="form-control" value="00" readonly></td>
                              @elseif($agreement->total_pay !=$agreement->total_amount)
    
                              <td class="text-center"><input type="text" class="form-control" value="{{ $agreement->total_pay }}" readonly></td>
                              @else
    
                              <td class="text-center"><input type="text" class="form-control" value="Payment Complete" readonly></td>
    
    
                              @endif
                              <!--class="d-none d-sm-table-cell"
                            
                            <div class="btn-group">
    
                                  </div>
                            -->
    
                                <td class="text-center">
                                        
    
    
    
                                 @if($agreement->adjust==1)
                                  <button class=" btn btn-primary">Adjusted</button>
                                 @else
    
    
                                 <a href="{{ route('bulk_adjust',['agreemnt_id' =>$agreement->id]) }}"><button class=" btn btn-primary">Adjust</button></a>
    
    
                                  @endif
    
    
                                      
    
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
    <!--Order Download-->



    <!--  partial payment -->

    <div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <!-- loader -->
        <div class="loader"></div>

        <!-- -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="f-100" style="font-size:20px;color:#1dbf73">Bulk Payment</div>
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
                                <select class="form-control" id="agreement_id" name="agreement_id" required>
                                    <option value=0>Please Select Label</option>
                                    @foreach ( $bulk as $agreement)
                                    <option value="{{$agreement->id}}">{{$agreement->agreement_name}}</option>
                                   @endforeach

                                </select>
                            </div>
                        </div>




                        <div class="row form-group justify-content-center">
                            <div class="col-md-3">
                                <label>Quantity_For_ Pay</label>
                            </div>
                            <div class="col-md-8">
                             <input type="number" class="form-control" id="quentity" name="quantity" required>
                           </div>
                        </div>


                       <div class="row text-center">
                           <div class="col-md-12">
                             <button type = "submit" style = "border:2px solid #1dbf73;color:#1dbf73;"  class = "btn f-100">CONFIRM</button>
                           </div>
                       </div>

                       <!-- loader -->

                       
                       <!--   loader-->
                       
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
            url : "{{ route('bulkpayment') }}",
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




