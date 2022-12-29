
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
                <img src="<?php echo e(asset('public/company_pic/ru-logo.png')); ?>" alt="">
            </p>
       </div>

       <div class="col-md-12">
           <p style="text-align:center;font-weight:bold;font-size:16px;">Category Information</p>

       </div>

       <div class="col-md-12">
        

      </div>

      <div class="block-content block-content-full">
        <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                    <th class="d-none d-sm-table-cell text-center">Office Name</th>
                    <th class="d-none d-sm-table-cell text-center">Office No</th>
                    <th class="d-none d-sm-table-cell text-center">Type</th>
                    <th class="d-none d-sm-table-cell text-center">Cell.No</th>
                    <th class="d-none d-sm-table-cell text-center">Email</th>
                    
                    
                </tr>
            </thead>
            <?php if($allinformation): ?>
            <?php
                $i=1
            ?>
            
                <?php
                    $categoryname=App\Models\Categor::where('id',$allinformation->category_id)->first()
                ?>
            
           
                
           
            <tbody>
                <tr>
                    <td class="text-center"><?php echo e($i++); ?></td>
                    <td class="text-center"><?php echo e($allinformation->officename); ?></td>
                    <td class="text-center"><?php echo e($allinformation->officeno); ?></td>
                    <td class="text-center"><?php echo e($categoryname->category_name); ?></td>
                    <td class="text-center"><?php echo e($allinformation->cell_no); ?></td>
                    <td class="text-center"><?php echo e($allinformation->email); ?></td>

                </tr>
            </tbody>
            <?php endif; ?>
            
            </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/category/view.blade.php ENDPATH**/ ?>