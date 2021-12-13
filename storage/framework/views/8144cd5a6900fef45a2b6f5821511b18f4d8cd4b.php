
<?php $__env->startSection('content'); ?>
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhà cung cấp
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form"  method="post" action="<?php echo e(route('CapNhatNhaCungCap', ['id'=>$nhacungcap->ID])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>, 
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên nhà cung cấp</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="ten" value="<?php echo e($nhacungcap->Ten); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số điện thoại</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="dienthoai" value="<?php echo e($nhacungcap->DienThoai); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Gmail</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="gmail" value="<?php echo e($nhacungcap->Gmail); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-6">
                            <input type="file" name="anhdaidien" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ghi chú</label>
                        <div class="col-sm-6" name="ghichu">
                            <textarea class="form-control"><?php echo e($nhacungcap->GhiChu); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-6">
                            <button class="btn btn-primary" type="submit">Xác nhận</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\QuanLyCuaHangVangBacDaQuy\resources\views/quanlynhacungcap/suanhacungcap.blade.php ENDPATH**/ ?>