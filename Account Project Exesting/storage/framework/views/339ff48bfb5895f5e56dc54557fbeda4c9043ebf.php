
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center" style="padding-top:10px;">
    <div class="col-lg-12" style="">

        <div class="card" style="border:none;background:#f7f7f7">
            <div class="card-header bg-white">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background-color:#blue">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
                        <a class="nav-item nav-link" id="nav-profile-edit-tab" data-toggle="tab" href="#profile-edit"
                            role="tab" aria-controls="nav-profile-edit" aria-selected="false">Edit Profile</a>
                        <a class="nav-item nav-link" id="nav-salary-tab" data-toggle="tab" href="#nav-salary" role="tab"
                            aria-controls="nav-salary" aria-selected="false">Salary</a>
                        <a class="nav-item nav-link" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab"
                            aria-controls="nav-loan" aria-selected="false">Loan</a>
                        <a class="nav-item nav-link" id="nav-provident-fund-tab" data-toggle="tab"
                            href="#nav-provident-fund" role="tab" aria-controls="nav-provident-fund"
                            aria-selected="false">Provident Fund</a>
                        <a class="nav-item nav-link" id="nav-gratunity-tab" data-toggle="tab"
                            href="#nav-gratunity-fund" role="tab" aria-controls="nav-gratunity-fund"
                            aria-selected="false">Gratuity</a>
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
                                            <img src="<?php echo e(URL :: to($employee -> employee_photo)); ?>"
                                                class='rounded-circle' height="150px" width="150px;">
                                        </div>
                                        <div class="row justify-content-center">
                                            <h5><?php echo e($employee -> name); ?></h5>
                                        </div>
                                        <div class="row justify-content-center">
                                            <label><?php echo e($employee -> designation ? $employee -> designation -> name : ''); ?></label>
                                        </div>
                                        <div class="row justify-content-center">
                                            <label><?php echo e($employee -> department ? $employee -> department -> name : ''); ?></label>
                                        </div>
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
                                                <label><?php echo e($employee -> name); ?></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Email : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label><?php echo e($employee ->email); ?></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Mobile : </h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label><?php echo e($employee -> mobile_no); ?></label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">

                                            <div class="col-lg-3">
                                                <h6>Designation : </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($employee -> designation ? $employee -> designation -> name : ''); ?></label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">

                                            <div class="col-lg-3">
                                                <h6>Department : </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($employee -> department ? $employee -> department -> name : ''); ?></label>
                                            </div>
                                        </div>

                                        <div class="row">


                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Joining Date : </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($employee -> joining_date); ?></label>
                                            </div>

                                        </div>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-edit" role="tabpanel" aria-labelledby="nav-profile-edit-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">

                                <?php if(Session :: get('success_message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session :: get('success_message')); ?>

                                </div>
                                <?php endif; ?>
                                <div class="card" style="border:none;background:#f8f8f8">

                                    <div class="card-body">
                                        <form action="<?php echo e(route('employee.update',['employee_id' => $employee -> id])); ?>"
                                            method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row form-group" style="padding-left:20px;">
                                                <div class="col-lg-3">
                                                    <div class="card shadow-sm">
                                                        <div class="card-body">
                                                            <div class="col-md-4">
                                                                <img class="rounded-circle mx-auto"
                                                                    src="<?php echo e(URL :: to($employee -> employee_photo)); ?>"
                                                                    alt=""
                                                                    style="height: 150px; width: 150px; border: 2px #ccc solid"
                                                                    id="user_photo">
                                                            </div>

                                                            <div class="col-md-2">

                                                                <input type="file" id="file_upload_photo" hidden
                                                                    name="file_upload_photo">
                                                                <?php if($errors -> has('user_photo')): ?>
                                                                <small><?php echo e($errors -> first('file_upload_photo')); ?></small>
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="row justify-content-center"
                                                                style="padding-top:10px;">
                                                                <a href="#" class="btn btn-primary"
                                                                    id="file_upload_button">
                                                                    Chnage Photo</a>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="card shadow-sm">
                                                        <div class="card-body">
                                                            <div class="row  justify-content-start">
                                                                <div class="col-md-6">
                                                                    <label>Name:<span
                                                                            class="text-danger">*</span></label>
                                                                </div>

                                                            </div>
                                                            <div class="row form-group justify-content-center">

                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="<?php echo e(old('name',$employee -> name)); ?>">
                                                                    <?php if($errors -> has('name')): ?>
                                                                    <small><?php echo e($errors -> first('name')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>


                                                            <div class="row  justify-content-center">

                                                                <div class="col-md-6">
                                                                    <label>Email Address<span
                                                                            class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Mobile No<span
                                                                            class="text-danger">*</span></label>
                                                                </div>


                                                            </div>

                                                            <div class="row form-group justify-content-center">

                                                                <div class="col-md-6">
                                                                    <input type="email" class="form-control"
                                                                        name="email"
                                                                        value="<?php echo e(old('email',$employee -> email)); ?>">
                                                                    <?php if($errors -> has('email')): ?>
                                                                    <small><?php echo e($errors -> first('email')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                        name="mobile_no"
                                                                        value="<?php echo e(old('mobile_no',$employee -> mobile_no)); ?>">
                                                                    <?php if($errors -> has('mobile_no')): ?>
                                                                    <small><?php echo e($errors -> first('mobile_no')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>


                                                            <div class="row  justify-content-center">


                                                                <div class="col-md-6">
                                                                    <label>Designation<span
                                                                            class="text-danger">*</span>
                                                                        </label>
                                                                </div>



                                                                <div class="col-md-6">
                                                                    <label>Joining Date<span
                                                                            class="text-danger">*</span></label>
                                                                </div>

                                                            </div>
                                                            <div class="row form-group justify-content-center">


                                                                <div class="col-md-6">
                                                                    <select class="form-control" name="designation">

                                                                        <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($employee -> designation_id == $designation
                                                                        -> id): ?>
                                                                        <option value="<?php echo e($designation -> id); ?>"
                                                                            selected>
                                                                            <?php echo e($designation -> name); ?></option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo e($designation -> id); ?>">
                                                                            <?php echo e($designation -> name); ?></option>
                                                                        <?php endif; ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>




                                                                <div class="col-md-6">
                                                                    <input type="date" class="form-control"
                                                                        name="join_date"
                                                                        value="<?php echo e(old('join_date',$employee -> joining_date)); ?>">
                                                                    <?php if($errors -> has('join_date')): ?>
                                                                    <small><?php echo e($errors -> first('join_date')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>


                                                            <div class="row  justify-content-center">

                                                                <div class="col-md-6">
                                                                    <label>Password<span
                                                                            class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Confirm Password<span
                                                                            class="text-danger">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group justify-content-center">

                                                                <div class="col-md-6">
                                                                    <input type="password" class="form-control"
                                                                        name="password">
                                                                    <?php if($errors -> has('password')): ?>
                                                                    <small><?php echo e($errors -> first('password')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="password" class="form-control"
                                                                        name="confirm_password">
                                                                    <?php if($errors -> has('confirm_password')): ?>
                                                                    <small><?php echo e($errors -> first('confirm_password')); ?></small>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-lg-3">
                                                                    <h6>Department : </h6>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <select class="form-control" name="department">

                                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($employee -> department_id == $department
                                                                        -> id): ?>
                                                                        <option value="<?php echo e($department -> id); ?>"
                                                                            selected>
                                                                            <?php echo e($department -> name); ?></option>
                                                                        <?php else: ?>
                                                                        <option value="<?php echo e($department -> id); ?>">
                                                                            <?php echo e($department -> name); ?></option>
                                                                        <?php endif; ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                                  <hr>



                                                            <div class="row form-group justify-content-center">
                                                                <div class="col-md-3">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start salary nav -->

                    <div class="tab-pane fade" id="nav-salary" role="tabpanel" aria-labelledby="nav-salary-tab">

                        <div class="row form-group">

                            <div class="col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-header text-center f-100 font-bold text-black">
                                        <h4>Pay Slips</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm table-striped f-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Generate Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <tbody>
                                                <?php $sl = 0;
                                              
                                              $payslips=App\Models\SalaryGenerate::where('generated_by',$employee->user_id)->get();
                                                ?>
                                                <?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $generate_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php

                                                $sl++;
                                                ?>
                                               
                                             
                                                
                                           
                                                
                                                <tr class="text-center">
                                                    <td> <?php echo e($sl); ?></td>
                                                    <td><?php echo e($generate_info -> year); ?></td>
                                                    <td><?php echo e($generate_info -> month); ?></td>
                                                    <td><?php echo e($generate_info -> generate_date); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('download-payslip',['generate_id' => $generate_info -> id])); ?>"
                                                            class="btn btn-danger"><i class="fa fa-download"></i></a>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Gratuity start -->

                    <?php
                         $retird=App\Models\GratuityUser::select('retd_date')->where('employee_id',$employee->user_id)->first();
                    ?>
                  
                    <?php
                        $employeedetails=App\Models\Employee::where('user_id',$employee->user_id)->first();
                        $datework=\Carbon\Carbon::createFromDate($employeedetails->joining_date);
                        if($retird)
                         {
                            $testdate=$datework->diffInYears($retird->retd_date);
                        
                         }
                         else
                          {
                            $testdate=0;
                         }
                        
                       
                        

                    ?>
                  
                    <?php
                        $now=\Carbon\Carbon::now();
                       //dd($testdate);
                        $testdate2=$datework->diffInYears($now);
                       
                    ?>

                     
                     <?php if($testdate==$testdate2): ?>

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
                                                <?php $sl = 0;
                                                $total=0;
                                              
                                              $payslips=App\Models\Gratuity::where('employee_id',$employee->user_id)->get();
                                              
                                                ?>
                                                <?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $generate_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php

                                                $sl++;
                                                $employee_name=App\Models\Employee::where('user_id',$generate_info->employee_id)->first();
                                                ?>
                                               
                                             
                                                
                                                
                                                
                                                <tr class="text-center">
                                                    <td> <?php echo e($sl); ?></td>
                                                    <td><?php echo e($employee_name->name); ?></td>
                                                    <td><?php echo e($generate_info -> year); ?></td>
                                                    <td><?php echo e($generate_info -> month); ?></td>
                                                    <td><?php echo e($total=$total+$generate_info -> contribution); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('gaturity_download',['generate_id' => $employee->user_id])); ?>"
                                                            class="btn btn-danger"><i class="fa fa-download"></i></a>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php else: ?>

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
                                                <?php $sl = 0;
                                              
                                              $payslips=App\Models\Gratuity::where('employee_id',$employee->user_id)->get();
                                                ?>
                                                <?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $generate_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php

                                                $sl++;
                                                $employee_name=App\Models\Employee::where('user_id',$generate_info->employee_id)->first();
                                                ?>
                                               
                                             
                                                
                                                
                                                
                                                <tr class="text-center">
                                                    <td> <?php echo e($sl); ?></td>
                                                    <td><?php echo e($employee_name->name); ?></td>
                                                    <td><?php echo e($generate_info -> year); ?></td>
                                                    <td><?php echo e($generate_info -> month); ?></td>
                                                    <td><?php echo e($generate_info -> contribution); ?></td>
                                                   
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                         
                     <?php endif; ?>

                    

                   

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
                                                        value=<?php echo e($interest_rate -> interest_rate); ?> required>
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
                                        <?php $loan_info = $employee -> hasLoan; ?>
                                        <?php if( $loan_info== null): ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6>No results found</h6>
                                            </div>
                                        </div>
                                        <?php else: ?>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Reference No.</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label><?php echo e($loan_info -> loan_ref_no); ?></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Base Amount </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($loan_info -> base_amount); ?></label>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Total Amount </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($loan_info -> total_amount); ?></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>EMI Amount</h6>
                                            </div>
                                            <div class="col-lg-9">
                                                <label><?php echo e($loan_info -> emi_amount); ?></label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Tenure Years </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($loan_info -> tenure_year); ?> Years</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6> Interest Rate </h6>
                                            </div>
                                            <div class="col-lg-3">
                                                <label><?php echo e($loan_info -> interest_rate); ?> %</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6>Current Status </h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <?php if($loan_info -> status == 1): ?>
                                                Pending
                                                <?php elseif($loan_info -> status == 0): ?>
                                                Not Approved
                                                <?php elseif($loan_info -> status == 2): ?>
                                                Approved
                                                <?php else: ?>
                                                Pending Approval
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($loan_info && $loan_info -> status == 2): ?>
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
                                                    <?php $total_amount = $loan_info -> total_amount; ?>
                                                    <?php $__currentLoopData = $loan_info -> details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?php echo e($detail -> year); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> month); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> emi_amount); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> pay_date); ?>

                                                        </td>
                                                        <td><?php echo e($total_amount - $detail -> emi_amount); ?></td>
                                                        <?php $total_amount -= $detail -> emi_amount; ?>
                                                    </tr>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Provident fund tab starts here -->
                    
                    <div class="tab-pane fade" id="nav-provident-fund" role="tabpanel" aria-labelledby="nav-loan-tab">

                        <div class="row form-group">
                            <div class="col-md-3">
                                
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
                                                      <?php $__currentLoopData = $employee -> previousPFContributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class = "text-center">
                                                            <td><?php echo e(date('Y-m-d',strtotime($contribution -> date ))); ?></td>
                                                            <td><?php echo e($contribution -> month); ?></td>
                                                            <td><?php echo e($contribution -> year); ?></td>
                                                            <td><?php echo e((10/100)*$employee -> payscale); ?></td>
                                                            <td><?php echo e((8.33/100)*$employee -> payscale); ?></td>
                                                            <!--<td><?php echo e((10/100)*$contribution -> pf_amount); ?></td>
                                                            <td><?php echo e((8.33/100)*$contribution -> pf_amount); ?></td>-->
                                                        </tr>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($loan_info && $loan_info -> status == 2): ?>
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
                                                    <?php $total_amount = $loan_info -> total_amount; ?>
                                                    <?php $__currentLoopData = $loan_info -> details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?php echo e($detail -> year); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> month); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> emi_amount); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($detail -> pay_date); ?>

                                                        </td>
                                                        <td><?php echo e($total_amount - $detail -> emi_amount); ?></td>
                                                        <?php $total_amount -= $detail -> emi_amount; ?>
                                                    </tr>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('js'); ?>
        <script>
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

            $('#loan_application').submit(function(e) {
                e.preventDefault();
                var EMI = $('#emi').val();
                var P = $('#loan_amount').val();
                var R = $('#interest_rate').val();
                var ref_no = "<?php echo e('Loan-'.str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT)); ?>";
                var payable_amount = $('#total_payable').val();

                var N = $('#tenure_year').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': "<?php echo e(csrf_token()); ?>"
                    }
                })
                $.ajax({
                    url: "<?php echo e(route('house-loan.save')); ?>",
                    type: "post",
                    data: {
                        EMI: EMI,
                        P: P,
                        R: R,
                        ref_no: ref_no,
                        payable_amount: payable_amount,
                        N: N
                    },
                    success: function(response) {
                        alert(response);

                    }
                })
            });
        })
