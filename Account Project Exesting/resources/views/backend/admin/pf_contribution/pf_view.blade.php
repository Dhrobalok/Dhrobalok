@extends('backend.admin.index')



@section('content')

<div class="container">

    <!-- Page Content -->       

    <!-- Dynamic Table Full -->

        <div class="block block-rounded">

            <div class="block-header block-header-default">

                <h3 class="block-title">Providend Fund FDR</h3>

                @can('create budget')

                <a class="mr-4" href="{{ route('pfdr.index') }}"
                            style="color:blue;font-weight:500;font-size:22px"><i
                                class="fa fa-arrow-circle-left mr-2"></i>Back</a>

                @endcan

            </div>

            <div class="block-content block-content-full">
                

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                    <form action="{{ route('pffdrcreate.store') }}" method="POST">

                        @csrf
                     
                   <table class="table table-bordered table-striped table-vcenter js-dataTable-full">

                    <thead>

                        <tr>

                            

                            <th class="d-none d-sm-table-cell text-center">Contribution_Amount</th>

                            <th class="d-none d-sm-table-cell text-center">Starting_date</th>
                            <th class="d-none d-sm-table-cell text-center">Mature_date</th>
                            <th class="d-none d-sm-table-cell text-center">FDR_no</th>
                            <th class="d-none d-sm-table-cell text-center">BankName</th>
                            <th class="d-none d-sm-table-cell text-center">BranceName</th>
                            <th class="d-none d-sm-table-cell text-center">Action</th>


                            
                        </tr>

                    </thead>
                                        
                          @php
                        
                          
                          $confirm_p=App\Models\PFFdr::where('month',$month)
                          ->orWhere('month',1)
                          ->where('year',$year)
                          ->where('fdr_amount',$allmonthvalue)
                          ->first();
                          $confirm=App\Models\PFFdr::get();
                              
                          @endphp
                          
                          
                        @if (!$confirm_p)
                            
                                 
                        
                               
                           
                           <td><input type="" class="form-control" name="fdr_amount" value="{{$allmonthvalue }}" readonly></td>
                           <td><input type="date" class="form-control" name="start_date" required></td>
                           <td><input type="date" class="form-control" name="end_date" required></td>
                           <td><input type="text" class="form-control" name="fdr_number" required></td>
                           <td>
                               <select name="bankname" id="" class="form-control">
                                <option value="">Select Option</option>
                                   @foreach ($bank as $banks)
                                       
                                    
                                   <option value="{{$banks->bank_name}}">{{ $banks->bank_name }}</option>
                                   @endforeach
                               </select>
                           </td>
                        
                           <td><input type="text" class="form-control" name="brance" required></td>
                           <input type="hidden" name="month" value="{{ $month }}">
                           <input type="hidden" name="year" value="{{ $year }}">
                         
                           <td>
                            <button class="btn" type="submit" id="1"
                            style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Created</button>
                           
                       
                          </td>
                        
                          
                          @endif  

                     
                        
                        
                    
                    </tbody>

                </table>
            </form>  
            </div>

            </div>

        <!-- END Dynamic Table Full -->

        </div>

    <!-- END Page Content 

                                                        

    -->

@endsection









