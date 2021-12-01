@extends('detail')

@section('heading')
Chi tiết sản phẩm
@endsection

@section('content_summary_asset')
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Mã sản phẩm</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->MaVach }}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Loại sản phẩm</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->Loai}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Số lượng</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->SoLuong}} chỉ">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Giá trị</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->GiaTri}} %">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Tình trạng</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ ($data->TinhTrang == 1)?'Tồn tại':'Không tồn tại'}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Ghi chú</label>
            <div class="col-lg-7 input-summary-info">
                <textarea class="form-control"></textarea>
            </div>
        </div>
    </li>
    
@endsection

@section('content_detail')
<div class="col-sm-2">
</div>
<div class="stats-last-agile margin-box col-sm-8">
    <table class="table stats-table tbl-detail">
        @if($loai == 'phieunhaphang')
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Thông tin nhập hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-align:center; width: 280px;">Nhà cung cấp</th>
                <th style="text-align:center">Ngày nhập</th>
                <th style="text-align:center">Giá trị nhập(VNĐ)</th>
            </tr>
            <tr>
                <td style="text-align:center">{{ $thongtinnhaphang->nhacungcap }}</td>
                <td style="text-align:center">{{ $thongtinnhaphang->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ number_format($data->GiaNhap)}}</td>
            </tr>
        </tbody>
        @else
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Thông tin mua hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-align:center; width: 280px;">Khách hàng</th>
                <th style="text-align:center">Ngày giao dịch</th>
                <th style="text-align:center">Giá mua(VNĐ)</th>
            </tr>
            <tr>
                <td style="text-align:center">{{ $thongtinnhaphang->khachhang }}</td>
                <td style="text-align:center">{{ $thongtinnhaphang->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ number_format($data->GiaNhap)}}</td>
            </tr>
        </tbody>
        @endif
    </table>
    @if($thongtinbanhang)
    <table class="table stats-table tbl-detail">
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Thông tin bán hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-align:center; width: 280px;">Khách hàng</th>
                <th style="text-align:center">Ngày giao dịch</th>
                <th style="text-align:center">Giá trị bán(VNĐ)</th>
            </tr>
            <tr>
                <td style="text-align:center">{{ $thongtinbanhang->khachhang }}</td>
                <td style="text-align:center">{{ $thongtinbanhang->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ number_format($data->GiaBan)}}</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center"><b>Thời gian bảo hành:</b> {{ $thongtinbanhang->ngaybaohanh }} ngày</td>
            </tr>
        </tbody>
    </table>
    @endif
</div>

<div class="col-sm-2">
</div>
@endsection
