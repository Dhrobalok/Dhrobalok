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



   #table thead  tr,td,
    #table tbody  th {
        border: 1px solid #000;
        padding: 2px;
        text-align:left;
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
                    

                   
                  <p style="text-align: center;">Pay Bill Report</p>             

              
                   
                
                                          
            </div>

           
          

          <table  id="table">
              @php
                  $total1=0;
                  $total2=0
              @endphp
              @foreach ($fellow as $user )
                  
              
              @php

                  $name=App\Models\Employee::where('roll',$user->studentid)->first();
                  
              @endphp
              
             <thead>
                 <tr>
                     <td>Name</td>
                     <td> {{ $name->name }} </td>
                     
                </tr>

                <tr>
                    <td>Roll No</td>
                    <td>{{ $name->roll }}</td>
                    
               </tr>

               <tr>
                <td>Course</td>
                <td>{{ $name->course }}</td>
                
             </tr>

             <tr>
                <td>Hall Name</td>
                <td>{{ $name->hallname }}</td>
                
             </tr>
                     {{-- <td>Name</td>
                    <td>{{ $name->name }}</td> --}}
                     
                 </tr>
             </thead>
             <tbody>
                 
                  
                
             </tbody>

          </table>
          @if ($user->paystate==1)
              
          <br><br><br>
          <h4 style="text-align: center;">Pay Bill</h4>
          <table class="table">
              <thead>
                  <tr>
                      <th>Month</th>
                      <th>Ship No</th>
                      <th> Date</th>
                      <th>Amount</th>
                      
                      
                  </tr>
                  
                 
              </thead>
              <tbody>
                  <tr>
                      <td>{{ $user->month }}/{{ $user->year }}</td>
                      <td>{{ $user->shipnum }}</td>
                    <td>{{ date('d-m-y', strtotime($user->created_at)) }}</td>
                    <td>{{ $user->amount }}</td>
                  </tr>
                  
                  <tr>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th>{{ $total1=$user->amount+$total1 }}</th>
                </tr>
                
              </tbody>

              {{-- <tr>
                <th>Total</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>000</td>

            </tr> --}}
          </table>
         
          <br><br><br>

         
      
        @elseif($user->paystate==2)

        <h4 style="text-align: center;">Phd Convertions</h4>
        <table class="table">
          <thead>
              
              <tr>
                  <th>Month</th>
                  <th>Ship No</th>
                  <th> Date</th>
                  <th>Amount</th>
                  
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>{{ $user->month }}/{{ $user->year }}</td>
                  <td>{{ $user->shipnum }}</td>
                <td>{{ date('d-m-y', strtotime($user->created_at)) }}</td>
                <td>{{ $user->amount }}</td>
              </tr>

              <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th>{{ $total2=$user->amount+$total2 }}</th>
              </tr>
          </tbody>
      </table>

          @endif
          @endforeach
                     
                     
                            
    </div>

  
</body>

</html>
