@extends('layout')
@section('content')
<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Khách hàng</h4>
					<h3>5</h3>
					<p>Other hand, we denounce</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Nhà cung cấp</h4>
						<h3>5</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sản phẩm</h4>
						<h3>22</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Phiếu</h4>
						<h3>3</h3>
						<p>Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
<div class="container-fluid">
			<style type="text/css">
				p.title_thongke {
				    text-align: center;
				    font-size: 20px;
				    font-weight: bold;
				}
			</style>
<div class="row">
		<p class="title_thongke">Thống kê đơn hàng doanh số</p>

		<form autocomplete="off">
			@csrf

			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>

			</div>

			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
			
			</div>

			<div class="col-md-2">
				<p>
					Lọc theo: 
					<select class="dashboard-filter form-control" >
						<option>--Chọn--</option>
						<option value="thang9">Trong tháng 9</option>
						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>
				</p>
			</div>

		</form>

		<div class="col-md-12">
			<div id="chart" style="height: 250px;"></div>
		</div>

</div>

<div class="row">
	<style type="text/css">
		table.table.table-bordered.table-dark {
		    background: #32383e;
		}
		table.table.table-bordered.table-dark tr th {
		    color: #fff;
		}
	</style>
</div>
<script>
	chart60daysorder();

		$( function() {
            $( "#datepicker" ).datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
                duration: "slow"
            });
            $( "#datepicker2" ).datepicker({
                prevText:"Tháng trước",
                nextText:"Tháng sau",
                dateFormat:"yy-mm-dd",
                dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
                duration: "slow"
            });
        } );

	var chart = new Morris.Bar({
		element: 'chart',
		//option chart
		lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3', '#766B56'],
		pointFillColor: ['black'],
		fillOpacity: 0.6,
		parseTime: false,
		hideHover: 'auto',
		xkey: 'period',
		ykeys: ['order','sales','profit','quantity'],
		behaveLikeLine: true,
		labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']
	
	});

	$('#btn-dashboard-filter').click(function(){

	   var from_date = $('#datepicker').val();
	   var to_date = $('#datepicker2').val();
	   $.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
		   url:"{{url('/filter-by-date')}}",
		   method:"POST",
		   data:{from_date:from_date,to_date:to_date,},
		   
		   success:function(data)
			   {
				   chart.setData(data.value);

			   }   
	   });
   });


   $('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        $.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        $.ajax({
            url:"{{url('/dashboard-filter')}}",
            method:"POST",
            data:{dashboard_value:dashboard_value},
            
            success:function(data)
                {
                    chart.setData(data.value);
					console.log(data);
                }   
            });

    });

	function chart60daysorder(){
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:"{{url('/days-order')}}",
			method:"POST",
			dataType:"JSON",
			data:{},
			
			success:function(data)
				{
					chart.setData(data.value);
				}   
		});
	}

	$(document).ready(function(){
      
	      });
	  var donut = Morris.Donut({
		element: 'donut',
		resize: true,
		colors: [
		  '#a8328e',
		  '#61a1ce',
		  '#ce8f61',
		  '#f5b942',
		  '#4842f5'
		  
		],
		labelColor:"#cccccc", // text color
		backgroundColor: '#333333', // border color
		data: [
			{label:"Tổng mặt hàng", value:10},
            {label:"Trong kho", value:20},
            {label:"Trưng bày", value:30},
            {label:"Tổng hóa đơn", value:40},
            {label:"Tổng khách hàng", value:50} 

		]
	  });
</script>
@endsection