@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Lập phiếu bán hàng
            </header>
            <?php
                $message = Session::get('message');
                if($message) {
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message', null);
                }
                $stt=1;
            ?>
            <div class="panel-body">
            <form class="form-horizontal bucket-form" action="{{ route('LuuPhieuBanHang') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Khách hàng:</label>
                        <div class="col-sm-6">
                            <select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="khachhang"> 
                                <option value="" selected disabled hidden>Chọn khách hàng</option>
                                @foreach($khachhang as $value)
                                <option value="{{ $value->ID }}">{{$value->HoTen}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nhân viên lập phiếu:</label>
                        <div class="col-sm-6">
                            <select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="nhanvien"> 
                                <option value="" selected disabled hidden>Chọn nhân viên lập phiếu</option>

                                @foreach($nhanvien as $value)
                                <option value="{{ $value->ID }}">{{$value->HoTen}}</option>
                                @endforeach
                                
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Số sản phẩm:</label>
                        <div class="col-sm-1">  
                            <input type="text" class="form-control" style="width: 80px" id="sosanpham" name="sosanpham">   
                        </div>
                        <div class="col-sm-1">
                            <a class="btn btn-info" id="tao">Tạo</a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered tbl-dgrr-physical" >
                        <thead>
                            <tr>
                                <th>Loại sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng(chỉ)</th>
                                <th>Đơn giá(VNĐ) / chỉ</th>
                                <th>Thành tiền</th>
                            </tr>   
                        </thead>
                        <tbody>
                           <!-- <tr>
        
                                <th>
                                    <select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sanpham[]"> 
                                        <option value="" selected disabled hidden>Loại sản phẩm</option>                       
                                        @foreach($danhmuc as $value)
                                        <option value="{{ $value->ID }}">{{$value->Ten}}</option>
                                        @endforeach   
                                    </select> 
                                </th>
                                <th>
                                    <select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="masanpham[]"> 
                                        <option value="" selected disabled hidden>Mã sản phẩm</option>                       
                                        @foreach($sanpham as $value)
                                        <option value="{{ $value->MaVach }}">{{$value->MaVach}}</option>
                                        @endforeach   
                                    </select> 
                                </th>
                                <th>
                                    <input type="text" class="form-control" style="width: 80px" name="soluong[]">
                                </th>
                                
                                <th>
                                    <input type="text" class="form-control" style="width: 150px" name="dongia[]">
                                </th>
                                <th>
                                    <input type="text" class="form-control" style="width: 150px" name="thanhtien[]">
                                </th>
                            </tr>  -->

                        </tbody>
                    </table>
                    <div class="col-sm-6">
                        <button type="submit" name="add_vendor" class="btn btn-info" style="margin-left: 85%">In phiếu</button>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ URL::to('/in-phieu-bao-hanh') }}" class="btn btn-danger" style="margin-right: 85%">In phiếu bảo hành<a>
                    </div>
                </form>
            </div>
            
        </section>
        <script>
            $(document).ready(function() {
          
                $("#tao").click(function(){
                    var sosanpham = $("#sosanpham").val();
                    for(var i=0; i<sosanpham; i++)
                    {
                        $('tbody').append(
                            '<tr><th><select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sanpham[]"> <option value="" selected disabled hidden>Loại sản phẩm</option>@foreach($danhmuc as $value)<option value="{{ $value->ID }}">{{$value->Ten}}</option>@endforeach   </select></th><th><select class="form-control input-lg select2 select2-hidden-accessible area" style="width: 100%;" tabindex="-1" aria-hidden="true" name="masanpham[]"> <option value="" selected disabled hidden>Mã sản phẩm</option>                       @foreach($sanpham as $value)<option value="{{ $value->MaVach }}">{{$value->MaVach}}</option>@endforeach   </select> </th><th><input type="text" class="form-control" style="width: 80px" name="soluong[]"></th><th><input type="text" class="form-control" style="width: 150px" name="dongia[]"></th><th><input type="text" class="form-control" style="width: 150px" name="thanhtien[]"></th></tr>'
                        );
                    }
                    $('.select2').select2({
                    closeOnSelect: false
                    });
                }); 
                $('.select2').select2({
                    closeOnSelect: false
                });
        
            });
        </script>
@endsection