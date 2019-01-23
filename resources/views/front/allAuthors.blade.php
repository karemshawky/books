@extends('front.blank')
@section('content')

<!-- PRODUCTS 1 -->
<div class="featured-products cat-page">
	<div class="container">
		<div class="row">
			<div class="heading-sub heading-sub2 text-center">
				<h5><span> كل المؤلفين </span></h5> 
			</div>
			@foreach ($authors as $author)
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="product-item">
					<div class="item-thumb"> <img width="150" height="200" src="{{ asset('uploads/author/' . $author->pic) }}" /> </div>
					<div class="product-info">
							<div class="author">
								<h5> <a href="{{ route('authors.id',$author->id) }}"> {{ $author->name }}  </a> </h5> 
							</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="space10"></div>
</div>
<!-- PAGINATION -->
<div class="pagenav-wrap">
	<div class="row">
		<div class="text-center">
			{{ $authors->links() }}
		</div>
	</div>
</div>
<div class="space20"></div>
@endsection