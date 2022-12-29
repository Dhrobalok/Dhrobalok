

 <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>


 <?php if($questions->type==1): ?>
    <?php
       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

    ?>
    <input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">

     <td><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>

       

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
         <input type= "text" class="form-control"  name="Q_value[]" required>
       </td>



       


     <td>
         <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



 <?php elseif($questions->type==2): ?>
   <?php
    $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

    ?>

   <input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">

     <td><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>
     

     <td>
         <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
         <input type= "file" class="form-control"  name="file[]">
     </td>


     


     <td>
         <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>


 <?php elseif($questions->type==3): ?>

   <?php
       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

     ?>

<input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">

     <td><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>



     <td>
         <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
         <input type= "date" class="form-control"  name="Q_value[]"   required>
     </td>



     <td>
         <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



 <?php elseif($questions->type==4): ?>

     <?php
        $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

      ?>

<input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">
     <td><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>

       

       <td style="width: 100%">
         <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
         <textarea  id="" name="Q_value[]" class="form-control"></textarea>
       </td>


       

     <td>
         <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>


 <?php elseif($questions->type==5): ?>

 <input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">
   <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
      <?php
         // $name=App\Models\question('id',$questions->id)->first();
         $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
         $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$itemId)->first();

      ?>





     <td class="head"><label><?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>


       

       <td style="width: 80%;">

       <?php $__currentLoopData = $questionAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         


          <?php if($question->name): ?>

             <input type="checkbox" name="Q_value[]" value="<?php echo e($question->name); ?>"><span>&nbsp;<?php echo e(ucwords($question->name)); ?></span>


           <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </td>

       <td>
        <a  class="delete"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
      </td>



       <?php elseif($questions->type==6): ?>

 <input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">
   <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
      <?php
         // $name=App\Models\question('id',$questions->id)->first();
         $questionAll=App\Models\Checkboxe::where('q_id',$questions->id)->get();
         $CheckboxVal=App\Models\Surve::where('q_id',$questions->id)->where('item_id',$itemId)->first();

      ?>





     <td class="head"><label><?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>




       <td style="width: 80%;">

       <?php $__currentLoopData = $questionAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         


          <?php if($question->name): ?>

             <input type="radio" name="Q_value[]" value="<?php echo e($question->name); ?>"><span>&nbsp;<?php echo e(ucwords($question->name)); ?></span>


           <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </td>






     <td>
         <a  class="delete"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>



     <?php elseif($questions->type==7): ?>

   <?php
       $SurveVALUE=App\Models\Surve::where('q_id',$questions->id)->first();

     ?>

<input type="hidden" name="iteam_id" value="<?php echo e($itemId); ?>">

     <td><label>&nbsp;&nbsp;&nbsp;<?php echo e(ucwords($questions->name)); ?><span class = "text-danger"></span></label></td>



     <td>
         <input type="hidden" name="q_id[]" value="<?php echo e($questions->id); ?>">
         <input type= "number" class="form-control"  name="Q_value[]"   required>
     </td>



     <td>
         <a href="javascript:void(0);" class="delete" data-id="<?php echo e($questions->id); ?>"> <i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
     </td>




 <?php endif; ?>
 </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/datarow.blade.php ENDPATH**/ ?>