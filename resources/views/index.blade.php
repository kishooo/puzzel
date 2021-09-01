@extends('header')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">


			<div class="col-lg-4 col-xs-12">
				<div class="box-content">
					<h4 class="box-title text-info">عدد المستخدمين</h4>
					<div class="content widget-stat">
						<div id="traffic-sparkline-chart-1" class="left-content margin-top-15"></div>
						<!-- /#traffic-sparkline-chart-1 -->
						<div class="right-content">
							<h2 class="counter text-info">{{$users}}</h2>
							<!-- /.counter -->
							<p class="text text-info">Some text here</p>
							<!-- /.text -->
						</div>
						<!-- .right-content -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-4 col-xs-12 -->

			<div class="col-lg-4 col-xs-12">
				<div class="box-content">
					<h4 class="box-title text-success">عدد الطالبات</h4>
					<div class="content widget-stat">
						<div id="traffic-sparkline-chart-2" class="left-content margin-top-10"></div>
						<!-- /#traffic-sparkline-chart-2 -->
						<div class="right-content">
							<h2 class="counter text-success">{{$countOrder}}</h2>
							<!-- /.counter -->
							<p class="text text-success">Some text here</p>
							<!-- /.text -->
						</div>
						<!-- .right-content -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-4 col-xs-12 -->

			<div class="col-lg-4 col-xs-12">
				<div class="box-content">
					<h4 class="box-title text-success">اجمالي الطابات</h4>
					<div class="content widget-stat">
						<div id="traffic-sparkline-chart-3" class="left-content"></div>
						<!-- /#traffic-sparkline-chart-3 -->
						<div class="right-content">
							<h2 class="counter text-danger">{{$ordersTotalPrice}}</h2>
							<!-- /.counter -->
							<p class="text text-danger">Some text here</p>
							<!-- /.text -->
						</div>
						<!-- .right-content -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-4 col-xs-12 -->

			<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">الطلابات</h4>
					<div class="table-responsive table-purchases">
						<table class="table table-striped margin-bottom-10">
							<thead>
								<tr>
									<th style="width:40%;">Product</th>
									<th>Price</th>
									<th>Date</th>
									<th>State</th>
									<th style="width:5%;"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($ordersTable as $orderTable)
								<tr>
									<td>{{$orderTable->name}}</td>
									<td>{{$orderTable->total}}</td>
									<td>{{$orderTable->updateAt}}</td>
									<td><form action="/admin/indexPage/{{Auth::user()->id}}/{{$orderTable->id}}" method="post">
										@csrf
										@if($orderTable->paid==0)
											<td><button type="submit" class="btn btn-bordered btn-xs" >pay</button></td>
										@else
											<td><button type="submit" class="btn btn-bordered btn-xs" >not pay</button></td>
										@endif
									</form></td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
        </div>
		<!-- /.row -->




	@endsection
