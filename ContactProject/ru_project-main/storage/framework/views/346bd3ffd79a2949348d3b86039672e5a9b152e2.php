

<?php $__env->startSection('content'); ?>


<div class="card">
<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">User Name</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
               
                
            </tr>
        </thead>
        <?php
            $i=1;
        ?>
        <tbody>
            <?php $__currentLoopData = $alluser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               
                <td><?php echo e($i++); ?></td>
                <td><?php echo e($userall->name); ?></td>
                <td><a href="<?php echo e(route('permission',['userid'=>$userall->id])); ?>">permission</a></td>
                    
            
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/roles/create.blade.php ENDPATH**/ ?>