@extends('backend.blank')
@section('content')

    <div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="flaticon-statistics"></i>
                </span>
                <h3 class="m-portlet__head-text text-white">
                    Portlet sub title goes here
                </h3>
                <h2 class="m-portlet__head-label m-portlet__head-label--primary">
                    <span>تعديل كلمة  </span>
                </h2>
            </div>
        </div>
    </div>

    <!--begin::Form-->
    <form action="{{ route('tags.update',$tag->id) }}" method="POST" class="m-form m-form--fit m-form--label-align-right">
            @method('PUT')
            @csrf
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">أسم الكلمة </label>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control m-input" placeholder="عدل الكلمة"> </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-brand">حفظ</button>
                        <a href="{{ route('tags.index') }}" class="btn btn-secondary">رجوع</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Portlet-->
@endsection