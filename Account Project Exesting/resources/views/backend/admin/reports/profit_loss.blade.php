<!DOCTYPE html>
<html>

<head>
    <title>Profit & Loss </title>
    <style type="text/css">
    @page {
        size: 8.5in 11in;
       
    }

    .body {
        font-family: "verdana", Arial, Georgia;
    }

    .container {
        width: 100%;
        padding-top: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr th,
    .table tbody tr td {
        padding: 2px;
        text-align: center;
        font-size: 10pt;
        padding-top: 10px;
        border: 1px solid black;
    }

    .footer {
        padding-top: 70px;
        width: 100%;
    }

    .footer tr td {
        text-align: right;
        width: 25%;
        font-size: 10pt;
        font-weight: bold;
    }

     h3 {
        text-align: center;
        text-decoration: none;
        margin-bottom:5px;

    }

    .heading p {
        text-align: center;
        margin-top: 0;
        padding-top: 0;
    }

    p {
        font-size: 10pt;
    }

   
    

    </style>
</head>

<body>
    
   
        <div>
            <h3 style="text-align:center">{{ $company -> company_name  }}</h3>
            <h4 style="text-align:center;line-height:5px">Statement of Profit & Loss Report</h4>
            <h4 style="text-align:center;line-height:5px">For the year ended 30 June {{ date("y") }}</h4>
            <!--h4 style="text-align:center;line-height:5px">As at {{ date("F j, Y") }}</h4-->
        </div>
  
   
        <div>
            @php
              date_default_timezone_set('Asia/Dhaka');
            @endphp
           <p style = "text-align:center;font-weight:normal">Printed On : {{ date('d-m-y H:i:s') }}</p>
        </div>
 

    @php
    $date = date('Y-m-d');
    @endphp

    <div class="container">
        
        <table class="table">

            <thead>
                <tr class="text-center">
                    <th>
                        Particulars
                    </th>
                    <th>
                        Notes
                        
                    </th>

                

                  
                    <th>
                        20{{ date('y') }} (Taka)
                       

                    </th>

                    <th>
                        20{{ date('y')-1 }} (Taka)

                    </th>

                   
                </tr>

            </thead>
            <tbody>
                @php
                    $totalsale=0;
                    $totalsale_p=0;
                    $non_operating_profit=0;
                    $total_non_operating_profit=0;
                    $total_non_operating_profit_p=0;
                    $non_operating_profit_p=0;
                    $non_income_perating_profit=0;
                    $non_income_perating_profit_p=0;
                    $Net_Proﬁt_before_Tax=0; 
                    $Net_Proﬁt_after_Tax=0;
                    $Net_Proﬁt_before_Tax_p=0; 
                    $Net_Proﬁt_after_Tax_p=0;
                    $total_profit=0;
                    $total_profit_p=0;
                @endphp

              <tr class="text-center">
                  <td>
                      
                      
                        
                      <strong>Sales:</strong>
                      
                      <br>
                      
                      <strong >Less:Cost of goods sold:</strong>
                      
                      
                      <br>
                      <br>
                      <br>
                     
                      
                      <strong>Gross Profit</strong>
                      <br>
                      <strong >Less:Operating Expenses</strong>
                      <br>
                      <br>
                       
                      <strong>Operating Profit</strong>
                      
                      <br>
                       
                      
                      <strong>Less: Financial Expenses </strong>
                       <br>
                                          
                      <strong>Add: Non- Operating Income </strong>
                      <br>
                       <br>
                       <br>
                       
                     <strong>Net Proﬁt before BPP & WF and Tax </strong>
                     <br>
                     <strong>Less: Contribution to BPP and WF </strong>
                     <br>
                     <br>
                    
                     
                     
                     
                        <strong>Net Proﬁt before Tax </strong>
                        <br>
                        
                        <strong>Less: Provision for Income Tax </strong>
                        <br>
                        <br>
                        <strong>Net Proﬁt after Tax </strong>
                        <br>
                        <strong>Add: Other Comprehensive Income </strong>
                        <br>
                        <br>
                        <strong>Total Comprehensive Income
                        </strong>


                
                </td>
                  <td>
                      <br>
                      <br>
                       
                      
                    <strong>23</strong>
                    <br>
                    
                    
                    <strong>24</strong>
                    <br>
                    
                    
                                                                      
                  
                  
                  
                    <br>
                    <br>
                    <br>
                    <br>
                  <strong>25</strong>
                  
                  <br>
                 
                  <br>
                  

                 
                  <br>
                 
               
                  <strong>26</strong>

                   <br>
                
                
                 
                     
                   
                     <strong>27</strong>

                     <br>
                     <br>
                     <br>
                     <br>
                     <strong>21</strong>
                   <br>
                   <br>
                   <br>

                   
                   
                 
                   
                  

                   <strong></strong>

                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>
                     <br>

                     

                  
                 

                     @php
                         $non_operating_profit=$financial-$operatingincome;
                         $total_non_operating_profit=$non_income_perating_profit-$non_operating_profit;

                     @endphp
                     
                   
                      <strong></strong>
                      <br>
                      
                     
                      <strong></strong>
                      <br>
                        
                      
                  </td>
                  

                 
                  <td>
                     
                      
                      <strong>{{$total}}</strong>
                      <br>
                      <strong>{{$total_cost_sold}}</strong>
                      
                                                        
                      <hr>
                    
                    
                    <strong>{{ $totalsale=$total-$total_cost_sold}}</strong>
                    <br>
                    <strong>{{$operating_total}}</strong>
                    <hr>
                    <strong>{{$non_income_perating_profit=$totalsale-$operating_total}}</strong>

                     <br>
                      
                     
                       <strong>{{$financial}}</strong>

                       <br>

                       <strong>{{$operatingincome}}</strong>

                       @php
                           $non_operating_profit=$financial-$operatingincome;
                           $total_non_operating_profit=$non_income_perating_profit-$non_operating_profit;

                       @endphp
                        <hr>
                     
                        <strong>{{$total_non_operating_profit}}</strong>
                        <br>
                        <strong>{{$Contribution}}</strong>
                        <hr>
                        <strong>{{ $Net_Proﬁt_before_Tax=$total_non_operating_profit-$Contribution }}</strong>
                        <br>
                        <strong>{{ $Net_Proﬁt_after_Tax=(30/100)*$Net_Proﬁt_before_Tax }}</strong>
                        <hr>
                        <strong>{{ $total_profit=$Net_Proﬁt_before_Tax-$Net_Proﬁt_after_Tax }}</strong>
                        <br>
                        <strong>{{ $Other_Comprehensive_Income }}</strong>
                        <hr>
                        <strong>{{ $total_profit + $Other_Comprehensive_Income }}</strong>

                    </td>

                   
                  <td>
                    
                      <strong>{{$total_p}}</strong>
                      <br>
                      <strong>{{$total_cost_sold_p}}</strong>
                      <br>
                      
                      <hr>
                 
                    <strong>{{$totalsale_p=$total_p-$total_cost_sold_p}}</strong>
                    <br>
                    <strong>{{$total_operating}}</strong>
                    <hr>
                    <strong>{{$non_operating_profit_p=$totalsale_p-$total_operating}}</strong>
                    <br>
                      
                     
                       <strong>{{$financial_p}}</strong>

                       <br>
                        <strong>{{$operatingincome_p}}</strong>

                        @php
                           $non_operating_profit_p=$financial_p-$operatingincome_p;
                           $total_non_operating_profit_p=$non_income_perating_profit_p-$non_operating_profit_p;

                       @endphp
                         <hr>

                         <strong>{{$total_non_operating_profit_p}}</strong>

                     
                        <br>
                        <strong>{{$Contribution_p}}</strong>
                        <hr>
                        <strong>{{ $Net_Proﬁt_before_Tax_p=$total_non_operating_profit_p - $Contribution_p }}</strong>
                        <br>
                        <strong>{{ $Net_Proﬁt_after_Tax_p=(30/100)*$Net_Proﬁt_before_Tax_p }}</strong>
                        <hr>
                        <strong>{{ $total_profit_p=$Net_Proﬁt_before_Tax_p-$Net_Proﬁt_after_Tax_p }}</strong>
                        <br>
                        <strong>{{ $Other_Comprehensive_Income_p }}</strong>
                        <hr>
                        <strong>{{ $total_profit_p + $Other_Comprehensive_Income_p }}</strong>
                        
                    </td>
                    

                


              </tr>
                


            </tbody>
        
        </table>

        
    </div>
</body>

</html>
