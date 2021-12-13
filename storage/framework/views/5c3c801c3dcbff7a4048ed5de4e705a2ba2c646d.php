
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
            <a href="<?php echo e(URL::to('them-nhan-vien')); ?>" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
        Danh sách nhân viêm
        </div>
        <div class="col-sm-3">
            <form action="<?php echo e(route('TimKiemNhanVien')); ?>" method="post">
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
                    <th style="color:black">Họ tên</th>
                    <th style="color:black">CMND</th>
                    <th style="color:black">Chức vụ</th>
                    <th style="color:black">Địa chỉ</th>
                    <th style="color:black">Điện thoại</th>
                    <th style="color:black">Sửa</th>
                    <th style="color:black">Xóa</th>
                    <th style="color:black; width: 80px">Tính lương</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $nhanvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="value<?php echo e($value->ID); ?>">          
                    <td style="color:black"><?php echo e($stt++); ?></td>
                    <td style="color:black"><a href="<?php echo e(route('ChiTietNhanVien',['id'=>$value->ID])); ?>"><?php echo e($value->HoTen); ?></a></td>
                    <td style="color:black"><?php echo e($value->CMND); ?></td>
                    <td style="color:black"><?php echo e($value->ChucVu); ?></td>
                    <td style="color:black"><?php echo e($value->DiaChi); ?></td>
                    <td style="color:black"><?php echo e($value->DienThoai); ?></td>
                    <td style="color:black"><a href="<?php echo e(route('SuaNhanVien',['id'=>$value->ID])); ?>"><i style="color:green" class="fas fa-edit"></i></a></td>
                    <td style="color:black">
                        <i class="fa fa-times text-danger text"  data-toggle="modal" data-target="#delete<?php echo e($value->ID); ?>"></i>
                        <div class="modal fade xoa-modal" id="delete<?php echo e($value->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header"> 
                                        <b style="font-size: 17px">Xác nhận</b>
                                    </div>
                                    <div class="modal-body" style="font-size: 16px; margin-top: 10px; margin-bottom: 30px">Bạn có chắc muốn xóa nhân viên này?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal" >Hủy</button>
                                        <a class="btn btn-primary xoa-nhan-vien" data-id="<?php echo e($value->ID); ?>" data-token="<?php echo e(csrf_token()); ?>">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="color:black"><a href=""><i style="color:gold" class="fas fa-file-invoice-dollar"></i></a></td>   
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<script>
$( document ).ready(function() {
    $(".xoa-nhan-vien").click(function(){
             var id = $(this).data("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "xoa-nhan-vien/" +id,
                method: 'POST',
                data: {
                    "id":id
                },
                success:function(data){ 
                    $("#value"+id).remove();
                    location.reload();
                }
            }); 
        });
});
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\QuanLyCuaHangVangBacDaQuy\resources\views/quanlynhanvien/danhsachnhanvien.blade.php ENDPATH**/ ?>