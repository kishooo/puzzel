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
									<th>الاسم</th>
									<th data-priority="1">الايمال</th>
									<th data-priority="3">point</th>
									<th data-priority="6">created At</th>
									<!--<th data-priority="1">Change</th>
									<th data-priority="3">Prev Close</th>
									<th data-priority="3">Open</th>
									<th data-priority="6">Bid</th>
									<th data-priority="6">Ask</th>
									<th data-priority="6">1y Target Est</th>
									<th data-priority="6">Lorem</th>
									<th data-priority="6">Ipsum</th>!-->
								</tr>
							</thead>
							@foreach($users as $user)
							<form  action="/admin/ShowUsers/{{$userId}}/{{$user->id}}" method="post">
								@csrf
								<tbody>
									<tr>
										<th><span class="co-name">{{$user->name}}</span></th>
										<td>{{$user->email}}</td>
										<td>{{$user->points}}</td>
										<td>{{$user->created_at}}</td>

										<td colspan="2">Spanning cell</td>
										@if($user->UserType==0)
											<td><button type="submit" class="btn btn-bordered btn-xs" >Make Admin</button></td>
										@else
											<td><button type="submit" class="btn btn-bordered btn-xs" >Make Normal</button></td>
										@endif
									</tr>
									</tbody>
								</form>
								@endforeach


						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->


@endsection
