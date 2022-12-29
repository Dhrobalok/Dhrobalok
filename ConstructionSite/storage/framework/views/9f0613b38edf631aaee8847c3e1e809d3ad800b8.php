   <?php $__env->startSection('content'); ?>

   <style>
    .btn-sm {
    padding: 6.25rem -19 !important;
    font-size: .675rem !important;
    5rem: ;
    line-height: 1.5;
    border-radius: 0.2rem;
}
   </style>

      <div class="card shadow">
          <div class="card-body">

            <?php
                $alllist=App\Models\Logo::get();
            ?>

            <p align="right"><a href="<?php echo e(url('LogoAdvertise')); ?>" class="btn btn-sm btn-primary"><span style="font-size: 14px;">Upload&nbsp;Logo</span></a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Logo</span></th>


                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                        ?>

                        <?php $__currentLoopData = $alllist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <?php if($logo->company_id != Null): ?>

                           <?php
                               $company=App\Models\Compane::where('id',$logo->company_id)->first();
                           ?>

                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($company->name); ?></td>
                            <td class="text-center">
                                <img  src = "<?php echo e(URL :: to($company -> logo)); ?>" height = "70px" width = "70px">
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(url('edit.logo',$logo->id)); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="<?php echo e(url('delete.logo',$logo->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>

                         <?php else: ?>

                         <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($logo->company_name); ?></td>
                            <td class="text-center">
                                <img  src = "<?php echo e(URL :: to($logo -> logo)); ?>" height = "70px" width = "70px">
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(url('edit.logo',$logo->id)); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="<?php echo e(url('delete.logo',$logo->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>



                        <?php endif; ?>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/LogoIndex.blade.php ENDPATH**/ ?>