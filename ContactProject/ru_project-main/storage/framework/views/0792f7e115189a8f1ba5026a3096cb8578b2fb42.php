
<?php $__env->startSection('content'); ?>
<div class="content">


    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default mb-4">
            <h3 class="block-title">Upadte Category Information</h3>
            
        </div>
        <?php if($allinformation): ?>

         <form  action="<?php echo e(url('update.category',$allinformation->id)); ?>" method="post"> 
            <?php echo csrf_field(); ?>
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Office Name<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    
                    <input type = "text" class="form-control" id="name" name="officename" value = "<?php echo e($allinformation->officename); ?>" >
                    
                </div>
            </div>
            

            <?php
            $categoryname=App\Models\Categor::where('id',$allinformation->category_id)->first()
           ?>
           
               
         

<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Type<span class = "text-danger">*</span></label>
    </div>
    <div class="col-md-8">
         <input type="hidden" name="category_id" value="<?php echo e($allinformation->category_id); ?>">
        <input type = "text" class="form-control" id="name" name="type" value = "<?php echo e($categoryname->category_name); ?>" >
        
    </div>
</div>

<div class="row form-group justify-content-center">
    <div class="col-md-3">
        <label>Office No<span class = "text-danger">*</span></label>
    </div>
    <div class="col-md-8">
        <input type = "text" class="form-control" id="name" name="officeno" value = "<?php echo e($allinformation->officeno); ?>" >
    </div>
</div>

            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>CellNo<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type = "text" class="form-control" id="name" name="cellnum" value = "<?php echo e($allinformation->cell_no); ?>" >
                </div>
            </div>
            
            <div class="row form-group justify-content-center">
                <div class="col-md-3">
                    <label>Email<span class = "text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="general_code" name="email" value = "<?php echo e($allinformation->email); ?>" >
                   
                </div>
            </div>
           
           

            <div class="row form-group justify-content-center">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                </div>
                <div class="col-md-5">

                </div>
            </div>
            <?php endif; ?>
        </form>
    </div>
    <!-- END Dynamic Table Full -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/category/edit.blade.php ENDPATH**/ ?>