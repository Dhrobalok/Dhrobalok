

<div class="col-md-8 border shadow p-4">




    <table>

        <thead>


            <tr>

                <?php $__currentLoopData = $survey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                <?php
                    $questionName=App\Models\question::where('id',$value->q_id)->first();
                ?>
                <th><?php echo e($questionName->name); ?></th>




                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>

        </thead>



        <tbody>




          <tr>



            <?php $__currentLoopData = $survey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allsurve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <th><?php echo e($allsurve->value); ?></th>



                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







            </tr>




        </tbody>




    </table>




 </div>

<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/Individual.blade.php ENDPATH**/ ?>