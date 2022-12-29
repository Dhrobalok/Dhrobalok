  <?php $__env->startSection('content'); ?>
  <style>
        #myTable th
        {
            color:rgb(250, 235, 235);
font-size:14px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(133, 127, 120)
        }
</style>


  <div class="card shadow p-4 mt-4">
    <div class="table-responsive mt-4 py-2">

    <table class="table table-hover" id="myTable">

        <thead>

                <th>StudentId</th>
                <th>Name</th>

                <th>Batch</th>
                <th>TeacherName</th>
                <th>SelectSurvey</th>




        </thead>

        <tbody>
            <?php
                $i=1;
            ?>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>


                <td>
                    <?php echo e($users->studentId); ?>


                </td>
                <td><?php echo e(ucwords($users->firstname)); ?><?php echo e(ucwords($users->lastname)); ?></td>
                <td><?php echo e($users->batch); ?></td>


                <?php
                  $item=App\Models\Teacher::where('id',$users->supervisor)->first();
                ?>
                <?php if($item): ?>

                   <td>
                       <?php echo e($item->name); ?>

                  </td>

                  <?php else: ?>
                  <td>N/a</td>

                <?php endif; ?>




                <td class="text-center">

                    <div class="d-flex gap-1" style="width:100% !important">
                        <a href="<?php echo e(url('Admin.Teachersurveyprint',$users->studentId)); ?>" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                    </div>

                    

                 </td>



            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>


      </table>

   </div>


</div>



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Dashboard/TeacherStudent.blade.php ENDPATH**/ ?>