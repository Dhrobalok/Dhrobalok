@extends('backend.admin.index')



@section('content')

<div class="container">

    <!-- Page Content -->       

    <!-- Dynamic Table Full -->



        <div class="block block-rounded">



            <div class="block-header block-header-default">



                <h3 class="block-title">Providend Fund FDR</h3>



                @can('create budget')



                <a href="{{route('pfdr')}}" ><i class="fa fa-plus" style="float: right;" data-toggle="tooltip" title="Create New FDR"></i></a>



                @endcan



            </div>



            <div class="block-content block-content-full">

                



                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->

                <div class="table-responsive">

                    {{-- <form action="{{ route('pfadjust.store') }}" method="post"> 



                        @csrf

                          </form>  

                        --}}

                   <table class="table table-bordered table-striped table-vcenter js-dataTable-full">



                    <thead>



                        <tr>
                            <th class="d-none d-sm-table-cell text-center">Sl no</th>
                            <th class="d-none d-sm-table-cell text-center">FDR_no</th>
                            <th class="d-none d-sm-table-cell text-center">Contribution_Amount</th>
                            <th class="d-none d-sm-table-cell text-center">Starting_date</th>

                            <th class="d-none d-sm-table-cell text-center">Mature_date</th>

                            <th class="d-none d-sm-table-cell text-center">Action</th>

                        </tr>
                    </thead>            
                    <tbody>     
                        @php
                            $i=1;
                           
                        @endphp     

                        @foreach ( $confirm as $pf )
                        
                        <td class="text-center">{{ $i++ }}</td>

                        <td class="text-center"><input type="" class="form-control" name="fdr_no" value="{{ $pf->fdr_no }}" readonly></td>

                                     
                        <td class="text-center"><input type="" class="form-control" name="fdr_amount" value="{{ $pf->fdr_amount }}" readonly></td>

                        <td><input type="" class="form-control" name="start_date" value="{{$pf->start_date  }}" readonly ></td>

                        <td><input type="" class="form-control" name="end_date" value="{{$pf->end_date }}" readonly ></td>
                        
                        @if( $pf->status==1)
                        <td><a class="btn btn-sm btn-danger btn-sm text-white"  href="{{ route('pfdr.print',['fdr_no'=>$pf->fdr_no]) }}"
                            ><i class="fa fa-download"></i></a></td>
                        @else
                        <td><a class="btn btn-sm btn-danger btn-sm text-white"  href="{{ route('pfadjust.store',['fdr_no'=>$pf->fdr_no]) }}"
                            >Setup</a></td>
                            
                        @endif

                                               

                        <tr></tr>

                    </tbody>

                        

                        

                     @endforeach

                       

                        

                        

                    

                    </tbody>



                </table>

          

            </div>



            </div>



        <!-- END Dynamic Table Full -->



        </div>



    <!-- END Page Content 



                                                        



    -->



@endsection



















