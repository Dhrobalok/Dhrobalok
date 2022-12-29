

<div class="col-md-8 border shadow p-4">


     <?php
         $allitem=App\Models\Item::where('user_id',$id)->get();
     ?>

    <table>


        <?php $__currentLoopData = $allitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

           <?php
               $itemname=App\Models\Item::where('id',$itemid->id)->first();
           ?>


                <thead>
                        <?php
                            $questionName=App\Models\question::
                             where('user_id',$itemid->user_id)
                            ->where('iteam_id',$itemid->id)
                            ->get();
                        ?>



                        <tr>
                            <h4 align="center" style="font-weight: bold;"><?php echo e($itemname->name); ?></h4>
                           <br>

                                <?php $__currentLoopData = $questionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($question->name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tr>

                </thead>







        <tbody>

            <?php
                 $survey_id=App\Models\Surve::select('surve_id')
                        ->where('user_id',$itemid->user_id)
                        ->where('item_id',$itemid->id)
                        ->distinct()
                        ->get();
            ?>








            <?php $__currentLoopData = $survey_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>


                 <?php
                         $surveyall=App\Models\Surve::
                          where('user_id',$itemid->user_id)
                          ->where('item_id',$itemid->id)
                          ->where('surve_id',$surveyid->surve_id)

                        ->get();
                 ?>

                 <?php $__currentLoopData = $surveyall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                    $questionID=App\Models\question::
                                    where('id',$surveyvalue->q_id)
                                    ->first();
                            ?>

                            <?php if($questionID): ?>

                               <td><?php echo e($surveyvalue->value); ?></td>

                               <?php else: ?>
                               <td>N/a</td>

                            <?php endif; ?>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



             </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>











        </tbody>



 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




   
            <?php
            $copyitem=App\Models\Copyitm::where('user_id',$id)->get();
            ?>

            <?php if($allitem!=null): ?>
               <?php $__currentLoopData = $copyitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <thead>

                      <?php
                        $Copyquestion=App\Models\Copyquestion::
                         where('user_id',$item->user_id)
                        ->where('item_id',$item->item_id)
                        ->get();
                        ?>

                            <?php
                              $itemname=App\Models\Item::where('id',$item->item_id)->first();
                            ?>

                        <tr>
                            <h4 align="center" style="font-weight: bold;"><?php echo e($itemname->name); ?></h4>
                         <br>

                                <?php $__currentLoopData = $Copyquestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($question->name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tr>


                    </thead>


                    <tbody>


                        <?php
                            $survey_id=App\Models\Surve::select('surve_id')
                                ->where('user_id',$item->user_id)
                                ->where('item_id',$item->item_id)
                                ->distinct()
                                ->get();
                         ?>










                   <?php $__currentLoopData = $survey_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <tr>


                        <?php
                                $surveyall=App\Models\Surve::
                                 where('user_id',$item->user_id)
                                 ->where('item_id',$item->item_id)
                                 ->where('surve_id',$surveyid->surve_id)

                               ->get();
                        ?>



                        <?php $__currentLoopData = $surveyall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                           $questionID=App\Models\Copyquestion::
                                           where('id',$surveyvalue->q_id)
                                           ->first();
                                   ?>

                                   <?php if($questionID): ?>

                                      <td><?php echo e($surveyvalue->value); ?></td>

                                      <?php else: ?>
                                      <td>N/a</td>

                                   <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </tr>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>









                    </tbody>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





            <?php endif; ?>

    



    </table>






 </div>

<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/TeacherSurvey.blade.php ENDPATH**/ ?>