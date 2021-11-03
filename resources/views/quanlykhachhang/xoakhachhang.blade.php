@extends('layout')
@section('content')
<section>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>Họ tên</th>
            <th>CMND</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Ảnh đại diện</th>
        </tr>
    </table>
    <div class="form-group">
        <div class="col-lg-offset-3 col-lg-6">
            <button class="btn btn-primary" type="submit">Xác nhận</button>
        </div>
    </div>
</section>
@endsection