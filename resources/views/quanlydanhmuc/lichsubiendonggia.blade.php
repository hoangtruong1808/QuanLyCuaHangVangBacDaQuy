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
    <header class="panel-heading">
            Lịch sử biến động giá - {{ $danhmuc->Ten }}
    </header>
    <?php $stt = 1; ?>
    <div class="table-agile-info">
        <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0" style="width: 60%; margin-left: 20%">
            <thead>
            <tr>
                <th style="color:black">STT</th>
                <th style="color:black">Cập nhật lúc</th>
                <th style="color:black">Giá nhập</th>
                <th style="color:black">Giá bán</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tygia as $value)
            <tr>
                <td style="color:black">{{$stt++}}</td>
                <td style="color:black">{{$value->NgayCapNhat}}</td>
                <td style="color:black">{{number_format($value->GiaNhap)}} VNĐ</td>
                <td style="color:black">{{number_format($value->GiaBan)}} VNĐ</td>
            </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>
</section>


<script>
$( document ).ready(function() {
    $(".xoa-danh-muc").click(function(){
             var id = $(this).data("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "xoa-danh-muc/" +id,
                method: 'POST',
                data: {
                    "id":id
                },
                success:function(data){ 
                    $("#value"+id).remove();
                    location.reload();
                }
            }); 
        });
});
</script> 
@endsection