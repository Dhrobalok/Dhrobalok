
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <div class="f-roboto">Payment Voucher</div>
            </div>
            <div class="col-md-4 text-right">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create vouchers')): ?>
                <a href="<?php echo e(route('admin.voucher.debit.create')); ?>"><i class="fa fa-plus-circle mr-2"></i>Add New</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center">Voucher No</th>
                    <th class="d-none d-sm-table-cell text-center">Date</th>
                    <th class="d-none d-sm-table-cell text-center">Posted By</th>
                    <th class="d-none d-sm-table-cell text-center">Status</th>
                    <th class="d-none d-sm-table-cell text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($voucher -> id); ?>" class="text-center">
                    <td class="text-center"><?php echo e($voucher -> voucher_no); ?></td>
                    <td class="text-center"><?php echo e($voucher -> date); ?></td>
                    <td class="text-center"><?php echo e($voucher -> posted_by_info -> name); ?></td>
                    <?php
                    $status = App\Models\VoucherStatus :: find($voucher->status)
                    ?>
                    <?php if($status -> name == 'Posted'): ?>
                    <td class="text-center"><span class="badge badge-info"><?php echo e($status -> name); ?></span></td>
                    <?php elseif($status -> name == 'Rejected'): ?>
                    <td class="text-center"><span class="badge badge-danger"><?php echo e($status -> name); ?></span></td>
                    <?php elseif($status -> name == 'Approved'): ?>
                    <td class="text-center"><span class="badge badge-success"><?php echo e($status -> name); ?></span></td>
                    <?php else: ?>
                    <td class="text-center"><span class="badge badge-primary"><?php echo e($status -> name); ?></span></td>
                    <?php endif; ?>
                    <td>
                        <div class="btn-group">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view vouchers')): ?>
                            <a class=" btn btn-info mr-1"
                                href="<?php echo e(route('admin.voucher.debit.view',['id' => $voucher -> id])); ?>"><i
                                    class="fas fa-info"></i></a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete vouchers')): ?>
                            <a class="btn btn-sm btn-danger" href="#" onclick="delete_voucher(<?php echo e($voucher -> id); ?>)"><i
                                    class="fas fa-trash-alt"></i></a>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
td,
th,
.dataTables_info,
.page-link,
.form-control {
    font-size: 18px;
    font-family: 'Gentium Basic';
}

.block-title,
a {
    font-size: 18px;
    font-family: 'Gentium Basic';
    color: blue;
    font-weight: bolder;
}

.btn-outline-primary {
    font-size: 15px;
    font-family: 'Gentium Basic';
    margin-left: 2px;
}

#delete {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    color: blue;
    border-color: blue;
    border-radius: 10%;
}

#edit {

    font-family: 'Gentium Basic';
    margin-left: 2px;
    border-color: blue;
    color: blue;
    border-radius: 10%;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script>
function delete_voucher(id) {
    Swal.fire({

        title: "<h4 class = 'text-danger' style = 'font-family:Gentium Basic'>Do you want to delete this voucher?</h4>",
        icon: 'warning',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Confirm",

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': "<?php echo e(csrf_token()); ?>"
                }
            })
            $.ajax({
                url: "<?php echo e(route('admin.voucher.debit.delete')); ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    showSuccessWindow('Voucher deleted successfully');
                    $("#" + id).remove();
                }
            })

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\rajit_project\mgmclac.rajbilling.com\resources\views/backend/admin/vouchers/debit_vouchers/index.blade.php ENDPATH**/ ?>