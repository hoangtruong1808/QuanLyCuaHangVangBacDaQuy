@extends('detail')

@section('heading')
Chi tiết nhân viên
@endsection

@section('content_summary_asset')
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Họ tên</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->HoTen }}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">CMND</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->CMND}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Chức vụ</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->ChucVu}}">
            </div>
        </div>
    </li>
    <li>
        <div class="form-group has-success">
            <label class="col-lg-5 control-label">Địa chỉ</label>
            <div class="col-lg-7 input-summary-info">
                <input type="text" placeholder="" id="f-name" class="form-control" value="{{ $data->DiaChi}}">
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
            <label class="col-lg-5 control-label">Ghi chú</label>
            <div class="col-lg-7 input-summary-info">
                <textarea class="form-control">{{ ($data->TrangThai==0)?'Đã nghỉ việc':'' }} {{ $data->GhiChu}}</textarea>
            </div>
        </div>
    </li>
    
@endsection

@section('content_detail')
<div class="col-sm-2">
</div>
<div class="stats-last-agile margin-box col-sm-8">
    <table class="table stats-table tbl-detail">
        <thead>
            <tr>
                <th colspan='6' style="text-align: center; font-size: 18px; color:#696969">Bảng lương nhân viên</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="text-align:center">STT</th>
                <th style="text-align:center">Họ tên</th>
                <th style="text-align:center">Tháng</th>
                <th style="text-align:center">Số ca làm việc</th>
                <th style="text-align:center">Tổng lương</td>
            </tr>
            <?php $stt=1 ?>
            @foreach($luong as $value)
            <tr>
                <th style="text-align:center">{{ $stt++ }}</th>
                <th style="text-align:center">{{ $data->HoTen }}</th>
                <th style="text-align:center">{{ $value->Thang }}</th>
                <th style="text-align:center">{{ $value->SoCa }}</th>
                <th style="text-align:center">{{ number_format($value->TongLuong)  }} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-sm-2">
</div>
@endsection
