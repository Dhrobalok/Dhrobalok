
<?php $__env->startSection('content'); ?>
<style>
    img
    {
        width: 90px;
        height: 70px;
       
        background: #fff;
        border-radius: 40px;
        position: relative;
    }
</style>

<div class="card">

    <div class="row">
        <div class="col-md-12">
            
            <p style="font-size:16px; font-weight:bold;text-align:center;">University of Rajshahi</p>
    
    
        </div>
    
            <div class="col-md-12">
                <p style="text-align: center; ">
                    <img src="<?php echo e(asset('company_pic/ru-logo.png')); ?>" alt="">
                </p>
           </div>
    
           <div class="col-md-12">
               <p style="text-align:center;font-weight:bold;font-size:16px;">All Category Information</p>
    
           </div>
 

</div>
<div class="row justify-content-center">
 <div class="block-content block-content-full">
    <div class="table-responsive">

        
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Office Name</th>
                    <th>OfficeType</th>
                    <th>Category Type</th>
                    <th>Cell No</th>
                    

                </tr>
            </thead>

            <tbody>
                <?php
                    $i=1;
                ?>
                <?php $__currentLoopData = $categoryinform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
               
                <?php
                
                    $name=App\Models\Categor::where('id',$inform->category_id)->first();
                ?>
                <tr>
                    <?php if($name): ?>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($inform->officename); ?></td>
                    <td><?php echo e($inform->officeno); ?></td>
                    <td><?php echo e($name->category_name); ?></td>
                    <td><?php echo e($inform->cell_no); ?></td>
                        
                    <?php endif; ?>
                   
                    
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>

    </div>
 </div>

</div>
  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/category/categoryinformation.blade.php ENDPATH**/ ?>