
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-7 py-2">

        <div class="card">

        
        <div class="card-header py-2">
            <p style="text-align: center;">New Office</p>

        </div>

        <form action="<?php echo e(route('newoffice.add')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="col-md-12 py-2">
                <label>New&nbsp;Office<span class = "text-danger">*</span></label>
            </div>
            <div class="col-md-12">
                
                <input type = "text" class="form-control"  name="deptName" placeholder="Office Name" required>
                
            </div>

            <div class="col-md-7 py-2">
                <label>Office&nbsp;Code<span class = "text-danger">*</span></label>
            </div>
            <div class="col-md-12">
                
                <input type ="text" class="form-control"  name="deptCodeOffice" placeholder="Ofice Code" required>
                
            </div>

              <div class="row justify-content-center py-2">
                <button class="btn btn-primary">Submit</button>

              </div>
        </form>

    </div>
</div>

</div>

<div class="row justify-content-center">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <?php
                $designation=App\Models\Department::get();
            ?>
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                </tr>
            </thead>


            <tbody>
                <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
               
                <tr>
                    <td class="text-center"><?php echo e($all->dbuid); ?></td>
                    <td class="text-center"><?php echo e($all->deptName); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/additional_responsibity/newoffice.blade.php ENDPATH**/ ?>