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

.modal-content
{
    margin-top: 10px !important;
}

.editable-click, a.editable-click, a.editable-click:hover {
    text-decoration: none !important;
    border-bottom: none !important;
}
#myTable th
{
color:rgb(250, 235, 235);
font-size:15px;
line-height: 14px;
text-transform:capitalize;
font-weight: 400px !important;
width: 20px !important;
background-color: rgb(98, 104, 98)
}

/* .image
{
     background-image:url('images/DNA-AdobeStock_banner.webp');
    opacity: 1.2;
    height: 50%;
     width: 100%;
} */


</style>
<?php $__env->startSection('content'); ?>

<div class="image">
    <div class="card shadow mt-5" >

        <div class="card-body">

            <?php if( Session::has("delete") ): ?>
            <script>
               Swal.fire({
                 icon: 'success',
                 title: 'Survey Delete !',

                 })

            </script>


           <?php endif; ?>


           <?php if( Session::has("update") ): ?>
           <script>
              Swal.fire({
                icon: 'success',
                title: 'Title Updated !',

                })

           </script>


          <?php endif; ?>

         <div class="table-responsive">


            <?php
                $user_id=Session::get('user_id');
                $itemid=App\Models\Copyitm::where('user_id',$user_id)->get();


            ?>


            <table class="table table-hover" id="myTable">

                <thead style="background-color:#051016;">
                    <tr>
                    <th>No</th>
                    <th>Suervy&nbsp;Title</th>
                    <th>Key&nbsp;Word</th>
                    <th>Modified&nbsp;Date</th>
                    <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    <?php
                        $i=1;
                    ?>
                    <?php $__currentLoopData = $itemid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $iteamname=App\Models\Item::where('id',$item->item_id)
                         ->orderBy('id','desc')
                        ->first();
                    ?>



                    <?php
                          $itemName=App\Models\Surve::
                          where('item_id',$item->item_id)
                          ->where('user_id',$user_id)
                          ->orderBy('created_at','desc')
                         ->first();
                    ?>
                    <tr>

                        <td>
                            <?php echo e($i++); ?>


                        </td>

                        <?php if($iteamname): ?>

                          <td>


                               <a href="" class="update" data-name="name" data-type="text" data-pk="<?php echo e($iteamname->id); ?>" data-title="Enter name" style="text-decoration: none; color:rgb(23, 27, 27);"><?php echo e(ucwords($iteamname->name)); ?></a>
                                <br>
                               <p>
                                <span>Created&nbsp;:&nbsp;<?php echo e($iteamname->created_at->format('m-d-y')); ?></span>
                              </p>



                            </td>

                            <td>
                                <?php echo e(ucwords($iteamname->keyword)); ?>

                            </td>


                         <?php else: ?>
                            <td>
                                0
                            </td>

                            <td>
                                0
                            </td>

                             <?php endif; ?>










                        <?php if($itemName): ?>
                        <td class="p-2">
                            <p><?php echo e($itemName->created_at->format('m-d-y')); ?></p>

                        </td>

                        <?php else: ?>
                        <td class="p-2">
                            <p> Not Modify</p>

                        </td>

                        <?php endif; ?>




                        <td>
                            <div class="d-flex gap-1" style="width:100% !important">

                            
                            
                            <a href="<?php echo e(url('view.survey',$item->item_id)); ?>"  style="text-decoration: none; font-size:12px; " class="btn btn-sm btn-primary py-2"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a>
                            <a href="<?php echo e(url('survey.print',$item->item_id)); ?>" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                            
                          </div>
                        </td>


                    </tr>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php
                    $user_id=Session::get('user_id');
                    $itemId=App\Models\Item::where('user_id',$user_id)->orderBy('created_at','desc')->get();


                    ?>







                     <?php if( $itemId !='[]'): ?>


                     <?php $__currentLoopData = $itemId; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <?php
                     $itemDate=App\Models\Surve::
                     where('item_id',$items->id)
                     ->where('user_id',$user_id)


                    ->first();
                    ?>







                     <tr>

                        <td>
                            <?php echo e($i++); ?>



                        </td>

                        <td>


                               <?php echo e($items->name); ?>

                                <br>
                               <p>
                                <span>Created&nbsp;:&nbsp;<?php echo e($items->created_at->format('m-d-y')); ?></span>
                              </p>


                        </td>

                        <td>
                            <?php echo e(ucwords($items->keyword)); ?>

                        </td>


                        <?php if($itemDate): ?>
                        <td class="p-2">

                            <?php echo e($itemDate->created_at->format('m-d-y')); ?>


                        </td>

                        <?php else: ?>
                        <td class="p-2">

                             Not Modify

                        </td>

                        <?php endif; ?>




                        <td>
                            <div class="d-flex gap-1" style="width:100% !important">
                            
                            
                            <a href="<?php echo e(url('view.survey',$items->id)); ?>"  style="text-decoration: none; font-size:12px;" class="btn btn-sm btn-primary py-2"><i class="fas fa-eye">&nbsp;<span style="font-size:13px;">View</span></i></a>
                            <a href="<?php echo e(url('survey.print',$items->id)); ?>" style="font-size:12px;" class="btn btn-sm btn-success py-2"><i class="fas fa-print">&nbsp;<span style="font-size:13px;">Print</span></i></a>
                            
                            <div>
                        </td>


                    </tr>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                 <?php endif; ?>




                </tbody>

            </table>




          </div>




        </div>




    </div>



</div>









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
           url: "<?php echo e(route('title.update')); ?>",
           type: 'text',
           pk: 1,
           name: 'name',
           title: 'Enter name'
    });
</script>

<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

<?php $__env->stopSection(); ?>

 <?php $__env->startPush('js'); ?>



<script>
    $('#decline_confirm').on('submit',function(e){



         e.preventDefault();

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-Token' : "<?php echo e(csrf_token()); ?>"
            }
        });
        $.ajax({
            url : "<?php echo e(url('Iteam.Update')); ?>",
            type : "post",
            data:$('#decline_confirm').serialize(),

            success:function(message)
            {

                Swal.fire(
                 'Survey Item!',
                 'Successfully Saved!',
                'success'
               );

                $('#decline').modal('hide');
            // //    $('#d2').html('html');
            }

        })
    });
</script>




<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>





<?php $__env->stopPush(); ?>




<?php echo $__env->make('backend.Dashboard.servey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/index.blade.php ENDPATH**/ ?>