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
            <th colspan='6'>BÁO CÁO TỒN QUỸ THÁNG {{date('m-Y')}}</th>
        </tr>
        <tr>
            <th colspan='6'><i>Ngày {{date('d-m-Y')}}</i></th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th>STT</th>
            <th>Ngày</th>
            <th>Tồn đầu ngày</th>
            <th>Thu</th>
            <th>Chi</th>
            <th>Tồn cuối ngày</th>
        </tr> 
    </thead>
    <tbody>
        <?php $stt=1 ?>
        @foreach ($baocaotonquy as $item)
        <tr>
            <td>{{ $stt++ }}</td>
            <td>{{ $item->Ngay }}</td>
            <td>{{ number_format($item->TonDauNgay) }} </td>
            <td>{{ number_format($item->Thu) }} </td>
            <td>{{ number_format($item->Chi) }} </td>
            <td>{{ number_format($item->TonCuoiNgay) }} </td>
            <?php $toncuoithang = $item->TonCuoiNgay ?>
        </tr>
        @endforeach
        <tr>
            <td colspan="2"><b>Tổng cộng</b></td>
            <td><b>{{ number_format($tondauthang) }}</b></td>
            <td><b>{{ number_format($tongthu) }}</b></td>
            <td><b>{{ number_format($tongchi) }}</b></td>
            <td><b>{{ number_format($toncuoithang) }}</b></td>
        </tr>
    </tbody>
</table>        