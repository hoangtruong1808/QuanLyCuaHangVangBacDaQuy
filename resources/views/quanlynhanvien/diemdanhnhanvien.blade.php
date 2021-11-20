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
        <div class="col-sm-10">
            Điểm danh nhân viên
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <div class="col-sm-12">
                    <input class="form-control"  type="text" name="ngay" value="{{ date('d/m/Y') }}" disabled="">
                </div>
            </div>
        </div>
    </header>
    <?php $stt = 1; ?>
    <table id="example" class="table table-striped table-bordered table-sm"  cellspacing="0">
        <thead>
        <tr>
            <th style="color:black">STT</th>
            <th style="color:black">Họ tên</th>
            <th style="color:black">Chức vụ</th>
            <th style="color:black">Ca sáng</th>
            <th style="color:black">Ca chiều</th>
            <th style="color:black">Ca tối</th>
            <th style="color:black">Điểm danh</th>
        </tr>
        </thead>
        <tbody> 
            @foreach($nhanvien as $value)
        @csrf()
        <tr>          
            <td style="color:black">{{$stt++}}</td>
            <td style="color:black"><a href="{{ route('ChiTietNhanVien',['id'=>$value->ID]) }}">{{$value->HoTen}}</a></td>
            <td style="color:black">{{$value->ChucVu}}</td>
            <td style="color:black"><input type="checkbox" value="casang" class="casang{{$value->ID}}" {{ ($value->CaSang==1)?'checked':'' }}></td>
            <td style="color:black"><input type="checkbox" value="cachieu" class="cachieu{{$value->ID}}"{{ ($value->CaChieu==1)?'checked':'' }}></td>
            <td style="color:black"><input type="checkbox"  value="catoi" class="catoi{{$value->ID}}" {{ ($value->CaToi==1)?'checked':'' }}></td>
            <td>
                <button type="submit" class="btn btn-warning btn-edit diem-danh-nhan-vien{{$value->ID}}" data-id='{{$value->ID}}'>Điểm danh</button>   
            </td>
        </tr>
        <script>
$( document ).ready(function() {
    $(".diem-danh-nhan-vien{{$value->ID}}").click(function(){
        var casang{{$value->ID}}=0; 
        var cachieu{{$value->ID}}=0; 
        var catoi{{$value->ID}}=0; 
        var id = $(this).data("id");
        
        if($('.casang{{$value->ID}}').is(":checked"))
        {
            casang{{$value->ID}} = 1;
        }
        if($('.cachieu{{$value->ID}}').is(":checked"))
        {
            cachieu{{$value->ID}} = 1;
        }
        if($('.catoi{{$value->ID}}').is(":checked"))
        {
            catoi{{$value->ID}} = 1;
        } 
        //alert(cachieu{{$value->ID}});
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "luu-diem-danh/" +id,
            method: 'POST',
            data: {
                "id":id,
                "casang":casang{{$value->ID}},
                "cachieu":cachieu{{$value->ID}},
                "catoi":catoi{{$value->ID}},
            },
            success:function(data){ 
            }
        });  
    });
});
</script> 
            @endforeach
        </tbody>
    </table>
</section>



@endsection