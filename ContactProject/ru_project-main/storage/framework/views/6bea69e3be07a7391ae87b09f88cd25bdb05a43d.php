
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-10 py-2">
        <div class="card">
            <div class="card-header p-1 ">
                <p  style="text-align: center;font-weight: bold;color:#0665d0;font-size:25px;">
                   
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp;
                    ADDITIONAL&nbsp;RESPONSIBILITY </p>
    
            </div>
    
        </div>

    </div>
 
    <div class="col-md-5">
        <div class="card">
            <div class="card-header" style="background-color:#0665d0;">
                <p style="text-align: center;font-weight: bold;color:white;">From</p>

            </div>

            <?php
               //$office=App\Models\Profile::get();
               $office=DB::table('departments')->select('deptName','deptCodeOffice')->distinct()->orderBy('deptName')->get();
           ?>

            <div class="form-group row justify-content-center py-4">
               

                <div class="col-md-7 py-2">
                   <select name="officename" id="profile_id" class="form-control">

                      <option value="">Select Office Name</option>
                      <?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officeall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($officeall->deptCodeOffice); ?>"><?php echo e($officeall->deptName); ?></option>
                          
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </select>

                    
                </div>

                  
                    


                <div class="col-md-7 py-4">

                    
                   
                    <select name="salaryid" id="salary_id" class="form-control">
                       
                        
                       
                    </select>
 
                     
                </div>

            </div>

            
               

              

            


        </div>

    </div>
    

 <div class="col-md-5 ">
     <div class="card ">
            <div class="card-header" style="background-color:#0665d0;">
              <p style="text-align: center;font-weight: bold;color:white;">To</p>

            </div>
          <div> 
         

            <div class="form-group row justify-content-center py-2">
               
             <form action="<?php echo e(route('profile.save')); ?>" method="post">
                <?php echo csrf_field(); ?>
               

                
                 <div class="row justify-content-center">
                    <div class="col-md-5">
                        <label style="display: flex;">New Office<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <label style="display: flex;">Designation<span class="text-danger">*</span></label>
                    </div>
                    
            
                </div>


                 <div class="row justify-content-center form-group">
                    <div class="col-md-5">
                        <input type="hidden" name="salary_id" id="salaryid">
            
                        <select name="newoffice" id="" class="form-control">
                       
                            <option value="">Select Office Name</option>
                            <?php $__currentLoopData = $office; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $officeall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($officeall->deptCodeOffice); ?>"><?php echo e($officeall->deptName); ?></option>
                          
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                         </select>
      
                     </div>
                     <div class="col-md-5">
                        <?php
                        // $degicnation=App\Models\Profile::get();
                               $degicnation=DB::table('designations')->select('name')->distinct()->orderBy('name')->get();;
                            ?>
                            <select name="degination"  class="form-control">
                                <option value="">Select New Designation</option>
                             
                                 <?php $__currentLoopData = $degicnation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($offices->name); ?>"><?php echo e($offices->name); ?></option> 
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                     </div>
                     
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <label style="display: flex;">From Date<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <label style="display: flex;">To Date<span class="text-danger">*</span></label>
                    </div>
                    
            
                </div>


                 <div class="row justify-content-center form-group">
                    <div class="col-md-5">
            
                        <input id="name" type="date" class="form-control"  name="from"  placeholder="From" required>
                     </div>
                     <div class="col-md-5">
                        <input id="name" type="date" class="form-control" name="to"  required>
      
                     </div>
                     
                </div>

                

                 
                    
                       
                        
                        


                    

                
 
                     
                 </div>

                   <div class="row justify-content-center">
                      <button class="btn btn-primary">submit</button>

                   </div>
              </form>

            </div>

       



        </div>

    </div>

</div>


<div class="row justify-content-center py-2">
    
    <div class="table-responsive">
        

       
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Office ID</th>
                    <th>Full Name</th>
                    <th>Designation</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $addtion=App\Models\Addition::get();
                ?>
                 <?php $__currentLoopData = $addtion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addins): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                   
                        
                   <?php
                         $end=Carbon\Carbon::now();
                    $start=Carbon\Carbon::parse($addins->to);
                    $profilename=App\Models\Profile::where('salaryID',$addins->salary_id)->first();
                   ?> 
                  
                        
                    
                   <td><?php echo e($addins->id); ?></td>
                   <td><?php echo e($addins->officeid); ?></td>
                   <td><?php echo e($profilename->fullNameNew); ?></td>
                   <td><?php echo e($addins->designat); ?></td>
                   <td><?php echo e($addins->from); ?></td>
                   <td><?php echo e($addins->to); ?></td>
                   
                      <?php if($start<=$end): ?>
                      <td>
                          <strong style="color: red;">Inctive</strong>
                      </td>

                      <?php else: ?>
                       <td>
                          <strong style="color: green;">Active</strong>
                       </td>
                          
                      <?php endif; ?>

                      <?php
                       $employee_id=Session::get('employeeid');
                  
                       $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                    
                             $id=Session::get('rollno'); 
                            //  $status=App\Models\User::where('id',$id)->first();

                         
           
                      ?>

                      <?php if($id==2): ?>
                        <td>
                            <a href="<?php echo e(url('extend',$addins->id)); ?>"><button class="btn btn-primary">Extend</button></a>
                            <a href="<?php echo e(url('extend',$addins->id)); ?>"><button class="btn btn-primary">Disable</button></a>
                            <a href="<?php echo e(url('edit',$addins->id)); ?>" style="display:inline-block;"><i class="fas fa-edit" ></i></a>

                        </td>
                     
                          
                      <?php endif; ?>
                      <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                   
                      <?php if($permission_id->permission_Id==2): ?>
                     <td>
                   

                    
                      <a href="<?php echo e(url('extend',$addins->id)); ?>"><button class="btn btn-primary">Extend</button></a>
                      <a href="<?php echo e(url('extend',$addins->id)); ?>"><button class="btn btn-primary">Disable</button></a>
                      <a href="<?php echo e(url('edit',$addins->id)); ?>" style="display:inline-block;"><i class="fas fa-edit" ></i></a>
                   </td>
                   <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </tbody>

        </table>

    </div>

</div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script>
     $('#profile_id').on('change',function(){
        
         
    const profile_id = $(this).val();
    $.ajax({
        url : "<?php echo e(route('profilefind')); ?>",
        type : "get",
        data : { profile_id : profile_id },
        dataType:'json',
        success:function(res)
        {

            
            
         
           var htmloption="<option value=''>--Please select--</option>";
           $.each(res,function(){
                $.each(this,function(k,v){
                    htmloption+="<option value='"+v.salaryID+"'>"+v.fullNameNew+"</option>";
                })
           })

           $('#salary_id').html(htmloption);
           
        
      
        }
    });
})
</script>


<script>
    $('#salary_id').on('change',function(){
       
        
   const profile_id = $(this).val();
 
  
   $.ajax({
       url : "<?php echo e(route('profile.salaryid')); ?>",
       type : "get",
       data : { profile_id : profile_id },
       dataType:'json',
       success:function(res)
       {

        //    alert(res.sortprofile)
        $('#salaryid').val(res.sortprofile);
       
     
       }
   });
})
</script>





    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/additional_responsibity/index.blade.php ENDPATH**/ ?>