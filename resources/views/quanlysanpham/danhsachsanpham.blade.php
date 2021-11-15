@extends('layout')
@section('content')
<section>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Khối lượng</th>
            <th>Loại</th>
            <th>Tiêu chuẩn</th>
            <th>Giá nhập</th>
            <th>Giá bán</th>
            <th>Tình trạng</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        <tr >
            <?php $stt = 1?>
            <td style="color:black">{{ $stt++ }}</td>
            <td style="color:black">Vàng CSJ</td>
            <td style="color:black">100 gram </td>
            <td style="color:black">Vàng </td>
            <td style="color:black">Vàng trang sức</td>
            <td style="color:black">1.000.000 vnđ</td>
            <td style="color:black">1.200.000 vnđ</td>
            <td style="color:black">Tồn tại</td>
            <td><i style="color:green" class="fas fa-edit"></i></td>
            <td><i class="fa fa-times text-danger text"  data-toggle="modal"></i></td>
        </tr>
    </table>
</section>
@endsection