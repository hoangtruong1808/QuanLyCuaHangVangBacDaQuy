
<?php $__env->startSection('content'); ?>
<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>
<section>
    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message', null);
        }
    ?>
    <header class="panel-heading">
        <div class="col-sm-1">
            <a href="<?php echo e(URL::to('them-san-pham')); ?>" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
        Danh sách sản phẩm
        </div>
        <div class="col-sm-3">
            <form action="<?php echo e(route('TimKiemSanPham')); ?>" method="post">
                <div class="input-group">
                    <?php echo csrf_field(); ?>
                    <input type="text" class="input-sm form-control" name="key" style="margin-top:14px">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="submit">Tìm</button>
                    </span>  
                </div>
            </form>
        </div>
    </header>
    <?php $stt = 1; ?>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
                <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Mã vạch</th>
                    <th style="color:black">Loại sản phẩm</th>
                    <th style="color:black">Số lượng(chỉ)</th>
                    <th style="color:black">Giá trị(%)</th>
                    <th style="color:black">Tình trạng</th>
                    <th style="color:black">Sửa</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="value<?php echo e($value->ID); ?>">          
                        <td style="color:black"><?php echo e($stt++); ?></td>
                        <td style="color:black"><a href="<?php echo e(route('ChiTietSanPham',['id'=>$value->ID])); ?>"><?php echo e($value->MaVach); ?></a></td>
                        <td style="color:black"><?php echo e($value->loaisanpham); ?></td>
                        <td style="color:black"><?php echo e($value->SoLuong); ?> chỉ</td>
                        <td style="color:black"><?php echo e($value->GiaTri); ?>%</td>
                        <td style="color:black"><?php echo e(($value->TinhTrang==1)?"Tồn tại":"Không tồn tại"); ?></td>
                        <td style="color:black"><a href="<?php echo e(route('SuaSanPham',['id'=>$value->ID])); ?>"><i style="color:green" class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($sanpham->links()); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\QuanLyCuaHangVangBacDaQuy\resources\views/quanlysanpham/danhsachsanpham.blade.php ENDPATH**/ ?>