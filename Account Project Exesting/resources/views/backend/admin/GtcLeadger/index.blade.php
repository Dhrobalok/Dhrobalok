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
                                    class="fa fa-times mr-2"></i>Gtc Payment </a>
                </h3>





                @can('create budget')
                <a href="{{route('gtc.create')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create Gtc_Agreement"></i></a>
                @endcan
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">

                    <h4 style="text-align:center" class="block-title">GTC Agreement</h4>
                    <thead>
                        <tr>
                            <th  class="d-none d-sm-table-cell text-center">Schedule No</th>
                            <th  class="d-none d-sm-table-cell text-center">Title</th>
                            <th colspan="2" class="d-none d-sm-table-cell text-center">Contract Amount</th>

                            <th colspan="2" class="d-none d-sm-table-cell text-center">Remaining Blance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $s1=0;
                        $remainbdt=0;
                        $remainusd=0;
                    @endphp

                        @foreach($gtc_leadger as $key => $value)

                        <tr>

                            <td class="text-center">{{ $s1=$s1+1 }}</td>
                            <td class="text-center"><span style="font-size:1.6vw;">{{ $value->title }}</span>

                            </td>
                            <th colspan="1">USD</th>
                            <th colspan="1">BDT</th>


                            <th colspan="1">Foreign Currency</th>
                            <th colspan="1">Local Currency</th>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                          @if($value->currency==1)

                          <td>{{$value->amount}}</td>

                          <td></td>

                          <td>{{$value->amount-$value->total}}</td>
                          @php
                          $remainusd=($value->amount - $value->total)+$remainusd;
                          @endphp




                            @else
                            <td></td>
                            <td>{{ $value->amount}}</td>

                            <td></td>
                            <td>{{ $value->amount - $value->total}}</td>

                                @php
                                $remainbdt=($value->amount - $value->total)+$remainbdt;

                                @endphp

                            @endif


                          </tr>


                       @endforeach

                    </tbody>

                  
                   
             
                       
                
                      <tr class = "text-center">



                          <td>  <strong>TOTAL</strong></td>

                          <td></td>

                            <td>
                            <strong>
                                {{ $dollar }}
                            </strong>
                            {{--
                            

                                <!--strong style="margin-left:375px;">{{ $dollar }}</strong-->
                                 <strong style="margin-left:30px;">{{$bdt}}</strong>
                                 <strong style="margin-left:40px;">{{$remainusd}}</strong>
                                    <!--<strong style="margin-left:40px;">{{$remainbdt}}</strong>-->

                                    --}}

                            </td>


                            <td>

                            <strong>
                                 {{$bdt}}
                            </strong>
                               

                            </td>


                            <td>
                            <strong>
                                 {{$remainusd}}
                            </strong>
                                

                            </td>


                            <td>

                            <strong>
                                 {{$remainbdt}}
                            </strong>
                             

                            </td>


                          </tr>


                    
                </table>

                </div>
                </div>
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
                            <div class="f-100" style="font-size:20px;color:#1dbf73">GTC Payment</div>
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
                            <select class="form-control" id="level_id" name="gtc_id" required>
                                <option value=0>Please Select Label</option>
                                @foreach( $gtc_leadger as $agreement)
                                <option value="{{ $agreement->id }}">{{ $agreement->title}}</option>
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
            url : "{{ route('gtcpayment') }}",
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




