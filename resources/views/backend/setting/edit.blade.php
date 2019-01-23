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
                    <span>تعديل البيانات  </span>
                </h2>
            </div>
        </div>
    </div>

    <!--begin::Form-->
    <form action="{{ route('settings.update',$setting->id) }}" method="POST" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
        @method('PUT')
        @csrf
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> عنوان الموقع </label>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <input type="text" name="title" value="{{ old('title',$setting->title) }}" class="form-control m-input" required="required" placeholder="أدخل عنوان الموقع"> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> تفاصيل الموقع</label>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <textarea name="description" class="form-control my-editor">{!! old('description',$setting->description) !!}</textarea>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> كلمات مفتاحية للموقع </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="text" name="tags" value="{{ old('tags',$setting->tags) }}" class="form-control m-input" required="required" placeholder="أدخل الكلمات المفتاحية "> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> Facebook Link </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="text" name="facebook" value="{{ old('facebook',$setting->facebook) }}" class="form-control m-input" required="required" placeholder="https://www.fb.com"> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> Twitter Link </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="text" name="twitter" value="{{ old('twitter',$setting->twitter) }}" class="form-control m-input" required="required" placeholder="https://www.twitter.com"> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> Instagram Link </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="text" name="instagram" value="{{ old('instagram',$setting->instagram) }}" class="form-control m-input" required="required" placeholder="https://www.instagram.com"> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> Pintrest Link </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="text" name="pintrest" value="{{ old('pintrest',$setting->pintrest) }}" class="form-control m-input" required="required" placeholder="https://www.pintrest.com"> </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12"> E-mail </label>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <input type="email" name="mail" value="{{ old('mail',$setting->mail) }}" class="form-control m-input" required="required" placeholder="https://www.mail@website.com"> </div>
            </div>

        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-brand">حفظ</button>
                        <a href="{{ route('settings.index') }}" class="btn btn-secondary">رجوع</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->


</div>
<!--end::Portlet-->
@endsection
@push('js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush