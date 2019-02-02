@extends('front.blank')
@section('content')

<!-- PRODUCTS 1 -->
<div class="featured-products cat-page">
	<div class="container">
		<div class="row">
			@if ($books->items())
				<div class="heading-sub heading-sub2 text-center">
					<h5><span>   نتائج عن كلمة : {{ $word }} </span></h5> 
				</div>
				@foreach ($books as $book)
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="product-item">
						<div class="item-thumb"> <img width="150" height="200" src="{{ asset('uploads/book/' . $book->pic) }}" /> </div>
						<div class="product-info">
							<h3 class="product-title"><a href="{{ route('books.slug',$book->slug) }}"> {{ $book->title }} </a></h3>
							<div class="author">
								<h5> المؤلف :
									@foreach ($book->authors as $author)
										<a href="{{ route('authors.slug',$author->slug) }}"> {{ $author->name }}  </a> 
									@endforeach
								</h5> 
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@else
				<div class="heading-sub heading-sub2 text-center">
					<h5><span>  لا توجد نتائج بحث </span></h5> 
				</div>
				<h4 class="text-center"> <a href="{{ route('home') }}"> عودة للرئيسية </a> </h4>
			@endif
		</div>
	</div>
	<div class="space10"></div>
</div>
<!-- PAGINATION -->
<div class="pagenav-wrap">
	<div class="row">
		<div class="text-center">
			{{ $books->links() }}
		</div>
	</div>
</div>
<div class="space20"></div>
@endsection