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



        <?php if( Session::has("approve") ): ?>
        <script>
            Swal.fire({
              icon: 'success',
              title: 'Approved Successfully',

              })

         </script>



        <?php endif; ?>


        <?php if( Session::has("delete") ): ?>
        <script>
           Swal.fire({
             icon: 'success',
             title: 'User Deleted',

             })


        </script>
        <?php endif; ?>

               <div class="card shadow mt-4 p-4">
                <div class="table-responsive mt-4 py-2">

                <table class="table table-hover" id="myTable">

                    <thead>

                            <th>StudentId</th>
                            <th>Name</th>

                            <th>Batch</th>
                            <th>Status</th>
                            <th>Survey&nbsp;Allocation</th>
                            <th></th>


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
                            <td><?php echo e(ucwords($users->firstname)); ?><?php echo e(ucwords($users->Haque)); ?></td>
                            <td><?php echo e($users->batch); ?></td>

                            <?php if($users->status==1): ?>
                            <td >

                                <span class="badge badge-success" style="font-size: 15px;">Active</span>

                            </td>

                            <?php else: ?>
                             <td>

                                <span class="badge badge-danger" style="font-size: 15px;">Inactive</span>


                             </td>



                            <?php endif; ?>

                            <?php
                              $item=App\Models\Copyitm::where('user_id',$users->studentId)->first();
                            ?>
                            <?php if($item): ?>
                              <?php
                                  $itemName=App\Models\Item::where('id',$item->item_id)->first();
                              ?>
                               <td>
                                   <?php echo e($itemName->name); ?>

                              </td>

                              <?php else: ?>
                              <td>N/a</td>

                            <?php endif; ?>




                            <td class="text-center">

                                <div class="d-flex gap-1" style="width:100% !important">
                                    <a href="<?php echo e(url('useraprove',$users->id)); ?>"> <button type="button" class="btn btn-primary btn-sm p-1 m-0"> <i class="fa fa-plus">&nbsp;Active</i></button></a>

                                    <a href="<?php echo e(url('user.delete',$users->id)); ?>"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-ban" aria-hidden="true">&nbsp;Inactive</i></button></a>
                                    <a href="<?php echo e(url('SurveyAllocation',$users->studentId)); ?>"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-tasks" aria-hidden="true">&nbsp;Survey&nbsp;Allocation</i></button></a>
                                    <a href="<?php echo e(url('Edit.Survey',$users->studentId)); ?>"><button type="button" class="btn btn-danger btn-sm p-1 m-0"><i class="fa fa-edit" aria-hidden="true">&nbsp;Edit&nbsp;Survey</i></button></a>
                                </div>

                                

                             </td>



                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>


                  </table>

               </div>


        </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>






<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Dashboard/ApproveUser.blade.php ENDPATH**/ ?>