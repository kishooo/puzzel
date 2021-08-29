@extends('header')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<div class="table-responsive" data-pattern="priority-columns">
						<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
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
									<td class="text-success">Completed</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->


@endsection
