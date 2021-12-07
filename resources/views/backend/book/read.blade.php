@extends('backend.blank')
@section('content')

<div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title"> <span class="m-portlet__head-icon m--hide">
                        <i class="flaticon-statistics"></i>
                    </span>
                    <h3 class="m-portlet__head-text text-white"> Portlet sub title goes here </h3>
                    <h2 class="m-portlet__head-label m-portlet__head-label--info">
                        <span>عرض الكتاب </span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="m-portlet__body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> غلاف الكتاب </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> <img src="{{ $author->pic }}" width="200" height="200"> </h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> أسم الكتاب </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> {{ $book->title }} </h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> المؤلف </h6>
                        </td>
                        <td class="w-75 p-3">
                            @foreach ($book->authors as $author)
                            <h5> {{ $author->name }} </h5>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> القسم </h6>
                        </td>
                        <td class="w-75 p-3">
                            @foreach ($book->categories as $category)
                            <h5> {{ $category->name }} </h5>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> الكلمات المفتاحية </h6>
                        </td>
                        <td class="w-75 p-3">
                            @foreach ($book->tags as $tag)
                            <h5> {{ $tag->name }} </h5>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> معلومات عن الكتاب </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> {!! $book->description !!} </h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> لينك الكتاب </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> {{ $book->file }} </h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> تاريخ الاضافة </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> {{ $book->created_at->diffForHumans() }} </h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25 p-3">
                            <h6> المسؤول </h6>
                        </td>
                        <td class="w-75 p-3">
                            <h5> {{ $book->user->name }} </h5>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('books.index') }}" class="btn btn-md btn-info">رجوع</a>
        </div>

    </div>
    <!--end::Portlet-->
    @endsection
