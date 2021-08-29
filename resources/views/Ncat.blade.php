@extends('header')
@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">إضافة قسم جديد  </h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="/admin/Create/Category/{{$userId}}" method="post">
							@csrf
							<div class="form-group">
								<label for="exampleInputName1">اسم القسم</label>
								<input name="category" type="text" class="form-control" id="exampleInputName1" placeholder="">
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">حفظ</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content card white -->
</div>
<!-- /.col-lg-4 col-xs-12 -->
</div>
@endsection
