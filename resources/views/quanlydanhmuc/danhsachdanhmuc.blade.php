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
        $stt=1;
    ?>
    <header class="panel-heading">
        <div class="col-sm-1">
            <a href="{{ URL::to('them-danh-muc') }}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
        Danh sách danh mục và tỷ giá sản phẩm
        </div>
        <div class="col-sm-3">
            <form action="{{ route('TimKiemDanhMuc') }}" method="post">
                <div class="input-group">
                    @csrf()
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
                    <th style="color:black">Tên</th>
                    <th style="color:black">Loại</th>
                    <th style="color:black">Mã</th>
                    <th style="color:black">Giá nhập(VNĐ/chỉ)</th>
                    <th style="color:black">Giá bán(VNĐ/chỉ)</th>
                    <th style="color:black">Tình trạng</th>
                    <th style="color:black">Cập nhật</th>
                    <th style="color:black">Xóa</th>
                    <th style="color:black; width: 120px">Lịch sử biến động giá</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($danhmuc as $value)
                <tr id="value{{$value->ID}}">          
                    <td style="color:black">{{$stt++}}</td>
                    <td style="color:black">{{$value->Ten}}</td>
                    <td style="color:black">{{$value->Loai}}</td>
                    <td style="color:black">{{$value->MaVach}}</td>
                    <td style="color:black">{{number_format($value->GiaNhap)}} VNĐ</td>
                    <td style="color:black">{{number_format($value->GiaBan)}} VNĐ</td>
                    <td style="color:black">{{($value->TinhTrang==1) ? 'Sử dụng' : 'Không sử dụng'}}</td>
                    <td style="color:black"><a href="{{ route('SuaDanhMuc',['id'=>$value->ID]) }}"><i style="color:green" class="fas fa-edit"></i></a></td>
                    <td style="color:black">
                        <i class="fa fa-times text-danger text"  data-toggle="modal" data-target="#delete{{$value->ID}}"></i>
                        <div class="modal fade xoa-modal" id="delete{{$value->ID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header"> 
                                        <b style="font-size: 17px">Xác nhận</b>
                                    </div>
                                    <div class="modal-body" style="font-size: 16px; margin-top: 10px; margin-bottom: 30px">Bạn có chắc muốn xóa danh mục sản phẩm này?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal" >Hủy</button>
                                        <a class="btn btn-primary xoa-danh-muc" data-id="{{ $value->ID }}" data-token="{{ csrf_token() }}">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>  
                    <td>
                        <a href="{{ route('LichSuBienDongGia',['id'=>$value->ID]) }}"><i style="color:gray" class="fas fa-history"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</section>


<script>
$( document ).ready(function() {
    $(".xoa-danh-muc").click(function(){
             var id = $(this).data("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "xoa-danh-muc/" +id,
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