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

#myTable th
{
    color:rgb(250, 235, 235);
font-size:14px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(98, 104, 98)
}

.zoom:hover {
  -ms-transform: scale(3.5); /* IE 9 */
  -webkit-transform: scale(3.5); /* Safari 3-8 */
  transform: scale(3.5);

}

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


                             <th>Location</th>

                             <th style="color: rgb(253, 243, 228);">
                                Action
                             </th>


                        </tr>

                    </thead>



                    <tbody>

                        <?php $__currentLoopData = $surveid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allsurve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td>
                                <?php echo e($allsurve->surve_id); ?>


                            </td>


                             <?php $__currentLoopData = $questionName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                             <?php
                             $surveInform=App\Models\Surve::where('surve_id',$allsurve->surve_id)
                             ->where('q_id',$question->id)
                             ->first();



                            ?>









                          

                             <?php if( $surveInform): ?>

                             <?php
                             $Qtype=App\Models\question::where('id',$surveInform->q_id)->first();

                             ?>


                                   <?php if($Qtype): ?>


                                        <?php if($Qtype->type==2): ?>


                                            <td>

                                                <a href="<?php echo e(route('file.download',$surveInform->id)); ?>"><i class="fas fa-download">&nbsp;Download</i></a>


                                            </td>


                                         <?php else: ?>



                                         <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                            <?php echo e($surveInform->value); ?>





                                         </td>


                                        <?php endif; ?>



                                   <?php endif; ?>

                             <?php else: ?>


                             <td style="color: rgb(81, 78, 73); font-family:Arial, Helvetica, sans-serif;font-size:13px;">

                                N/A
                            </td>



                             <?php endif; ?>










                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php

                              $map=App\Models\Location::where('survey_no',$allsurve->surve_id)
                              ->first();

                             ?>






                            <?php if($map): ?>
                             <td>

                                  

                                  <a href="<?php echo e(route('location.view',$allsurve->surve_id)); ?>"  class="btn btn-sm btn-info" >show</a>

                                   


                                


                                      


                             </td>

                             <?php else: ?>

                               <td>N/A</td>

                            <?php endif; ?>



                        <td>
                          <div class="d-flex gap-1" style="width:100% !important">
                            <a href="<?php echo e(route('survey.edit',$allsurve->surve_id)); ?>"  class="btn btn-sm btn-primary edit" ><i class="fas fa-edit">&nbsp;Edit</i></a>
                            
                            <a href="<?php echo e(url('Individual.print',$allsurve->surve_id)); ?>"  class="btn btn-sm btn-success "><i class="fas fa-print" aria-hidden="true" >&nbsp;<span>Print</span></i></a>
                            

                            </div>
                        </td>



                          </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                    </tbody>

                </table>

              </div>

          </div>

     </div>


     <!---  Edit  -->







 <!----  inline edit  --->

    
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
    <!-- Inline update -->

<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        }
    });

    $('.update').editable({
           url: "<?php echo e(route('information.update')); ?>",
           type: 'text',
           pk: 1,
           name: 'name',
           title: 'Enter name'
    });
</script>





 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('js'); ?>
 <script>
    $(document).ready( function () {
      datatable=$('#myTable').DataTable();
} );
</script>


<script>
    $(document).ready(function () {
    $('#myInput').keyup(function(){


        var input, filter, parent, child, a, i, txtValue;
        input = $("#myInput");
        filter = input.val().toUpperCase();

        parent = document.getElementById("search_content");

        child = parent.getElementsByClassName("col-md-3");

        // if(filter.length > 0){
        //     $('.faqs-title-box')[0].style.display = 'none';
        // }else{
        //     $('.faqs-title-box')[0].style.display = '';
        // }

        for (i = 0; i < child.length; i++) {
            a = child[i];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                child[i].style.display = "";
            } else {
                child[i].style.display = "none";
            }
        }
    });
});
</script>









    <script>
        $('#update_confirm').on('submit',function(e){


             e.preventDefault();

            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
                }
            });
            $.ajax({


                url : "<?php echo e(url('update.servey')); ?>",
                type : "post",
                data:$('#update_confirm').serialize(),

                success:function(message)
                {
                    location.reload();
                    // $('#table-item').append(message.html);
                    //  $("#update_confirm").trigger("reset");
                    //  $('#exampleModal').hide();
                    //  $("body").removeClass("modal-open");
                    //  $('.modal-backdrop').hide();




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

<?php echo $__env->make('backend.Dashboard.servey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/view.blade.php ENDPATH**/ ?>