</script>
<script>
   $('#provident_loan').submit(function(e){
       e.preventDefault();
       $.ajaxSetup({
           headers:
           {
               'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
           }
       });
       $.ajax({
           url : "<?php echo e(route('admin.pf-loan.store')); ?>",
           type : "post",
           data:
           {
               user_id : "<?php echo e(Auth :: user() -> id); ?>",
               date : $('#loan_date').val(),
               loan_amount : $('#loan_amount_provident').val()
           },
           success:function(response)
           {
               toastr.success('Application submitted successfully');
               $('#provident_loan')[0].reset();
           }
       })
   })

   $('#calculate_pf_btn').click(function(){

        const basic_salary = "<?php echo e($salary_amount); ?>";
        const pf_rate = $('#pf_contribution_rate').val();
        const contribution_amount = Math.ceil((basic_salary * pf_rate) / 100.00);
        $('#self_contribution').val(contribution_amount);
        $('#company_contribution').val(contribution_amount);
   });

   $('#pf_contribution_settings_form').on('submit',function(e){

     e.preventDefault();
     const Data = new FormData($(this)[0]);
     $.ajaxSetup({
         headers:
         {
             'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
         }
     });

     $.ajax({
         url : "<?php echo e(route('admin.pf-contribution.rate.update')); ?>",
         type : "post",
         data : Data,
         processData : false,
         contentType : false,
         succcess:function()
         {

         }
     }).done(function(){

            toastr.success('Updated successfully');
       });
   })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\mgmclac.rajbilling.com\resources\views/frontend/profile.blade.php ENDPATH**/ ?>