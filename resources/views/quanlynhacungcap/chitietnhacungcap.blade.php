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

