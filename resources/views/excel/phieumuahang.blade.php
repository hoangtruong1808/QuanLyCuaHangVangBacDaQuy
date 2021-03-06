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
            <th colspan='6'>PHIẾU MUA HÀNG</th>
        </tr>
        <tr>
            <th colspan='6'><i>Ngày {{date('d-m-Y')}}</i></th>
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
            <td>{{ number_format($item->DonGia) }} VNĐ</td>
            <td>{{ $item->PhanTram }}</td>
            <td>{{ number_format($item->ThanhTien) }} VNĐ</td>
        </tr>
        @endforeach
        <tr>
            <td colspan='5' style="text-align: right">Tổng cộng</td>
            <td>{{ number_format($phieumuahang->TongGiaTri) }} VNĐ</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan='3' style="text-align: center"><b>Khách hàng</b></td>
            <td colspan='3' style="text-align: center"><b>Nhân viên</b></td>
        </tr>
        <tr>
            <td colspan='3' style="text-align: center"><i>(ký, họ tên)</i></td>
            <td colspan='3' style="text-align: center"><i>(ký, họ tên)</i></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan='3'></td>
            <td colspan='3' style="text-align: center"><b><i>{{$phieumuahang->nhanvien}}</i></b></td>
        </tr>
    </tbody>
</table>        