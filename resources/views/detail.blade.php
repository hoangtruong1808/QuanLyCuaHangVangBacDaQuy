@extends('layout')

@section('content')
<style>
	.input-summary-info {
		float: right;
	}

	.list-unstyled input {
		height: 90%;
	}

	.widget {
		background: #eef9f0;
		border-radius: 2%;
	}

	.title {
		font-weight: bold;
	}

	.heading {
		margin-bottom: 20px;
	}

    .margin-box {
        margin-top: 20px;
    }

	.button {
		float: right;
		margin-top: 20px;
		margin-right: 20px;
	}

	.select-active {
		margin-top: 5px;
	}

	.date-info {
		float: right;
	}
	.date-info span {
		font-style: italic;
	}

</style>

<div class="table-agile-info">
	<div class="panel panel-default">
        <div class="panel-heading">
        @yield('heading')
        </div>
	    <div class="col-sm-5 gallery-grids-left"  style="margin-top:10px">
            <div class="gallery-grid">
                <a class="example-image-link" href="{{asset('public/backend/images/g1.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                    <img src="{{asset('public/backend/images/g1.jpg')}}" alt="" />
                    <div class="captn">
                        <h4>Visitors</h4>
                        <p>Aliquam non</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-md-6 stats-info margin-box" style="margin-bottom:20px">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Thông tin</h4>
                </div>
                <div>
                    <ul class="list-unstyled">

                        @yield('content_summary_asset')
                        
                    </ul>
                </div>

            </div>
        </div>

		
	
		<table class="table" ui-jq="footable" ui-options='{
			"paging": {
			"enabled": true
			},
			"filtering": {
			"enabled": true
			},
			"sorting": {
			"enabled": true
			}}'>
			<thead>
			</thead>
			<tbody>
	
			</tbody>
		</table>	
	</div>
<div>
		@yield('content_detail')
	<div class="clearfix"> </div>
</div>


@endsection