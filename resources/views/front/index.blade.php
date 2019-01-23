@extends('front.blank')
@section('content')
	
<!-- SLIDER -->
<div class="slider-wrap slider-carousel">
	<div class="top-product-carousel">
		@foreach ($data['firstSlider'] as $first)
		<div class="tpc-content"> <img src="{{ asset('uploads/book/' . $first->pic) }}" class="img-responsive" alt="{{ $first->name }}" />
			<div class="tpc-overlay">
				<div class="tpc-overlay-inner">
					<div class="tpc-info">
					<h4><a href="{{ route('books.id',$first->id) }}"> {{ $first->title }} </a></h4> <a href="{{ route('books.id',$first->id) }}" class="cart-btn">المزيد</a> </div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<!-- PRODUCTS 1 -->
<div class="featured-products featured-products-bottom">
	<div class="container">
		<div class="row">
			<div class="heading-sub heading-sub2 text-center">
				<h5><span>روايات عربية</span></h5> 
			</div>
			@foreach ($data['arabicStory'] as $arabic)
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
				<div class="product-item">
					<div class="item-thumb"> 
						<img width="150" height="200" src="{{ asset('uploads/book/' . $arabic->pic) }}" class="img-responsive" alt="{{ $arabic->title }}" />
					 </div>
					<div class="product-info">
						<h3 class="product-title"><a href="{{ route('books.id',$arabic->id) }}"> {{ $arabic->title }} </a></h3>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="text-center"> <a class="btn-color show-more" href="{{ route('cat',1) }}">عرض المزيد</a> </div>
	<div class="space10"></div>
</div>
<div class="space20"></div>
<!-- NEW ARRIVALS -->
<div class="product-widgets">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h5 class="heading2 space40"><span> كتب تاريخ </span></h5>
				<div class="product-carousel">
					@foreach ($data['historicStory'] as $history)
					<div class="pc-wrap col-md-3 col-sm-3 col-xs-3">
						<div class="product-item">
							<div class="item-thumb"> 
								<img width="263" height="350" src="{{ asset('uploads/book/' . $history->pic) }}" class="img-responsive" alt="{{ $history->title }}" />
							</div>
							<div class="product-info">
									<h3 class="product-title"><a href="{{ route('books.id',$history->id) }}"> {{ $history->title }} </a></h3>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="text-center"> <a class="btn-color show-more" href="{{ route('cat',2) }}">عرض المزيد</a> </div>
			</div>
			<div class="col-md-6">
				<h5 class="heading2 space40"><span>تنمية بشرية </span></h5>
				<div class="product-carousel2">
					@foreach ($data['humanDevelopment'] as $human)
					<div class="pc-wrap col-md-3 col-sm-3 col-xs-3">
						<div class="product-item">
							<div class="item-thumb"> 
								<img width="263" height="350" src="{{ asset('uploads/book/' . $human->pic) }}" class="img-responsive" alt="{{ $human->title }}" />
							</div>
							<div class="product-info">
									<h3 class="product-title"><a href="{{ route('books.id',$human->id) }}"> {{ $human->title }} </a></h3>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="text-center"> <a class="btn-color show-more" href="{{ route('cat',3) }}">عرض المزيد</a> </div>
			</div>
		</div>
	</div>
</div>
<div class="space50 clearfix"></div>
<!-- PRODUCTS 3 -->
<div class="featured-products featured-products-top">
	<div class="container">
		<div class="row">
			<div class="heading-sub heading-sub2 text-center">
				<h5><span> روايات مترجمة </span></h5>
			</div>
			@foreach ($data['translatedStory'] as $translated)
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
				<div class="product-item">
					<div class="item-thumb"> 
						<img width="150" height="200" src="{{ asset('uploads/book/' . $translated->pic) }}" class="img-responsive" alt="{{ $translated->title }}" />
					 </div>
					<div class="product-info">
						<h3 class="product-title"><a href="{{ route('books.id',$translated->id) }}"> {{ $translated->title }} </a></h3>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="text-center"> <a class="btn-color show-more" href="{{ route('cat',4) }}">عرض المزيد</a> </div>
	<div class="space10"></div>
</div>
<div class="space20"></div>
@endsection