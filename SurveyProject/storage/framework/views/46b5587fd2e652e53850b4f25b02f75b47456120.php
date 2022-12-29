

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>


     <a href="<?php echo e(url('back')); ?>">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="myFunction()">
            <span aria-hidden="true">&times;</span>
        </button>
    </a>

        </div>
        <div class="modal-body">


            <div class="d-flex gap-5">
                <p><span style="font-weight: bold;">Latitude :</span> <?php echo e($map->lat); ?> <span style="font-weight: bold;">Logitude :</span> <?php echo e($map->lng); ?></p>

             </div>



                <?php
                  Mapper::map($map->lat, $map->lng);
               ?>

                <div style="width:100%; height:240px;">

                       <?php echo Mapper::render(); ?>


                </div>
          ...
        </div>

      </div>
    </div>
</div>


<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources\views/backend/Servay/locationView.blade.php ENDPATH**/ ?>