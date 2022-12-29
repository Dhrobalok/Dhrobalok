
<?php $__env->startSection('content'); ?>
<style>
    /* * {
  box-sizing: border-box;
} */

.zoom {
  padding: 50px;
  /* background-color: green; */
  transition: transform .2s;
  width: 150px;
  height: 150px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(3.5); /* IE 9 */
  -webkit-transform: scale(3.5); /* Safari 3-8 */
  transform: scale(3.5); 
}
</style>

<div class="card">


<div class="card-body">
    <div class="table-responsive">

    
    <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
        <thead class="bg-info">
            <tr class="text-white">

                <th class="d-none d-sm-table-cell text-center">Id</th>
                <th class="d-none d-sm-table-cell text-center">Name</th>
               
                
                <th class="d-none d-sm-table-cell text-center">Status</th>
                
                <th class="d-none d-sm-table-cell text-center">Payslip</th>
                <th class="d-none d-sm-table-cell text-center"></th>
            </tr>
        </thead>
           
        <tbody>
            <?php
                $i=1;
            ?>
            <?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allpayslips): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $users=App\Models\User::find($allpayslips->employee_id)->name;
            ?>

            <tr>
                <?php if($users): ?>
                    
                 <td><?php echo e($i++); ?></td>
                <td><?php echo e(ucwords($users)); ?></td>
                
               <?php if($allpayslips->status==1): ?>
               <td ><span class="badge badge-success">Active</span></td>
               <?php elseif($allpayslips->status==0): ?>
               <td><span class="badge badge-danger">InActive</span></td>
                <?php endif; ?>
                
                <td><img class="zoom" src = "<?php echo e(URL :: to($allpayslips -> payslip)); ?>" height = "20px" width = "20px"></td>

                <td class="text-center">
                   <a href="<?php echo e(url('aprovePayslip',$allpayslips->id)); ?>"><button type="button" class="btn btn-primary btn-sm m-2"><i class="fa fa-plus"></i></button></a>
                   <a href="<?php echo e(url('deletePayslip',$allpayslips->id)); ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                            
                   
                </td>
                <?php endif; ?>
            </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

        </tbody>
    </table>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/yearly_renew.blade.php ENDPATH**/ ?>