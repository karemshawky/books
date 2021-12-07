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
                    <h5 class="heading space40"><span> {{ $author->name }} </span></h5>
                    <div class="media-list">
                        <div class="media">
                            <div class="media-body">
                                <img src="{{ url($author->pic ) }}" class="media-pic" alt="{{ $author->name }}">
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
                        <h2 class="novel-title space30"> نبذة عن المؤلف </h2>
                    </div>
                    <div class="row">
                        {!! $author->about !!}
                    </div>
                </div>
                <div class="sep space30"></div>
                <div class="related row">
                    <h3 class="space30"> الكتب الخاصة بالمؤلف </h3>
                    @foreach ($author->books as $book)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="product-item">
                            <div class="item-thumb">
                                <img width="150" height="200" src="{{ asset($book->pic )}}">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><a href="{{ route('books.slug', $book->slug) }}"> {{
                                        $book->title }} </a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sep space30"></div>
                <h3 class="space30"> تعليقات الفيس بوك </h3>
                <div class="comment">
                    <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-mobile="true"
                        data-width="100%"></div>
                </div>
            </aside>
        </div>
    </div>
    <div class="space20"></div>
    @endsection
