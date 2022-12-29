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

a
{
    text-decoration: none !important;

}
</style>




<?php if( Session::has("delete") ): ?>
<script>
   Swal.fire({
     icon: 'success',
     title: 'Student Delete !',

     })

</script>


<?php endif; ?>





  <div class="card shadow p-4">

     <div class="card-header w-100">
          <p align="right" class="p-0 m-0">
             <a href="<?php echo e(url('/upload')); ?>" class="btn btn-sm btn-success">
                Student&nbsp;Upload

            </a>

           <a href="<?php echo e(url('csv.download')); ?>" class="btn btn-sm btn-success"><i class="fas fa-download" style="color:rgb(232, 218, 244);"></i>&nbsp;Format</a>


          </p>

     </div>

     <div class="table-responsive mt-3">
        <table class="table table-hover"  id="myTable">

            <thead>
               <th class="text-center">Id</th>
               <th class="text-center">Student Id</th>
               <th class="text-center"></th>
            </thead>


            <tbody>
               <?php
                   $allstduent=App\Models\Student::get();
                   $i=1;
               ?>
               <?php $__currentLoopData = $allstduent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <tr>
                   <td class="text-center"><?php echo e($i++); ?></td>
                   <td class="text-center"><?php echo e($studentall->studentid); ?></td>

                   <td class="text-center">

                    <a  href="<?php echo e(url('delete.student',$studentall->id)); ?>" style="font-size:12px;" class="btn btn-sm btn-danger py-1" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>

                   </td>
               </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
   </div>




  </div>



</table>










<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/StudentList.blade.php ENDPATH**/ ?>