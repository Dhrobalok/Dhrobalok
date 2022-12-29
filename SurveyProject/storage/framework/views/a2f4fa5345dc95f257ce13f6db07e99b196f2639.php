<?php $__env->startSection('content'); ?>


<style>
    .card
    {
        width: 100%;
    }

    .form-control-sm {
    min-height: calc(1.5em + 0.7rem + 2px);
    padding: 0.2rem 0.9rem !important;
    font-size: 1.0rem !important;
    border-radius: 0.35rem !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}

/*   model   */



</style>

     <div class="card shadow" style="background-color: aliceblue;">

          <div class="card-body">
            <?php if($name): ?>
            <div class="border text-center" style="width: 100%; height:auto; background-color:rgb(220, 238, 254);">
                <p class="mt-3" style="color: #33444a;font-size:17px;"><?php echo e(ucwords($name->name)); ?> <span>Information</span></p>
               </div>

            <?php endif; ?>


            <?php if( Session::has("Update") ): ?>
            <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Update Successfully',

                  })

             </script>



           <?php endif; ?>


            <?php if( Session::has("delete") ): ?>
            <script>
               Swal.fire({
                 icon: 'success',
                 title: 'Survey Delete Successfully',

                 })

            </script>



           <?php endif; ?>




              <div class="table-responsive mt-4 p-3">
                <table class="table table-hover"  id="myTable">

                    <thead style="background-color:#6b787f;">
                        <tr>
                            <th style="color: rgb(253, 243, 228);">Survey&nbsp;Id</th>
                            <?php $__currentLoopData = $questionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <th style="color: rgb(253, 243, 228);"><?php echo e(ucwords($name->name)); ?></th>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <th style="color: rgb(253, 243, 228);">
                                Action
                             </th>


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


                                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                                <p href="" class="update" data-name="name" data-type="text" data-pk="<?php echo e($surveInform->id); ?>" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);"><?php echo e($surveInform->value); ?>

                                                </p>



                                             </td>


                                            <?php endif; ?>





                                 <?php else: ?>


                                 <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                    N/A
                                </td>



                                 <?php endif; ?>










                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                  <td>
                                    <div class="d-flex gap-1" style="width:100% !important">

                                        
                                        
                                        
                                        <a href="<?php echo e(url('Admin.surveyprint',$Surveyids->servey_id)); ?>" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                                        <a  href="<?php echo e(url('Admin.survey.delete',$Surveyids->servey_id)); ?>" style="font-size:12px;" class="btn btn-sm btn-danger py-2" onclick="return confirm('Are you sure?')"><i class="fas fa-trash" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>
                                       </div>
                                    </td>




                              </tr>

                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </tbody>

                </table>

              </div>

          </div>

     </div>

     <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/viewSurve.blade.php ENDPATH**/ ?>