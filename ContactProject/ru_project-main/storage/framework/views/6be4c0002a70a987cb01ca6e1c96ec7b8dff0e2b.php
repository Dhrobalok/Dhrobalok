
<?php $__env->startSection('content'); ?>
<div class="card-body">
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Name</th>
                <th class="d-none d-sm-table-cell text-center">Email</th>
                
                <th class="d-none d-sm-table-cell text-center">Status</th>
                <th class="d-none d-sm-table-cell text-center">Photo</th>
                <th class="d-none d-sm-table-cell text-center"></th>
            </tr>
        </thead>
           
        <tbody>
            <?php $__currentLoopData = $alluser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $users=App\Models\Employee::where('email',$user->email)->first();
            ?>

            <tr>
                <td><?php echo e($users->name); ?></td>
                <td><?php echo e($users->email); ?></td>
               <?php if($user->status==1): ?>
               <td class="text-center"><span class="badge badge-success">Active</span></td>
               <?php elseif($user->status==0): ?>
               <td class="text-center"><span class="badge badge-danger">InActive</span></td>
                <?php endif; ?>
                <td><img src = "<?php echo e(URL :: to($users -> employee_photo)); ?>" height = "50px" width = "50px"></td>
                  

                <?php
                $employee_id=Session::get('employeeid');
            
                $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                $id=Session::get('rollno'); 
     
                ?>
                  
                 <?php if($id==2): ?>
                 <td>
                    <a href="<?php echo e(url('useraprove',$user->id)); ?>"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;
                            
                         
    
             
    
                        
                        <a href="<?php echo e(url('user.delete',$user->id)); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

                 </td>
                     
                 <?php endif; ?>

                <td>
                  
                
                    
                        
                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($permission_id->permission_Id==3): ?>
                        <a href="<?php echo e(url('useraprove',$user->id)); ?>"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;
                            
                         <?php endif; ?>
    
             
    
                        <?php if($permission_id->permission_Id==4): ?>
                        <a href="<?php echo e(url('user.delete',$user->id)); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            
                        <?php endif; ?>
           
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/aprove/index.blade.php ENDPATH**/ ?>