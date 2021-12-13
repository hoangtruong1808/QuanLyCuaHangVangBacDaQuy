

<?php $__env->startSection('heading'); ?>
Chi tiết nhà cung cấp
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_summary_asset'); ?>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Tên</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="<?php echo e($data->Ten); ?>">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Điện thoại</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="<?php echo e($data->DienThoai); ?>">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Gmail</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="<?php echo e($data->Gmail); ?>">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Ghi chú</label>
            <div class="col-lg-7 input-summary-info">
                <textarea class="form-control"><?php echo e($data->GhiChu); ?></textarea>
            </div>
        </div>
    </li>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\QuanLyCuaHangVangBacDaQuy\resources\views/quanlynhacungcap/chitietnhacungcap.blade.php ENDPATH**/ ?>