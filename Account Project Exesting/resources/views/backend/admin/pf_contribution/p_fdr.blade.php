@extends('backend.admin.index')



@section('content')

<div class="container">

    <div class="row">



        <div class="col-md-12">

            <div class="card p-4">

            <div class="row form-group">

               <div class="col-md-12 text-center">

                  <div class="f-roboto">Providend FDR</div>

                  

        
                  <form action="{{ route('pfdr.store') }}" method="post">
                    @csrf
                            
       
                               <div class="row justify-content-center">
       
                                   <div class="col-md-4">
                                       <label>Year<span class="text-danger">*</span></label>
                                   </div>
       
                                 
       
                               </div>
       
       
                               <div class="row justify-content-center">
       
                                
                                    <div class="col-md-3">
                                        <select class="form-control" name="year" required>
                                            <option value="">Select Option</option>
                                            @for($year = 2021 ; $year <= 2035; $year++) <option value={{ $year }}>{{ $year }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                    
       
                                   
       
                               </div>
       
                               <div class="row justify-content-center">
       
                                   <div class="col-md-4">
                                       <label>Month<span class="text-danger">*</span></label>
                                   </div>
       
                                 
       
                               </div>
       
                               <div class="row justify-content-center">
       
                                <div class="col-md-3">
                                    <select class="form-control" name="month">
                                        <option value="">Select Option</option>
                                        <option value="1">AllMonth</option>
                                        
                                        @for($month = 1 ; $month <= 12; $month++) @php
                                            $month_name=date('F',mktime(0,0,0,$month,10)); @endphp <option
                                            value="{{ $month_name }}">{{ $month_name }}</option>
                                            @endfor
                                    </select>
                                </div>
       
                                   
       
                               </div>


                               
                               <br>
       
                               <div class="row justify-content-center">
                                   <div class="col-md-3 btn-group">
       
                                       <button class="btn" type="submit"
                                           style="font-family:'Gentium Basic';color:white;border-color:#1dbf73;background-color:#1dbf73;">Submit</a>
                                   </div>
                               </div>
       
       
                           </form>








            </div>

        </div>

     </div>

    </div>

    </div>

    </div>

</div>

@endsection