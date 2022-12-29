   <?php $__env->startSection('content'); ?>

   <style>
    .btn-sm {
    padding: 5.25rem -19 !important;
    font-size: .675rem !important;

    line-height: 1.5;
    border-radius: 0.2rem;
}
   </style>

      <div class="card shadow">
          <div class="card-body">

            <?php
                $alllist=App\Models\Footer::get();
            ?>


            <p align="right"><a href="<?php echo e(url('Addfooter')); ?>" class="btn btn-sm btn-primary"><span style="font-size: 14px;">Add&nbsp;Footer&nbsp;Link</span></a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Service</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Usefull&nbsp;Link&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Useful&nbsp;Link</span></th>



                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $i=1;
                    ?>

                    <?php $__currentLoopData = $alllist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($i++); ?></td>

                        <td><?php echo e($logo->name); ?></td>

                        <td>
                           <?php echo e($logo->service); ?>

                        </td>

                         <td>
                            <?php echo e($logo->linkname); ?>

                         </td>

                         <td>
                            <?php echo e($logo->link); ?>

                         </td>

                        <td>

                            <div class="d-flex">


                                <a href="<?php echo e(url('delete.footer',$logo->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times"></i></a>


                            </div>



                        </td>
                     </tr>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/footerLink.blade.php ENDPATH**/ ?>