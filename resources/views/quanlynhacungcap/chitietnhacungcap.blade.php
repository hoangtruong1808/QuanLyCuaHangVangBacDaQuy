@extends('detail')

@section('heading')
Chi tiết nhà cung cấp
@endsection

@section('content_summary_asset')
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Tên</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->Ten }}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Điện thoại</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->DienThoai}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Gmail</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->Gmail}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Ghi chú</label>
            <div class="col-lg-7 input-summary-info">
                <textarea class="form-control">{{ $data->GhiChu}}</textarea>
            </div>
        </div>
    </li>
    
@endsection
@section('content_detail')
    <table class="table stats-table tbl-detail">
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Lịch sử giao dịch</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1 ?>
            <th colspan='6' style="text-align:center">Lịch sử nhập hàng</th>
            <tr>
                <th style="text-align:center">STT</th>
                <th style="text-align:center">Loại sản phẩm</th>
                <th style="text-align:center">Ngày giao dịch</th>
                <th style="text-align:center">Số lượng(chỉ)</th>
                <th style="text-align:center">Đơn giá(VNĐ)</th>   
                <th style="text-align:center">Thành tiền(VNĐ)</th>
            </tr>
            @foreach ($sanphamnhap as $sanphammua)
            <tr>
                <td style="text-align:center">{{ $stt++ }}</td>
                <td style="text-align:center">{{ $sanphammua->LoaiSanPham }}</td>
                <td style="text-align:center">{{ $sanphammua->NgayLapPhieu }}</td>
                <td style="text-align:center">{{ $sanphammua->SoLuong}}</td>
                <td style="text-align:center">{{ number_format($sanphammua->DonGia)}}</td>
                <td style="text-align:center">{{ number_format($sanphammua->ThanhTien)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

