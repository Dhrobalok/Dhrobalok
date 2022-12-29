
<?php
    $name=App\Models\Item::where('id',$iteam_id)->first();
?>
<h2><?php echo e($name->name); ?>&nbsp;Report</h2>

<table>

    <thead>
        <tr>
            <th>Survey&nbsp;Id</th>
            <?php $__currentLoopData = $questionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <th><?php echo e(ucwords($name->name)); ?></th>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </tr>

    </thead>



    <tbody>

        <?php $__currentLoopData = $userId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allsurve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

           <?php
               $SurveyId=App\Models\Survetotal::select('servey_id')->where('user_id',$allsurve->user_id)

               ->where('item_id',$iteam_id)
               ->get();
           ?>

             <?php $__currentLoopData = $SurveyId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Surveyids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


             <tr>

                <td>
                    <?php echo e($Surveyids->servey_id); ?>


                </td>






                 <?php $__currentLoopData = $questionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allquestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                  <?php
                    $surveInform=App\Models\Surve::where('surve_id',$Surveyids->servey_id)
                    ->where('user_id',$allsurve->user_id)
                    ->where('q_id',$allquestion->id)
                    ->first();
                  ?>






                 <?php if($surveInform): ?>

                            <?php if($allquestion->type==2): ?>


                                <td>

                                    <a href="<?php echo e(route('file.download',$surveInform->id)); ?>"><i class="fas fa-download">&nbsp;Download</i></a>


                                </td>


                             <?php else: ?>


                             <td>

                                <p href="" class="update" data-name="name" data-type="text" data-pk="<?php echo e($surveInform->id); ?>" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);"><?php echo e($surveInform->value); ?>

                                </p>



                             </td>


                            <?php endif; ?>





                 <?php else: ?>


                 <td>

                    N/A
                </td>



                 <?php endif; ?>










                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






              </tr>

             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </tbody>

</table>
<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/print.blade.php ENDPATH**/ ?>