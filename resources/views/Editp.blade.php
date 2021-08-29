@extends('header')
@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">تعديل منتج </h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="/admin/online/products/edit/{{$product->id}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="exampleInputName1">اسم المنتج</label>
								<input name="name" value ="{{$product->title}}" type="text" class="form-control" id="exampleInputName1" placeholder="">
							</div>
							<div class="form-group">
								<label for="exampleInputPrice1">سعر</label>
								<input name ="price" value="{{$product->price}}" type="text" class="form-control" id="exampleInputPrice1" placeholder="">
							</div>
                            <div class="form-group">
								<label for="exampleInputcat1">قسم المنتج</label>
								<input name="category"  type="text" class="form-control" id="exampleInputcat1" placeholder="">
							</div>
                            <div class="form-group">
								<label for="exampleInputqu1">عدد المنتج</label>
								<input name="quantity" value="{{$product->quantity}}" type="text" class="form-control" id="exampleInputqu1" placeholder="">
							</div>
							<div class="form-group">
                                <input name="image" type="file" data-default-file="assets/images/test-image-1.jpg" />
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">عدل</button>
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
