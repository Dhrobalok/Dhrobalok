<!DOCTYPE html>
<html>

<head>


    <style type="text/css">
    @page {
        size: 8.5in 11in;
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 5px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead  th,
    .table tbody  td {
        border: 1px solid #000;
        padding: 2px;
        text-align: center;
        font-size: 10.5pt;
    }

    
    .heading p {
        text-align: center;
        margin-bottom: 0;
    }

    .heading h5 {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }

    .left {
        text-align: left;
        float: left;
        clear: none;
        width: 50%;
    }

    .right {
        text-align: right;
        float: right;
        clear: none;
        width: 50%;
    }

    .inline {
        clear: both;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
    }
    .text-normal
    {
        font-weight:normal;
    }

    #agrani_bank
    {
        width: 50px;
        height: 40px;
       
        background: #fff;
        
        
        
    }



    #table thead  th,
    #table tbody  td {
        
        padding: 2px;
        text-align: center;
        font-size: 10.5pt;
    }
#table
{
        width: 100%;
        border-collapse: collapse;
}
        

    </style>
</head>

<body>
    <div class="container">



       
        <p style="font-weight:bold;text-align:center;">Institute Of Biological Science</p>
            <div class="row">
                
                    <p style="text-align: center;"><img id="agrani_bank" style="text-align: center;" src="{{ asset('public/company_pic/ru-logo.png') }}" alt=""></p>
                   

                         
                
                 <p style="text-align: center">Rajshahi University </p>
                    

                   
                  <p style="text-align: center;">FellowShip Report</p>             

              
                   
                
                                          
            </div>

           


            <div>
                <label for=""><br>Name:&nbsp;&nbsp;{{ $fellow->name }}</label>

                
            </div>

            <div>
                <label for="">Roll:&nbsp;&nbsp;{{ $fellow->roll }}</label>

                
            </div>

            <div>
                <label for="">Session:&nbsp;&nbsp;{{ $fellow->session }}</label>

                
            </div>

            <div>
                <label for="">Course:&nbsp;&nbsp;{{ $fellow->course }}</label>

                
            </div>

            <br><br>

            
                

              
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Month</th>
                            <th scope="col">Total Month</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Previous_Taken</th>
                            <th scope="col">Total Amount(TK.)</th>
                          </tr>
                        </thead>

                        <tbody>

                        
                          <tr>
                              
                                 
                              
                            <td> {{ date('d-m-y', strtotime($last->created_at)) }}</td>
                            
                          
                          
                            
                            <td>{{ $last->month}}/{{$last->year }}</td>
                               
                        
                              <td>{{ $num }}</td>
                            

                            
                               <td>{{ $last->rate }}</td>
                              
                              

                            
                                <td>{{ $previous }}</td>
                               
                             

                              
                                <td>{{ $last->rate }}</td>
                              

                              
                             
                              

                         
                              </tr>

                              {{-- <tr>
                                <td style="font-weight:bold;">total</td>
                                <td></td>
                              </tr> --}}
                              
                           
                            </tbody> 
                           
                               
                    </table>

                    <div>
                       
                        <p style="float:left">Head Of Account:&nbsp;&nbsp;<strong>Fellowship/Thesis</strong></p>
                        
                    </div>

                    
                    <div>
                       
                        <p style="float:left">Under Head Of Account:&nbsp;&nbsp;<strong> Fellowship post doctorial </strong></p>
                        
                    </div>

                    <div>
                        @php
                            $allocate=App\Models\Budgetmaster::where('accountid',$last->account)->first();
                        @endphp
                       
                        <p style="float:left">Total Allocate Balance :&nbsp;&nbsp;<strong>{{ $allocate->amount+$expencetotal }}</strong></p>
                        
                    </div>

                    <div>
                       
                        <p style="float:left">Total Expence:&nbsp;&nbsp;<strong> {{ $expencetotal }} </strong></p>
                        
                    </div>

                    <div>
                       
                        <p style="float:left">Amount This Bill:&nbsp;&nbsp;<strong> {{ $last->rate }} </strong></p>
                        
                    </div>

                    <div>
                       
                        <p style="float:left">Stock Balane:&nbsp;&nbsp;<strong> {{ $allocate->amount }} </strong></p>
                        
                    </div>

                    <div>
                       
                        <p style="float:left">Budget Number:&nbsp;&nbsp;<strong> {{ $last->account }} </strong></p>
                        
                    </div>

                    
                      <div>
                          <p style="text-align: center;"><strong>Plese send amount of money {{ $last->rate }} to {{ $fellow->name  }},{{ $fellow->course}}&nbsp;Fellow,&nbsc IBSC,RU.</strong></p>
                          

                      </div>
                        
                      <div>
                          <br><br>
                         
                        <p style="text-align:center;">Signature Of Supervisor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Signature Of Bill Submitted by</p>
                        
                        
                        

                      </div>

                      <br>

                      {{-- <div class="row">
                          @php
                             $signature=App\Models\Fellowship::where('roll',$fellow->roll)->orderBy('id','desc')->take(1)->first();
                          @endphp

                                                  
                       
                     
                        <div class="column">
                            <h2>Column 1</h2>
                            <h2>Column 1</h2>

                        </div>

                        <div class="column">
                            <h2>Column 2</h2>

                        </div>
                                                 
                    </div> --}}


                    <table id="table">
                        <thead>
                            <tr>
                                <th>

                                </th>

                                <th>

                                </th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @php
                             $signature=App\Models\Fellowship::where('roll',$fellow->roll)->orderBy('id','desc')->take(1)->first();
                          @endphp
                            <tr>
                                <td><img src="{{ URL :: to($signature -> section_officer) }}"
                                     height="50px" width="50px;"></td>
                                <td><img src="{{ URL :: to($signature -> secretary) }}"
                                    height="50px" width="350px;"></td>
                                <td><img src="{{ URL :: to($signature -> director) }}"
                                    height="50px" width="350px;"></td>

                            </tr>
                            <tr>
                                <td>Secttion Officer</td>
                                <td>Secretary</td>
                                <td>Director</td>
                            </tr>
                              <tr>
                                <td>Institute Of Biological Science</td>
                                <td>Institute Of Biological Science</td>
                                <td>Institute Of Biological Science</td>

                              </tr>

                              <tr>
                                <td>Rajshahi University</td>
                                <td>Rajshahi University</td>
                                <td>Rajshahi University</td>

                              </tr>
                            
                        </tbody>
                      
                    </table>
                     
                     
                            
    </div>

  
</body>

</html>
