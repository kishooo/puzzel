@extends('header')
@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">إضافة منتج جديد</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="/admin/create/{{$user}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="exampleInputName1">اسم المنتج باانجليزيه</label>
								<input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="">
							</div>
							<div class="form-group">
								<label for="exampleInputName1">اسم المنتج باالعربيه</label>
								<input name="Arname" type="text" class="form-control" id="exampleInputName1" placeholder="">
							</div>
							<div class="form-group">
								<label for="exampleInputPrice1">سعر</label>
								<input name="price" type="text" class="form-control" id="exampleInputPrice1" placeholder="">
							</div>
                <div class="form-group">
								<label for="exampleInputcat1">قسم المنتج</label>
								<select class="form-control" name="category">
						<option>{{$categories[0]->title}}</option>

						    @foreach ($categories as $category)

						        <option name="category" value="{{ $category->title }}">

						            {{ $category->title }}

						        </option>

						    @endforeach
							</select>
													</div>
						                            <div class="form-group">
														<label for="exampleInputqu1">عدد المنتج</label>
														<input name="quantity" type="text" class="form-control" id="exampleInputqu1" placeholder="">
													</div>
													<div class="form-group">
														<label for="exampleInputFile">صورة المنتج</label>
														<input name="image" type="file" id="exampleInputFile">
													</div>
													<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">انشر</button>
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
