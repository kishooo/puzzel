@extends('header')
@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="prj-header margin-bottom-30">
			<a href="/admin/Create/Category/{{$user->id}}" class="btn btn-info btn-submit-prj btn-sm waves-effect waves-light">أضف قسم جديد</a>
			<div class="result-count">130 Projects</div>
			<!-- /.result-count -->
			<ul class="filters">
				<li><a class="active" href="/admin/online/products/{{$user->id}}">الكل</a></li>
				@foreach($allProductCategories as $allProductCategory)
					<li><a href="/admin/{{$allProductCategory->categoryId}}/{{$user->id}}">{{$allProductCategory->categoryTitle}}</a></li>
				@endforeach
				<!--
				<li><a href="#">لامسة</a></li>
				<li><a href="#">تجملي</a></li>
				<li><a href="#">كلورينا</a></li>
			</ul>!-->
			<!-- /.filters -->
		</div>
		<!-- /.prj-header -->

		<div class="prj-list row">
			<!-- loop !-->
			@foreach($productCategories as $productCategory)
				@foreach($productWithCategories as $productWithCategory)
					<form name="form" >
						@csrf

					@if($productWithCategory->categoriesId==$productCategory->categoriesId)
						<div class="col-lg-4 col-md-6 col-xs-12 margin-bottom-30">
							<a href="#" class="prj-item">
								<div class="top-project-section">
									<div class="project-icon">
										<img src="{{ asset('images/'. $productWithCategory->image) }}" alt="">
									</div>
									<h3>{{$productWithCategory->productTitle}}</h3>
									<div class="meta">
										<p class="author">
											by <span>{{$productCategory->title}}</span>
										</p>
									</div>
								</div>
								<div class="bottom-project-section">
									<div class="meta">
										<div class="points">
											<i class="fa fa-tag"></i> {{$productWithCategory->price}}
										</div>
										<div class="views">
											 {{$productWithCategory->quantity}}
										</div>
									</div>
								</div>
							</a>
											<a herf="/admin/online/products/edit/{{$productWithCategory->productId}}/{{$user->id}}">
													<button class="btn btn-sm btn-bordered btn-success" value="get" onclick="javascript: form.action='/admin/online/products/edit/{{$productWithCategory->productId}}/{{$user->id}}';">تعديل</button>
											</a >
											@if($productWithCategory->appeared % 2 == 1)
		                  	<button type="submit" value="post" onclick="javascript: form.action='/admin/online/products/{{$productWithCategory->productId}}/{{$user->id}}'; form.method='post';" class="btn btn-sm btn-bordered btn-danger">اخفي</button>
											@else
												<button type="submit" value="post" onclick="javascript: form.action='/admin/online/products/{{$productWithCategory->productId}}/{{$user->id}}';form.method='post';" class="btn btn-sm btn-bordered btn-danger">اظهار</button>
											@endif

						</div>
						</form>

						@endif
					@endforeach
			@endforeach
			<!-- till here -->
			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->
		</div>
		<!-- .prj-list row -->


@endsection
