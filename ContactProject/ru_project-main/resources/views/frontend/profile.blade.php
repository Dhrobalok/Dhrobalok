@extends('frontend.layout')
@section('content')
<style>
    #agrani_bank
    {
        width: 50px;
        height: 40px;
       
        background: #fff;
        border-radius: 40px;
        position: relative;
    }

    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
}
</style>

<div class="row justify-content-center" style="padding-top:10px;">
    <div class="col-lg-12" style="">

        <div class="card" style="border:none;background:#f7f7f7">
            <div class="card-header bg-white">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background-color:#blue">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                        {{-- <a class="nav-item nav-link" id="nav-profile-edit-tab" data-toggle="tab" href="#profile-edit"
                            role="tab" aria-controls="nav-profile-edit" aria-selected="false">Thesis Submit</a> --}}
                        {{-- <a class="nav-item nav-link" id="nav-salary-tab" data-toggle="tab" href="#nav-salary" role="tab" 
                            aria-controls="nav-salary" aria-selected="false">Payslip</a> --}}
                         
{{--                             
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle f-100" href="#" role="button" id="accounting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Accounting
                                </a>
             
                                {{-- <div class="dropdown-menu" aria-labelledby="accounting">
                                <a class="dropdown-item" ">Payment Vouchers</a>
                              </div> 

                           </div> --}}

                                

                            {{-- <a class="nav-item nav-link" href="{{ route('paybill_download',['student_id' => $employee->roll]) }}"  
                            >Paybill Report</a>  --}}

                            {{-- <a class="nav-item nav-link" href="{{ route('felloship_download',['student_id' => $employee->roll]) }}"  
                            >FellowShip Report</a>  --}}

                          
                        {{-- <a class="nav-item nav-link" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab"
                            aria-controls="nav-loan" aria-selected="false">Loan</a>--}}
                        {{-- <a class="nav-item nav-link" id="nav-provident-fund-tab" data-toggle="tab" 
                            href="#nav-provident-fund" role="tab" aria-controls="nav-provident-fund"
                            aria-selected="false">Provident Fund</a>
                            --}}
                        {{-- <a class="nav-item nav-link" id="nav-gratunity-tab" data-toggle="tab" 
                            href="#nav-gratunity-fund" role="tab" aria-controls="nav-gratunity-fund"
                            aria-selected="false">Gratuity</a>
                            --}}
                    </div>
                </nav>
            </div>
            <div class="card-body">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <div class="card bg-white shadow-sm" style="min-height:430px;">
                                    <div class="card-body">
                                        <div class="row justify-content-center form-group">
                                            <img src="{{ URL :: to($employee -> employee_photo) }}"
                                                class='rounded-circle' height="150px" width="150px;">
                                        </div>
                                        <div class="row justify-content-center">
                                            <h5>{{ $employee->name}}</h5>
                                        </div>

                                        {{-- <div class="row justify-content-center">
                                            <p>Roll:&nbsp;{{ $employee->roll}}</p>
                                        </div> --}}
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-lg-3">
                                                <h6>Name : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label>{{ $employee->name }}</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Email : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label>{{ $employee->email }}</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Mobile : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label>{{ $employee->mobile_no }}</label>
                                                
                                            </div>
                                        </div>
                                       

                                        {{-- <div class="row">

                                            <div class="col-lg-3">
                                                <h6>Hall Name : </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{ $employee->hallname}}</label>
                                            </div>
                                        </div> --}}
                                        <hr>

                                        {{-- <div class="row">

                                            <div class="col-lg-3">
                                                <h6>Course : </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{$employee->course}}</label>
                                            </div>
                                        </div> --}}

                                        <div class="row">


                                        </div>
                                     

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="tab-pane fade" id="profile-edit" role="tabpanel" aria-labelledby="nav-profile-edit-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-2 col-sm-3">
                                <p style="margin-top: 50px;text-align:center;">
                                    <img src="{{ asset('public/company_pic/ru-logo.png') }}" alt="">
                                </p>
                           </div>

                       

                            <div class="col-lg-3">
                                <h5 style="font-size:16px; font-weight:bold;text-align:center;">Institute&nbspof&nbspBiological&nbspSciences</h5>
                                <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>
                                <p style="font-size:16px; font-weight:bold;text-align:center;">Rajshahi-6205,Bangladesh</p>
                                <p style="font-size:16px; font-weight:bold;text-align:center;">(To&nbspSubmitted&nbspto&nbspthe&nbspPh.D/M.Phill&nbspThesis)</p>
                                <br><br>
                                <p style="font-size:16px; font-weight:bold;text-align:center;display:inline-block;">Bill&nbspSubmitted&nbspby&nbspPh.D/M.Phill&nbspPrincipal&nbspSupervisor/Co-Supervisor</p>


                               
                                                          
                                
                           </div>
                          
                           <div class="col-md-2 col-sm-3">
                            <p style="margin-top: 50px;text-align:center;">
                                <img src="{{ asset('public/company_pic/download.png') }}" alt="">
                            </p>
                          </div>
                              
                   
                            
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label style="display: flex;">Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label style="display: flex;">Designation<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label style="display: flex;">Full Address<span class="text-danger">*</span></label>
                            </div>
    
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            
                        </div>
    
    
                        <div class="row">
                            <div class="col-md-4">
                                <label style="display: flex;">Name of Fellow(Ph.D/M.Phill)<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label style="display: flex;">Session<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <label style="display: flex;">Roll No<span class="text-danger">*</span></label>
                            </div>
    
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label style="display: flex;">Title of Ph.D/M.Phill Thesis<span class="text-danger">*</span></label>
                            </div>
                          
    
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                          
                            
                        
                    </div>

                        <div class="row">
                        
                           <div class="col-md-7">
                            <label style=" font-weight:bold;text-align:center;">Description of work<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                           </div>
                            
                            <div class="col-md-1">
                                <label style=" font-weight:bold;text-align:center;">Remuneration<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

                            </div>
                        </div>
                       
                           <div class="row">
                            
                                <div class="col-md-7">
                                    <label style="font-weight:bold;">Principal Supervisor<span class="text-danger"></span></label>
                                </div>
                                <div class="col-md-3">
                                   <input type="text" class="form-control" name="" placeholder="Taka" >
                                </div>
                               
                            </div>
                            
                            <div class="row">
                                <div class="col-md-7">
                                
                                 <label style="font-weight:bold;">Co-Supervisor<span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="" placeholder="taka">
                                 </div>

                            </div>


                            <div class="row">
                               <div class="col-md-7">
                                
                                <label style="font-weight:bold;">Supervisor<span class="text-danger"></span></label>
                               </div>

                               <div class="col-md-3">
                                <input type="text" class="form-control" name="" placeholder="taka">
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                 
                                 <label style="font-weight:bold;">Submission date of Thesis<span class="text-danger"></span></label>
                                </div>
 
                                <div class="col-md-3">
                                 <input type="date" class="form-control" name="" placeholder="">
                                </div>
                            </div>

                             <br><br><br><br>

                            <div class="row">
             
                                 <div class="col-md-7">
                                     <label style=" font-weight:bold;text-align:center;">Signature&nbspof&nbspExaminer/Supervisor<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                                     <div class="row">
                                        
                                        <input type="file" class="form-control" style="width:50%;" name="" placeholder="">
                                    
                                     </div>
                                </div>
                                     
                                     
                                <div class="col-md-1">
                                    <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature&nbspof&nbspThe&nbspChairman&nbspof&nbspExamination&nbspCommittee<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                                    <div class="row">
                                        
                                        <input type="file" class="form-control" style="width:100%;" name="" placeholder="">
                                    
                                     </div>
        
                                </div>
                      
                        

                             </div>

                             <br><br>
                             
                       <div class="row">
                           
                           <p style="font-size:17px; display: flex;flex-direction:column; justify-content:center">Please&nbspPay&nbsp
                           
                           </p>

                           

                           
                           <div class="col-md-2">
                            <input type="text" class="form-control" name="" id="" placeholder="Taka">
                           </div>

                           <p style="font-size:17px; display: flex;flex-direction:column; justify-content:center">Only to Professor/Dr
                           
                           </p>

                           <div col-md-2">
                            <input type="text" class="form-control" name="" id="" placeholder="">
                           </div>

                       </div>



                       <br><br><br><br>

                       <div class="row">
                        
                        <div class="col-md-4">
                         <label style=" font-weight:bold;text-align:center; display:inline-block;">Signature Of Section Officer(Accounts)IBS<hr style="border: 1px solid red;"><span class="text-danger"></span></label>
                        </div>
                         
                         <div class="col-md-4">
                             <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Secretary IBS<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

                         </div>

                         <div class="col-md-4">
                            <label style=" font-weight:bold;text-align:center;display:inline-block;">Signature Of Director IBS<hr style="border: 1px solid red;"><span class="text-danger"></span></label>

                        </div>
                     </div>

                     <div class="row">

                        <div class="col-md-3">
                            <input type="file" class="form-control" name="" id="">
                        </div>

                        <div class="col-md-3">
                            <input type="file" class="form-control" name="" id="">
                        </div>

                        <div class="col-md-3">
                            <input type="file" class="form-control" name="" id="">
                        </div>

                     </div>

                      
                            
                    

                </div> --}}

                  
                    <!-- start pauslip nav -->
                    
                    <div class="tab-pane fade" id="nav-salary" role="tabpanel" aria-labelledby="nav-salary-tab">

                       

                             
                                <div class="row justify-center">

                                   


                                    <div class="column">
                                        <p style="text-align: center;">IBSC Accounting Section</p>
                                        <div class="row">
                                            <p style="margin-left: 30px;">
                                                <img id="agrani_bank" src="{{ asset('public/company_pic/agrani bank logo.png') }}" alt="">
    
                                           </p>

                                            
                                            <h5 style="font-size: 16px;font-weight:bold; display:inline-block;margin-left:34px;">Agrani Bank Limited<br></h5>
                                            
                                            <div class="row">
                                                <div>
                                                    <p style="display:inline-block;margin-top:20px;margin-left: -140px;">Rajshahi University Brance</p>
                                                </div>

                                                <div>
                                                    <p style="display:inline-block;margin-top:50px;margin-left: -130px;">Payslip</p>
                                                </div>
                                               
                                               
    
                                            </div>

                                            <div>
                                                <p style="display:inline-block;margin-top:80px;margin-left: -200px;font-weight:bold;">Institute Of Biological Science,R.U.</p>
                                            </div>
                                           
                                           
                                            
                                        
                                        </div>

                                        <div>
                                            <label>Account No: <span style="font-weight:bold;">02232</span></label>
                                            <label style=""><span style="font-weight:bold;">Date</span>:-----------------</label>
                                        </div>


                                        <div>
                                            <label for="">Name:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label for="">Roll:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label for="">Session:-------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label for="">Course:-------------------------------</label>

                                            
                                        </div>

                                        

                                        
                                            

                                          
                                                <table style="width:100%; float:left;" >
                                                    <tr>
                                                        <th>Particular</th>
                                                        <th>Amount(TK.)</th>
                                                      </tr>
                                                      <tr>
                                                        <td>Admission Fee</td>
                                                        <td></td>
                                                      </tr>
                                                      <tr>
                                                        <tr>
                                                            <td>Tution Fee</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Registration Fee</td>
                                                          <td></td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>Library Fee</td>
                                                            <td></td>
                                                          </tr>
    
    
                                                          <tr>
                                                            <td>Laboratory Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Migration Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Seat Rent</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Work Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Transfer Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Other Fee <br>
                                                                <span>a) <br></span> 
                                                                   
                                                                <span>b) <br></span> 
                                                                <span>c)</span> 

                                                            </td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td style="font-weight:bold;">total</td>
                                                            <td></td>
                                                          </tr>
                                                          
                                                       
                                                         
                                                       
                                                           
                                                </table>

                                                <div>
                                                   
                                                    <p style="float:left"><br>Taka(in Word)-------------------------------</p>
                                                    <p>----------------------</p>
                                                   
        
                                                </div>

                                                <div>
                                                    <p style="float: 4px;">Depositor's Signature <br><br>
                                                    <span style="float:left">Officer</span>
                                                    <span style="margin-left:10px;">Cashier</span>
                                                
                                                    </p>
                                                  
                                                </div>
                                                <div>
                                                    <p style="margin-left: 5px;">Date:</p>
                                                </div>
                                               

                                            
                                             
                                                                                                                               

                                    </div>
                                   
                                    




                                    <div class="column">
                                        <p style="text-align: center;">IBSC Academic Section</p>
                                        <div class="row">
                                            <p style="margin-left: 110px;">
                                                <img id="agrani_bank" src="{{ asset('public/company_pic/agrani bank logo.png') }}" alt="">
    
                                           </p>

                                            
                                            <h5 style="font-size: 16px;font-weight:bold; display:inline-block;margin-left:34px;">Agrani Bank Limited<br></h5>
                                            
                                            <div class="row">
                                                <div>
                                                    <p style="display:inline-block;margin-top:20px;margin-left: -140px;">Rajshahi University Brance</p>
                                                </div>

                                                <div>
                                                    <p style="display:inline-block;margin-top:50px;margin-left: -130px;">Payslip</p>
                                                </div>
    
                                            </div>

                                            <div>
                                                <p style="display:inline-block;margin-top:80px;margin-left: -200px;font-weight:bold;">Institute Of Biological Science,R.U.</p>
                                            </div>

                                            
                                           
                                        
                                        </div>

                                      
                                        <div>
                                            <label style="margin-left: 70px;">Account No: <span style="font-weight:bold;">02232</span></label>
                                            <label style=""><span style="font-weight:bold;">Date</span>:-----------------</label>
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Name:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Roll:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Session:-------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Course:-------------------------------</label>

                                            
                                        </div>

                                        
                                            <div>
                                                <table style="width:80%; margin-left:67px;" >
                                                    <tr>
                                                        <th>Particular</th>
                                                        <th>Amount(TK.)</th>
                                                      </tr>
                                                      <tr>
                                                        <td>Admission Fee</td>
                                                        <td></td>
                                                      </tr>
                                                      <tr>
                                                        <tr>
                                                            <td>Tution Fee</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Registration Fee</td>
                                                          <td></td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>Library Fee</td>
                                                            <td></td>
                                                          </tr>
    
    
                                                          <tr>
                                                            <td>Laboratory Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Migration Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Seat Rent</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Work Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Transfer Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Other Fee <br>
                                                                <span>a) <br></span> 
                                                                   
                                                                <span>b) <br></span> 
                                                                <span>c)</span> 

                                                            </td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td style="font-weight:bold;">total</td>
                                                            <td></td>
                                                          </tr>
                                                          
    
                                                           
                                                           
                                                </table>


                                        </div>
                                        <br>

                                        <div>
                                            <p style="margin-left: 59px;">Taka(in Word)--------------------------------</p>
                                            <p style="margin-left: 59px;">-----------------------</p>

                                        </div>

                                        <div>
                                            <p style="margin-left: 40px;">Depositor's Signature
                                            <span style="margin: 25px;">Officer</span>
                                            Cashier</p>
                                        </div>
                                        <div>
                                            <p style="margin-left: 40px;">Date:</p>
                                        </div>
                                        

                                    </div>


                                    <div class="column">
                                        <p style="text-align: center;">Depositors</p>
                                        <div class="row">
                                            <p style="margin-left: 140px;">
                                                <img id="agrani_bank" src="{{ asset('public/company_pic/agrani bank logo.png') }}" alt="">
    
                                           </p>

                                            
                                            <h5 style="font-size: 16px;font-weight:bold; display:inline-block;margin-left:34px;">Agrani Bank Limited<br></h5>
                                            
                                            <div class="row">
                                                <div>
                                                    <p style="display:inline-block;margin-top:20px;margin-left: -140px;">Rajshahi University Brance</p>
                                                </div>

                                                <div>
                                                    <p style="display:inline-block;margin-top:50px;margin-left: -130px;">Payslip</p>
                                                </div>
    
                                            </div>

                                            <div>
                                                <p style="display:inline-block;margin-top:80px;margin-left: -200px;font-weight:bold;">Institute Of Biological Science,R.U.</p>
                                            </div>
                                           
                                           
                                        
                                        </div>

                                        <div>
                                            <label style="margin-left: 70px;">Account No: <span style="font-weight:bold;">02232</span></label>
                                            <label style=""><span style="font-weight:bold;">Date</span>:-----------------</label>
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Name:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Roll:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Session:-------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Course:-------------------------------</label>

                                            
                                        </div>

                                        
                                            <div>
                                                <table style="width:80%; margin-left:67px;" >
                                                    <tr>
                                                        <th>Particular</th>
                                                        <th>Amount(TK.)</th>
                                                      </tr>
                                                      <tr>
                                                        <td>Admission Fee</td>
                                                        <td></td>
                                                      </tr>
                                                      <tr>
                                                        <tr>
                                                            <td>Tution Fee</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Registration Fee</td>
                                                          <td></td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>Library Fee</td>
                                                            <td></td>
                                                          </tr>
    
    
                                                          <tr>
                                                            <td>Laboratory Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Migration Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Seat Rent</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Work Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Course Transfer Fee</td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td>Other Fee <br>
                                                                <span>a) <br></span> 
                                                                   
                                                                <span>b) <br></span> 
                                                                <span>c)</span> 

                                                            </td>
                                                            <td></td>
                                                          </tr>

                                                          <tr>
                                                            <td style="font-weight:bold;">total</td>
                                                            <td></td>
                                                          </tr>
                                                          
    
                                                           
                                                           
                                                </table>
                                        </div>

                                        <div>
                                            <p style="margin-left: 59px;"><br> Taka(in Word)-------------------------------------</p>
                                            <p style="margin-left: 59px;">-----------------------</p>

                                        </div>

                                        <div>
                                            <p style="margin-left: 55px;">Depositor's Signature
                                            <span style="margin: 25px;">Officer</span>
                                            Cashier</p>
                                        </div>
                                        <div>
                                            <p style="margin-left: 55px;">Date:</p>
                                        </div>

                                        

                                    </div>



                                    <div class="column">
                                        <p style="text-align: center;">Bank</p>
                                        <div class="row">
                                            <p style="margin-left: 120px;">
                                                <img id="agrani_bank" src="{{ asset('public/company_pic/agrani bank logo.png') }}" alt="">
    
                                           </p>

                                            
                                            <h5 style="font-size: 16px;font-weight:bold; display:inline-block;margin-left:34px;">Agrani Bank Limited<br></h5>
                                            
                                            <div class="row">
                                                <div>
                                                    <p style="display:inline-block;margin-top:20px;margin-left: -140px;">Rajshahi University Brance</p>
                                                </div>

                                                <div>
                                                    <p style="display:inline-block;margin-top:50px;margin-left: -130px;">Payslip</p>
                                                </div>
    
                                            </div>
                                           
                                            <div>
                                                <p style="display:inline-block;margin-top:80px;margin-left: -200px;font-weight:bold;">Institute Of Biological Science,R.U.</p>
                                            </div>
                                           
                                        
                                        </div>

                                        <div>
                                            <label style="margin-left: 70px;">Account No: <span style="font-weight:bold;">02232</span></label>
                                            <label style=""><span style="font-weight:bold;">Date</span>:-----------------</label>
                                        </div>


                                        <div>
                                            <label style="margin-left: 67px;">Name:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Roll:----------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Session:-------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <label style="margin-left: 67px;">Course:-------------------------------</label>

                                            
                                        </div>

                                        <div>
                                            <table style="width:80%; margin-left:67px;" >
                                                <tr>
                                                    <th>Particular</th>
                                                    <th>Amount(TK.)</th>
                                                  </tr>
                                                  <tr>
                                                    <td>Admission Fee</td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <tr>
                                                        <td>Tution Fee</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Registration Fee</td>
                                                      <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Library Fee</td>
                                                        <td></td>
                                                      </tr>


                                                      <tr>
                                                        <td>Laboratory Fee</td>
                                                        <td></td>
                                                      </tr>

                                                      <tr>
                                                        <td>Migration Fee</td>
                                                        <td></td>
                                                      </tr>

                                                      <tr>
                                                        <td>Seat Rent</td>
                                                        <td></td>
                                                      </tr>

                                                      <tr>
                                                        <td>Course Work Fee</td>
                                                        <td></td>
                                                      </tr>

                                                      <tr>
                                                        <td>Course Transfer Fee</td>
                                                        <td></td>
                                                      </tr>

                                                      <tr>
                                                        <td>Other Fee <br>
                                                            <span>a) <br></span> 
                                                               
                                                            <span>b) <br></span> 
                                                            <span>c)</span> 

                                                        </td>
                                                        <td></td>


                                                        
                                                      </tr>

                                                      <tr>
                                                        <td style="font-weight:bold;">total</td>
                                                        <td></td>

                                                      </tr>
                                                      

                                                       
                                                       
                                            </table>
                                        </div>

                                        <div>
                                            <p style="margin-left: 55px;"><br> Taka(in Word)-------------------------------------</p>
                                            <p style="margin-left: 55px;">-----------------------</p>

                                        </div>

                                        <div>
                                            <p style="margin-left: 55px;">Depositor's Signature
                                            <span style="margin: 25px;">Officer</span>
                                            Cashier</p>
                                        </div>
                                        <div>
                                            <p style="margin-left: 55px;">Date:</p>
                                        </div>
                                        


                                        

                                    </div>





                                   
                                   

                                </div>
                               
                             
                        

                               
                                   

                                
                               

                    </div>


                    <!-- start pauslip nav -->
               

                </div>
            

                    



                    
                   
                  
                     {{--  

                    <!-- Gratuity start -->

                    @php
                         //$retird=App\Models\GratuityUser::select('retd_date')->where('employee_id',$employee->user_id)->first();
                    @endphp
                  
                    @php
                       // $employeedetails=App\Models\Employee::where('roll',$employee->user_id)->first();
                       // $datework=\Carbon\Carbon::createFromDate($employeedetails->joining_date);
                       
                        
                       
                        

                    @endphp
                  
                    @php
                        
                    @endphp

                     
                     @if($testdate==$testdate2)

                     <div class="tab-pane fade" id="nav-gratunity-fund" role="tabpanel" aria-labelledby="nav-gratunity-fund">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center f-100 font-bold text-black">
                                        <h4>Gratunity</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm table-striped f-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sl = 0;
                                                $total=0;
                                              
                                              //$payslips=App\Models\Gratuity::where('employee_id',$employee->user_id)->get();
                                              
                                                @endphp
                                                @foreach($payslips as $generate_info)
                                                @php

                                                $sl++;
                                               // $employee_name=App\Models\Employee::where('roll',$generate_info->employee_id)->first();
                                                @endphp
                                               
                                             
                                                
                                                
                                                
                                                <tr class="text-center">
                                                    <td> {{ $sl }}</td>
                                                    <td>{{ $employee_name->name }}</td>
                                                    <td>{{ $generate_info -> year }}</td>
                                                    <td>{{ $generate_info -> month }}</td>
                                                    <td>{{ $total=$total+$generate_info -> contribution }}</td>
                                                    <td>
                                                        <a href="{{ route('gaturity_download',['generate_id' => $employee->user_id]) }}"
                                                            class="btn btn-danger"><i class="fa fa-download"></i></a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @else

                    <div class="tab-pane fade" id="nav-gratunity-fund" role="tabpanel" aria-labelledby="nav-gratunity-fund">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center f-100 font-bold text-black">
                                        <h4>Gratunity</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm table-striped f-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Name</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sl = 0;
                                              
                                             // $payslips=App\Models\Gratuity::where('employee_id',$employee->user_id)->get();
                                                @endphp
                                                @foreach($payslips as $generate_info)
                                                @php

                                                $sl++;
                                                $employee_name=App\Models\Employee::where('user_id',$generate_info->employee_id)->first();
                                                @endphp
                                               
                                             
                                                
                                                
                                                
                                                <tr class="text-center">
                                                    <td> {{ $sl }}</td>
                                                    <td>{{ $employee_name->name }}</td>
                                                    <td>{{ $generate_info -> year }}</td>
                                                    <td>{{ $generate_info -> month }}</td>
                                                    <td>{{ $generate_info -> contribution }}</td>
                                                   
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                         
                     @endif

                    

                   

                      <!-- Gratuity end -->

                    <!-- Loan nav starts here -->
                    <div class="tab-pane fade" id="nav-loan" role="tabpanel" aria-labelledby="nav-loan">

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Apply for a new Loan</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="loan_application">
                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-3">
                                                    <label><b>Loan Amount</b></label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" step="any"
                                                        id="loan_amount" value="0">
                                                </div>
                                            </div>

                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-3">
                                                    <label><b>Tenure Year</b></label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" step="any"
                                                        id="tenure_year" value="0">
                                                </div>
                                            </div>
                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-3">
                                                    <label><b>Interest Rate</b></label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" step="any"
                                                        id="interest_rate" readonly
                                                        value={{ $interest_rate -> interest_rate }} required>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-3">
                                                    <label><b>EMI</b></label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" step="any" id="emi"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center form-group">
                                                <div class="col-lg-3">
                                                    <label><b>Total Payable</b></label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" class="form-control" step="any"
                                                        id="total_payable" readonly>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-3">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h5>Current Loan Status</h5>
                                    </div>
                                    <div class="card-body">
                                        @php $loan_info = $employee -> hasLoan; @endphp
                                        @if( $loan_info== null)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6>No results found</h6>
                                            </div>
                                        </div>
                                        @else

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Reference No.</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label>{{ $loan_info -> loan_ref_no }}</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Base Amount </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{ $loan_info -> base_amount }}</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Total Amount </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{ $loan_info -> total_amount }}</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>EMI Amount</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label>{{ $loan_info -> emi_amount }}</label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Tenure Years </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{ $loan_info -> tenure_year }} Years</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6> Interest Rate </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>{{ $loan_info -> interest_rate }} %</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Current Status </h6>
                                            </div>
                                            <div class="col-lg-6">
                                                @if($loan_info -> status == 1)
                                                Pending
                                                @elseif($loan_info -> status == 0)
                                                Not Approved
                                                @elseif($loan_info -> status == 2)
                                                Approved
                                                @else
                                                Pending Approval
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loan_info && $loan_info -> status == 2)
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>EMI Amonut</th>
                                                        <th>Pay Date</th>
                                                        <th>Remaining Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $total_amount = $loan_info -> total_amount; @endphp
                                                    @foreach($loan_info -> details as $detail)
                                                    <tr class="text-center">
                                                        <td>
                                                            {{ $detail -> year }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> month }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> emi_amount }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> pay_date }}
                                                        </td>
                                                        <td>{{ $total_amount - $detail -> emi_amount  }}</td>
                                                        @php $total_amount -= $detail -> emi_amount; @endphp
                                                    </tr>

                                                    @endforeach
                                                <tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Provident fund tab starts here -->
                    
                    <div class="tab-pane fade" id="nav-provident-fund" role="tabpanel" aria-labelledby="nav-loan-tab">

                        <div class="row form-group">
                            <div class="col-md-3">
                                {{--  
                                <form id="pf_contribution_settings_form"
                                    >
                                    @csrf
                                    <input type = "hidden" name = "user_id" value = "{{ Auth :: user() -> id }}">
                                    <div class="card shadow-sm">
                                        
                                        <div class="card-header shadow-sm">
                                            <h4 class="f-100 text-center">Define Provident Contribution</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6">
                                                     <p style = "font-size:20px;">Min Contribution : {{ $provident_rule  -> min_rate_percentage }} %</p> 
                                                </div>
                                                <div class="col-md-6">
                                                   <p style = "font-size:20px;">Max Contribution : {{ $provident_rule -> max_rate_percentage }} %</p> 
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style = "font-size:20px;">Contribution : </label>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="input-group mb-3">
                                                    <input type="text" class="form-control" required name = "pf_contribution_rate" id = "pf_contribution_rate" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                      <span class="input-group-text" id="basic-addon2">%</span>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type = "button" class = "btn btn-primary" id = "calculate_pf_btn">Calculate</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style = "font-size:20px;">Your Contribution : </label>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name = "self_contribution" id = "self_contribution" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                      <span class="input-group-text" id="basic-addon2">Tk.</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style = "font-size:20px;">Company Contribution : </label>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id = "company_contribution" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                      <span class="input-group-text" id="basic-addon2">Tk.</span>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row text-center">

                                                <div class="col-md-12">
                                                    <button type="submit" class="f-100 btn btn-primary pr-4 pl-4 btn-sm" style = "font-size:20px;">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                 
                            </div>
                         
                            <div class="col-md-6 px-0">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center">
                                        <h4 class="f-100">Previous Provident Fund Contributions</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class = "table table-bordered table-sm table-striped">
                                                    <thead>
                                                        <tr class = "text-center">
                                                            <th>Date</th>
                                                            <th>Month</th>
                                                            <th>Year</th>
                                                            <th>Employee Contribution</th>
                                                            <th>Company Contribution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($employee -> previousPFContributions as $contribution)
                                                        <tr class = "text-center">
                                                            <td>{{ date('Y-m-d',strtotime($contribution -> date )) }}</td>
                                                            <td>{{ $contribution -> month }}</td>
                                                            <td>{{ $contribution -> year }}</td>
                                                            <td>{{ (10/100)*$employee -> payscale }}</td>
                                                            <td>{{ (8.33/100)*$employee -> payscale }}</td>
                                                            <!--<td>{{ (10/100)*$contribution -> pf_amount }}</td>
                                                            <td>{{ (8.33/100)*$contribution -> pf_amount }}</td>-->
                                                        </tr>
                                                      @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($loan_info && $loan_info -> status == 2)
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Year</th>
                                                        <th>Month</th>
                                                        <th>EMI Amonut</th>
                                                        <th>Pay Date</th>
                                                        <th>Remaining Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $total_amount = $loan_info -> total_amount; @endphp
                                                    @foreach($loan_info -> details as $detail)
                                                    <tr class="text-center">
                                                        <td>
                                                            {{ $detail -> year }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> month }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> emi_amount }}
                                                        </td>
                                                        <td>
                                                            {{ $detail -> pay_date }}
                                                        </td>
                                                        <td>{{ $total_amount - $detail -> emi_amount  }}</td>
                                                        @php $total_amount -= $detail -> emi_amount; @endphp
                                                    </tr>

                                                    @endforeach
                                                <tbody>
                                            </table>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                          --}}
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('js')
        {{-- <script>
        $(document).ready(function() {
            $('#file_upload_button').on('click', function(e) {
                e.preventDefault();
                $('#file_upload_photo').trigger('click');
            });
            $(document).on("change", "#file_upload_photo", function() {

                var profile_image = $('#file_upload_photo').prop('files')[0];
                var reader = new FileReader();
                reader.onload = function() {
                    $("#user_photo").attr("src", reader.result);
                }
                reader.readAsDataURL(profile_image);
            });
        })
        </script>
        <script>
        $(document).ready(function() {
            $('#loan_amount').on('change', function() {

                var P = $(this).val();
                var N = $('#tenure_year').val();
                var R = $('#interest_rate').val();

                if (P != 0 && N != 0) {

                    var interest = R / 1200.00;
                    var term = N * 12;
                    var top = Math.pow((1 + interest), term);
                    var bottom = top - 1;
                    var ratio = top / bottom;
                    var EMI = P * interest * ratio;
                    var Total = EMI * term;
                    $('#emi').val(Math.ceil(EMI));
                    $('#total_payable').val(Math.ceil(Total));
                }
            });
            $('#tenure_year').on('change', function() {
                var P = $('#loan_amount').val();
                var N = $(this).val();
                var R = $('#interest_rate').val();


                if (P != 0 && N != 0) {


                    var interest = R / 1200.00;
                    var term = N * 12;
                    var top = Math.pow((1 + interest), term);
                    var bottom = top - 1;
                    var ratio = top / bottom;
                    var EMI = P * interest * ratio;
                    var Total = EMI * term;
                    $('#emi').val(Math.ceil(EMI));
                    $('#total_payable').val(Math.ceil(Total));
                }
            });

           
</script> --}}


   

@endpush
