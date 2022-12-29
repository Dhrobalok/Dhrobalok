
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
           <p style="text-align:center;font-weight:bold;font-size:16px;">All Category</p>

       </div>

       <div class="col-md-12">
        <p style="float:left;font-weight:bold;font-size:16px;"><a href="<?php echo e(url('categorycreate')); ?>">New Category</a></p>

      </div>
    </div>


<div class="block-content block-content-full">
    <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="d-none d-sm-table-cell text-center">Sl.no</th>
                <th class="d-none d-sm-table-cell text-center">Category Name</th>
                <th class="d-none d-sm-table-cell text-center">Action</th>
                
                
            </tr>
        </thead>
        <?php
        $i=1;
        ?>
        <?php $__currentLoopData = $categoryall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
           
                
            
            <tr>
              
                
                <td class="text-center"><?php echo e($i++); ?></td>
                <td class="text-center"><?php echo e($category->category_name); ?></td>
                <?php
                $employee_id=Session::get('employeeid');
            
                $permission=App\Models\Permission::where('employee_id',$employee_id)->get();
                $id=Session::get('rollno'); 
                $status=App\Models\User::where('id',$id)->first();
                $id=Session::get('rollno'); 
     
                ?>
                
                <?php if($id==2): ?>

                  <td>
                    <a href="<?php echo e(url('view.category',$category->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="<?php echo e(url('edit.category',$category->id)); ?>"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo e(url('delete.category',$category->id)); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                    
                <?php endif; ?>
               
                <td class="text-center">
                    
                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($permission_id->permission_Id==1): ?>
                    <a href="<?php echo e(url('view.category',$category->id)); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        
                    <?php endif; ?>

                    <?php if($permission_id->permission_Id==2): ?>
                    <a href="<?php echo e(url('edit.category',$category->id)); ?>"><i class="fas fa-edit"></i></a>
                        
                    <?php endif; ?>

                    

                    <?php if($permission_id->permission_Id==4): ?>
                    <a href="<?php echo e(url('delete.category',$category->id)); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        
                    <?php endif; ?>
                
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                
                    
                
               
            </tr>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    </div>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\Ru_emergency_contact\resources\views/backend/admin/category/index.blade.php ENDPATH**/ ?>