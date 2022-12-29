<?php echo $__env->make('googlmapper::javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php echo $item->render($id, $view); ?>


    <?php if($options['async']): ?>

        <script type="text/javascript">

            initialize_items.push({
                method: initialize_<?php echo $id; ?>

            });

        </script>

    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\laragon\www\rajit_project\IBSC_SERVEY\resources/views/cornford/googlmapper/mapper.blade.php ENDPATH**/ ?>