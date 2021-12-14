@extends('layout')
@section('content')
<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
    .btn-primary{
        width: 50%;
        height: 50%;
        padding: 0px;
        margin: 0px;
    }
    .btn-primary i{
        padding: 0px;
        margin: 0px;
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
        
        <div class="col-sm-9">
            <p  style="margin-left: 40%">Báo cáo tồn quỹ</p>
        </div>
        <div class="col-sm-3 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Tháng 12-2021</option>
                <option value="1">Tháng 11-2021</option>
                <option value="1">Tháng 10-2021</option>
            </select>
            <button class="btn btn-sm btn-default">Tìm</button>                
        </div>
    </header>
    <?php $stt = 1; ?>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
                <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Ngày</th>
                    <th style="color:black">Tồn đầu ngày</th>
                    <th style="color:black">Thu</th>
                    <th style="color:black">Chi</th>
                    <th style="color:black">Tồn cuối ngày</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tonquy as $value)
                <tr id="value{{$value->ID}}">          
                    <td style="color:black">{{$stt++}}</td>
                    <td style="color:black">{{$value->Ngay}}</td>
                    <td style="color:black">{{number_format($value->TonDauNgay)}} VNĐ</td>
                    <td style="color:black">{{number_format($value->Thu)}} VNĐ</td>
                    <td style="color:black">{{number_format($value->Chi)}} VNĐ</td>
                    <td style="color:black">{{number_format($value->TonCuoiNgay)}} VNĐ</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ URL::to('/in-bao-cao-ton-quy') }}" name="add_vendor" class="btn btn-info" style="margin-left: 49%">In báo cáo</a>
    </div>
</section>


<script>
$( document ).ready(function() {
    $(".xoa-khach-hang").click(function(){
             var id = $(this).data("id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "xoa-khach-hang/" +id,
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