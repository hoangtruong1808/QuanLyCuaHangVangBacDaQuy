@extends('layout')
@section('content')
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
        <div class="col-sm-11">
            Danh sách khách hàng
        </div>
        <div class="col-sm-1">
            <a href="{{ URL::to('them-khach-hang') }}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
        </div>
    </header>
    <?php $stt = 1; ?>
    <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
        <thead>
        <tr>
            <th style="color:black">STT</th>
            <th style="color:black">Họ tên</th>
            <th style="color:black">CMND</th>
            <th style="color:black">Ngày sinh</th>
            <th style="color:black">Giới tính</th>
            <th style="color:black">Địa chỉ</th>
            <th style="color:black">Điện thoại</th>
            <th style="color:black">Sửa</th>
            <th style="color:black">Xóa</th>
        </tr>
        </thead>
        <tbody>
            @foreach($khachhang as $value)
        <tr id="value{{$value->ID}}">          
            <td style="color:black">{{$stt++}}</td>
            <td style="color:black">{{$value->HoTen}}</td>
            <td style="color:black">{{$value->CMND}}</td>
            <td style="color:black">{{$value->NgaySinh}}</td>
            <td style="color:black">{{$value->GioiTinh}}</td>
            <td style="color:black">{{$value->DiaChi}}</td>
            <td style="color:black">{{$value->DienThoai}}</td>
            <td style="color:black"><a href="{{ route('SuaKhachHang',['id'=>$value->ID]) }}"><i style="color:green" class="fas fa-edit"></i></a></td>
            <td style="color:black">
                <i class="fa fa-times text-danger text"  data-toggle="modal" data-target="#delete{{$value->ID}}"></i>
                <div class="modal fade xoa-modal" id="delete{{$value->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 16px; margin-top: 10px; margin-bottom: 30px">Bạn có chắc muốn xóa dữ liệu này?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal" >Hủy</button>
                                <a class="btn btn-primary xoa-khach-hang" data-id="{{ $value->ID }}" data-token="{{ csrf_token() }}">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>    
        </tr>
            @endforeach
        </tbody>
        
    </table>
</section>


<script>
$( document ).ready(function() {
    $(".xoa-khach-hang").click(function(){
             var id = $(this).data("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "xoa-khach-hang/" +id,
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
@endsection