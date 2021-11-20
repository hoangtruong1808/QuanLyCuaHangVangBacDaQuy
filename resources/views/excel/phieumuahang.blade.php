<table>
    <thead>
        <tr>
        </tr>
        <tr>
            <th colspan='6'>CÔNG TY CỬA HÀNG VÀNG BẠC ĐÁ QUÝ GOLD</th>
        </tr>
        <tr>
            <th colspan='6'>Chuyên kinh doanh đa dạng vàng bạc, đá quý cao cấp</th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th colspan='6'>Phiếu mua hàng</th>
        </tr>
        <tr>
            <th colspan='6'>Ngày {{date('d-m-Y')}}</th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th colspan='6'>Họ tên khách hàng: {{$phieumuahang->khachhang}}</th>
        </tr>
        <tr>
            <th colspan='6'>Địa chỉ: {{$phieumuahang->diachi}}</th>
        </tr>
        <tr>
            <th colspan='6'>Số điện thoại: {{$phieumuahang->sodienthoai}}</th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá(VNĐ)/chỉ</th>
            <th>Giá trị (%)</th>
            <th>Thành tiền</th>
        </tr> 
    </thead>
    <tbody>
        <?php $stt=1 ?>
        @foreach ($chitietphieumuahang as $item)
        <tr>
            <td>{{ $stt++ }}</td>
            <td>{{ $item->Ten }}</td>
            <td>{{ $item->SoLuong }}</td>
            <td>{{ $item->DonGia }}</td>
            <td>{{ $item->PhanTram }}</td>
            <td>{{ $item->ThanhTien }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan='5'>Tổng cộng</td>
            <td>{{$phieumuahang->TongGiaTri}}</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan='3'>Người bán</td>
            <td colspan='3'>Nhân viên</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan='3'>Người bán</td>
            <td colspan='3'>{{$phieumuahang->nhanvien}}</td>
        </tr>
    </tbody>
</table>        