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

            <p align="right"><a href="<?php echo e(url('Vedio.Upload')); ?>" class="btn btn-sm btn-primary">Upload&nbsp;File</a></p>

              <div class="table-responsive">
                   <table class="table table-sm table-reponsive table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Id</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Company&nbsp;Name</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Vedio</span></th>
                            <th class="d-none d-sm-table-cell text-center"><span style="color:white;">Duration</span></th>


                            <th class="d-none d-sm-table-cell text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                        ?>

                        <?php $__currentLoopData = $vedioFile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vedio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($vedio->name); ?></td>


                                    <td class="text-center">
                                        <video id="my-video" class="video-js vjs-default-skin" controls preload="auto" data-setup='{"inactivityTimeout": 0}' width="160" height="160">
                                            <source src="<?php echo e(URL :: to($vedio -> vedio)); ?>" type='video/mp4'>
                                        </video>
                                    </td>

                            


                            <td class="text-center">
                                <?php echo e($vedio->duration); ?>&nbsp;Seconds
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(url('edit.vedio',$vedio->id)); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                                    <a href="<?php echo e(url('delete.vedio',$vedio->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>


                            </td>
                         </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>

                   </table>

              </div>

          </div>

      </div>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\Reda_Construction\resources\views/backend/admin/aprove/vedioList.blade.php ENDPATH**/ ?>