@extends('layout')
@section('content')
<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
</style>
<section>
    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message', null);
        }
    ?>
    <header class="panel-heading">
        <div class="col-sm-12">
            Phân quyền nhân viên
        </div>
    </header>
    <?php $stt = 1; ?>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
                <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Họ tên</th>
                    <th style="color:black">Nhân viên</th>
                    <th style="color:black">Quản lý</th>
                    <th style="color:black">Admin</th>
                </tr>
                </thead>
                <tbody>
                    <form method="post" action="{{ route('LuuPhanQuyen')}}">
                    @csrf()
                    @foreach($nhanvien as $value)
                    <tr>          
                        <td style="color:black">{{$stt++}}</td>
                        <td style="color:black"><a href="{{ route('ChiTietNhanVien',['id'=>$value->ID]) }}">{{$value->HoTen}}</a></td>
                        <td style="color:black">
                            <input type="radio" name="phanquyen{{$value->ID}}" value="Nhân viên" {{ ($value->ChucVu=='Nhân viên')?'checked':'' }}>
                        </td>
                        <td>
                            <input type="radio" name="phanquyen{{$value->ID}}" value="Quản lý"  {{ ($value->ChucVu=='Quản lý')?'checked':'' }}>
                        </td>
                        <td>
                            <input type="radio" name="phanquyen{{$value->ID}}" value="Admin"  {{ ($value->ChucVu=='Admin')?'checked':'' }}>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                
            </table>
            <div style="margin-left: 45%">
                <button class="btn btn-primary" type="submit">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</section>



@endsection