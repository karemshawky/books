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
                        <span>تعديل بيانات المؤلف </span>
                    </h2>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form action="{{ route('authors.update',$author->id) }}" method="POST" enctype="multipart/form-data"
            class="m-form m-form--fit m-form--label-align-right">
            @method('PUT')
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">أسم المؤلف </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="text" name="name" value="{{ old('name',$author->name) }}"
                            class="form-control m-input" required="required" placeholder="أدخل أسم المؤلف">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">شهرة المؤلف </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="text" name="slug" value="{{ old('slug',$author->slug) }}"
                            class="form-control m-input" required="required" placeholder="أدخل شهرة المؤلف">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">معلومات عن المؤلف</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <textarea name="about"
                            class="form-control my-editor">{!! old('about',$author->about) !!}</textarea>

                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12"> الحالة </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select class="form-control" name="status">
                            <option @if ($author->status == 1) selected=selected @endif value="1">نشط</option>
                            <option @if ($author->status == 0) selected=selected @endif value="0">غير نشط</option>
                        </select>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">صورة المؤلف </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="file" name="pic" class="form-control m-input">
                    </div>
                </div>

            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-brand">حفظ</button>
                            <a href="{{ route('authors.index') }}" class="btn btn-secondary">رجوع</a>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
