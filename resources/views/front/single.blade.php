@extends('front.blank')
@section('content')

<div class="space10"></div>
<!-- BLOG CONTENT -->
<div class="blog-content cat-page">
	<div class="container">
		<div class="row">
			<!-- Sidebar -->
			<aside class="col-md-3 col-sm-4">
				<div class="novel-img">
					<div class="media-list">
						<div class="media">
							<div class="media-body"> 
								<img src="{{ asset('uploads/book/' . $book->pic ) }}" class="media-pic" width="200" height="150">
							</div>
						</div>
						<div class="media">
							<div class="media-body">
								<div class="the_champ_sharing_title" style="font-weight:bold"></div>
								<div class="cat_share">
									<div class="addthis_inline_share_toolbox"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<aside class="col-md-9 col-sm-8">
				<div class="novel-single">
					<div class="ps-header">
						<h2 class="novel-title space30"> {{ $book->title }} </h2>
						<div class="col-md-6 col-sm-6 ps-price space30"><img src="{{ asset('images/writer.png') }}"> المؤلف : 
							@foreach ($book->authors as $author)
								<a href="{{ route('authors.id', $author->id) }}" class="writer"> {{ $author->name }} </a>
							@endforeach 
						</div>
						<div class="col-md-6 col-sm-6 ps-price space30"><img src="{{ asset('images/layout.png') }}"> القسم : 
							@foreach ($book->categories as $category)
								<a href="{{ route('cat', $category->id) }}" class="writer"> {{ $category->name }} </a>
							@endforeach 
						</div>
					</div>
					<p> {{ $book->description }} </p>
				</div>
				<div class="btn-dwn space50">
					<a href="{{ route('reads.id', $book->id) }}" class="btn btn-danger btn-lg" role="button"> اقرأ أون لاين </a>
					<a href="https://drive.google.com/uc?id={{ $book->file }}&export=download" class="btn btn-success btn-lg"
					 role="button"> تحميل الكتاب </a>
				</div>
				<div class="sep space30"></div>
				<div class="tags row">
					<h3 class="space30"> كلمات مفتاحية </h3>
					<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
						<div class="product-info" style="display:-webkit-inline-box;float: right;">
							@foreach ($book->tags as $tags)
								<h4><a href="{{ route('search', $tags->name) }}">  {{ $tags->name .' , ' }} </a></h4>
							@endforeach					
						</div>
					</div>
				</div>
				<div class="space50"></div>
				<div class="sep space30"></div>
				<div class="related row">
					<h3 class="space30"> اقرأ أيضا </h3>
					@foreach ($relatedBooks as $related)
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
						<div class="product-item">
							<div class="item-thumb">
								<img src="{{ asset('uploads/book/' . $related->pic ) }}" class="media-pic" width="200" height="200">
							</div>
							<div class="product-info">
								<h3 class="product-title"><a href="{{ route('books.id',$related->id) }}"> {{ $related->title }} </a></h3>
							</div>
						</div>
					</div>
					@endforeach					
				</div>
				<div class="sep space30"></div>
				<h3 class="space30"> تعليقات الفيس بوك </h3>
				<div class="comment">
					<div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-mobile="true" data-width="100%"></div>
				</div>
			</aside>
		</div>
	</div>
	<div class="space20"></div>
@endsection