@extends('header')
@section('content')

<div id="wrapper">
	@foreach($reviews as $review)
	<form action="/admin/ShowReviewAdmin/{{$review->id}}/{{$userId}}" method="post">
		@csrf
	<div class="main-content">
		<div class="row row-inline-block small-spacing">
				<div class="col-lg-4 col-md-6 col-xs-12">
				    <div class="box-content bordered info js__card">
				        <h4 class="box-title with-control">
				            {{$review->name}}
				            <span class="controls">
				                <button type="button" class="control fa fa-minus js__card_minus"></button>
				            </span>
				            <!-- /.controls -->
				        </h4>
				        <!-- /.box-title -->
				        <div class="js__card_content">
				            <p>{{$review->title}}</p>
										@if($review->published ==1)
										 <button type="submit" class="btn btn-sm btn-rounded btn-danger">اخفي</button>
										@else
				            <button type="submit" class="btn btn-sm btn-rounded btn-success">انشر</button>
										@endif

				        </div>
				    </div>
				    <!-- /.box-content -->
				</div>
<!-- /.col-lg-4 col-md-6 col-xs-12 -->
      </div>
			</div>
				</form>
			@endforeach
</div>

@endsection
