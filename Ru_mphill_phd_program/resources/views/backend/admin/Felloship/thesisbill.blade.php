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

hr.new3 {
  border-top: 1px dotted black;
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
            <br>
            <br>

            <table id="table">
                <thead>
                    <tr>
                        <td>Name Of The Examiner/Supervisor :</td>
                        <td> {{ $fellow->name  }}<hr class="new3"></td>
                       
                        {{-- <th>Name Of Examiner/Supervisor {{ $fellow->name  }}</th>
                        <th>Designation{{ $fellow->designation }}</th>
                        <th>Full Adress{{ $fellow->adress }}</th> --}}
                    </tr>

                    <tr>
                        <td>Designation :

                        </td>
                        <td> {{ $fellow->designation  }}<hr></td>
                       
                        
                    </tr>

                    <tr>
                        <td>Full Adress :</td>
                        <td> {{ $fellow->adress  }}<hr></td>
                       
                        
                    </tr>
                    <tr>
                        <td>Name of the Bank with Adress :</td>
                        <td>Agrani Bank RU Branch<hr></td>
                       
                        
                    </tr>

                    <tr>
                        <td>Account No :</td>
                        <td><hr></td>
                       
                        
                    </tr>

                    <tr>
                        @php
                            $studentname=App\Models\User::where('student_id',$fellow->student_id)->first();
                        @endphp
                        <td>Name Of Research Fellow :</td>
                        <td> {{ $studentname->name  }}<hr></td>
                       
                        
                    </tr>

                    <tr>
                        <td>Title of Ph.D/M.Phill Thesis :</td>
                        <td> {{ $fellow->title  }}<hr></td>
                       
                        
                    </tr>
                    <br><br>
                  

                     <tr>
                         <td><strong>Description of work</strong></td>
                        <td></td>
                        <td><strong>Remuneration</strong></td>
                    </tr>

                    <tr>
                        <td>Supervission</td>
                       <td></td>
                       <td>Taka :{{ $fellow->supervisor_money }}</td>
                   </tr>

                   

               <tr>
                <td>M.Phill/Ph.D Thesis-(Evalution)</td>
               <td></td>
               <td>Taka :--------------------------------</td>
              </tr>

              <tr>
                <td>M.Phill/Ph.D Thesis-(Viva-Voice)</td>
               <td></td>
               <td>Taka :-------------------------------</td>
              </tr>

              <tr>
                <td>M.Phill/Ph.D Thesis-(honorarium with entertainment of chairman)</td>
               <td></td>
               <td>Taka :------------------------------</td>
              </tr>
              <br><br><br>
              
              <tr><td><strong>Dtae of Submission Thesis</strong></td></tr>
              <tr><td>{{ $fellow->submission_date }}</td></tr>

              <br><br>

              <tr>
                <td><hr>(Signature of Examination/Supervisor)</td>
               <td></td>
               <td><hr>(Signature of The Chairman of Examination Committee)</td>
              </tr>

             
              
                    
                </thead>
                
                <body>

                    
                                   
                   
                </tbody>
            </table>

           
                    <table id="table">
                        <thead>

                            
                             <tr>
                                 @php
                                     $mytime = \Carbon\Carbon::now()->format('d-m-Y');
                                 @endphp
                               <td>Date: {{$mytime }}<hr></td>
                              
                            </tr>

                            <tr>
                                @php
                                    $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                    $word=$digit->format($fellow->supervisor_money);
                                @endphp
                                
                              <td>Please&nbsp;Pay&nbsp;Taka &nbsp;&nbsp;{{ $fellow->supervisor_money }}<hr></td>
                              <td>(In word)&nbsp;{{ $word }}<hr></td>
                              <td> Only To {{$fellow->designation  }}.{{$fellow->name  }},<hr></td>
                             
                           </tr>
                            

                        </thead>
                        <tbody>
                            @php
                             $signature=App\Models\Fellowship::where('roll',$fellow->student_id)->orderBy('id','desc')->take(1)->first();
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
