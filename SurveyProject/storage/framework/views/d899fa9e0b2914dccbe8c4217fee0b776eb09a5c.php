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
     title: 'Deleted !',

     })

</script>


<?php endif; ?>


  <div class="card shadow p-4">

     <div class="card-header w-100">
          <p align="right" class="p-0 m-0">
              <a href="#" id = "decline_btn" data-target = "#decline" data-toggle = "modal" style="text-decoration: none;" class="btn btn-sm btn-success">Add&nbsp;Teacher</a>

            </a>


          </p>

     </div>

    <div class="table-responsive mt-3">
        <table class="table table-hover mt-2"  id="myTable">

            <thead>
               <th class="text-center">Id</th>
               <th class="text-center">Supervisor Name</th>
               <th></th>
            </thead>


            <tbody>
               <?php
                   $allstduent=App\Models\Teacher::get();
                   $i=1;
               ?>
               <?php $__currentLoopData = $allstduent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <tr>
                   <td class="text-center"><?php echo e($i++); ?></td>
                   <td class="text-center"><?php echo e($studentall->name); ?></td>

                   <td class="text-center">

                    <a id="ProfileEdit" value=<?php echo e($studentall->id); ?> style="font-size:12px; color:aliceblue;" class="btn btn-sm btn-primary py-1"><i class="fas fa-edit" aria-hidden="true">&nbsp;<span style="font-size:13px;">Edit</span></i></a>

                    <a  href="<?php echo e(url('delete.teacher',$studentall->id)); ?>" style="font-size:12px;" class="btn btn-sm btn-danger py-1" onclick="return confirm('Are you sure?')"><i class="fas fa-times" aria-hidden="true">&nbsp;<span style="font-size:13px;">Delete</span></i></a>

                </td>
               </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>



  </div>


</table>





<!--  Add  Question -->

<div class="modal fade" id="decline" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">



        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction3()">
                <span  aria-hidden="true" style="font-size: 60px;color:rgb(90, 73, 73);float:right">&times;</span>
              </button>



               <div class="container2">

                  <div class="row">
                     <div class="col-md-12">


                        <form id="decline_confirm">
                            <?php echo csrf_field(); ?>

                            <div align="right" >

                                <button type="button" name="add" id="add" class="btn btn-secondary">Add&nbsp;More</button>
                             </div>


                    <table class="table table-bordered mt-2" id="dynamicTable">
                        <tr>

                            <th>Teacher Name</th>

                            <th>Action</th>


                        </tr>
                        <tr>


                            <td>

                                <input type="text" class="form-control" name="name[]" placeholder="Enter Teacher Name">

                            </td>


                                <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                            </tr>
                        </table>


                        <div class="row justify-content-center mb-2">
                            <button class="btn btn-primary" style="width: 25%;"> Submit</button>

                        </div>


                    </form>


                 </div>

              </div>

           </div>



    </div>
</div>
</div>



        <!-- Modal  -->



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction2()">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body border shadow">

                         <form method="post" id="update_confirm2">
                            <?php echo csrf_field(); ?>

                            <div  id="tableContent2">


                            </div>

                            <div class="row justify-content-center mb-1 mt-4">
                                <button class="btn btn-primary" style="width: 20%;">Update</button>

                            </div>
                         </form>
                  ...
                </div>

              </div>
            </div>
          </div>




<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>



<script>

    $(document).ready(function() {



        $(document).on('click','#ProfileEdit',function(){

            var id = $(this).attr("value");

            event.preventDefault();
              jQuery.noConflict();


            $.ajax({

                  url: "<?php echo e(route('Teacher.update')); ?>",
                  data: {"id": id,"_token": "<?php echo e(csrf_token()); ?>"},
                  type: 'post',

                success: function(result)
                     {

                       $("#exampleModal").modal('show');
                        $('#tableContent2').html(result.html);
                    }
            });

      });
    });



    </script>


<script>
    $('#update_confirm2').on('submit',function(e){


         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
            }
        });
        $.ajax({


            url : "<?php echo e(url('update.teacher')); ?>",
            type : "post",
            data:$('#update_confirm2').serialize(),

            success:function(message)
            {
                location.reload();





                Swal.fire(
                 'Update!',
                 'Successfully !',
                'success'
               );


            }

        })
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.Dashboard.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/admin/TeacherList.blade.php ENDPATH**/ ?>