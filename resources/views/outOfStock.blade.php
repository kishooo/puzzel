@extends('header')
@section('content')

<div id="wrapper">
	<div class="main-content">
		<div class="prj-header margin-bottom-30">
			<a href="#" class="btn btn-info btn-submit-prj btn-sm waves-effect waves-light">أضف منتج جديد</a>
			<div class="result-count">10 Projects</div>
		</div>
		<!-- /.prj-header -->
		@foreach($products as $product)
		<div class="prj-list row">
			<div class="col-lg-4 col-md-6 col-xs-12 margin-bottom-30">
				<a href="#" class="prj-item">
					<div class="top-project-section">
						<div class="project-icon">
							<img src="{{ asset('images/'. $product->image) }}" alt="">
						</div>
						<h3>{{$product->title}}</h3>
						<div class="meta">
						</div>
					</div>
				</a>
			</div>
			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->
		</div>
		@endforeach
		<!-- .prj-list row -->


@endsection
