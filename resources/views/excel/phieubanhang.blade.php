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
            <th colspan='6'>PHIẾU BÁN HÀNG</th>
        </tr>
        <tr>
            <th colspan='6'><i>Ngày {{date('d-m-Y')}}</i></th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th colspan='6'>Họ tên khách hàng: {{$phieubanhang->khachhang}}</th>
        </tr>
        <tr>
            <th colspan='6'>Địa chỉ: {{$phieubanhang->diachi}}</th>
        </tr>
        <tr>
            <th colspan='6'>Số điện thoại: {{$phieubanhang->sodienthoai}}</th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th colspan='2'>Đơn giá(VNĐ)/chỉ</th>
            <th>Thành tiền</th>
        </tr> 
    </thead>
    <tbody>
        <?php $stt=1 ?>
        @foreach ($chitietphieubanhang as $item)
        <tr>
            <td>{{ $stt++ }}</td>
            <td>{{ $item->Ten }}</td>
            <td>{{ $item->SoLuong }}</td>
            <td colspan='2'>{{ number_format($item->DonGia) }} VNĐ</td>
            <td>{{ number_format($item->ThanhTien) }} VNĐ</td>
        </tr>
        @endforeach
        <tr>
            <td colspan='5' style="text-align: right">Tổng cộng</td>
            <td>{{ number_format($phieubanhang->TongGiaTri) }} VNĐ</td>
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
            <td colspan='3' style="text-align: center"><b><i>{{$phieubanhang->nhanvien}}</i></b></td>
        </tr>
    </tbody>
</table>        