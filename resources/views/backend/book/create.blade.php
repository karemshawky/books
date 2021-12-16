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
                    <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                        <span>إضافة كتاب </span>
                    </h2>
                </div>
            </div>
        </div>

        <create-book :categories="{{ $categories }}" :tags="{{ $tags }}" :authors="{{ $authors }}" inline-template>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" role="form">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">أسم الكتاب </label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.title" v-for="error in errors.title">
                                @{{ error }}
                            </span>
                            <input type="text" v-model="form.title" class="form-control m-input"
                                placeholder="أدخل أسم الكتاب">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">شهرة الكتاب </label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.slug" v-for="error in errors.slug">
                                @{{ error }}
                            </span>
                            <input type="text" v-model="form.slug" class="form-control m-input"
                                placeholder="أدخل شهرة الكتاب">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">ملف الكتاب </label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.link" v-for="error in errors.link">
                                @{{ error }}
                            </span>
                            <input type="text" v-model="form.link" class="form-control m-input"
                                placeholder="أدخل عنوان الملف">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">القسم </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.categories"
                                v-for="error in errors.categories">
                                @{{ error }}
                            </span>
                            <select class="form-control m-select2" id="m_select2_1" multiple v-model="newCategories"
                                name="categories">
                                <option v-for="category in categories" :value="category.id"> @{{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">المؤلف </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.authors" v-for="error in errors.authors">
                                @{{ error }}
                            </span>
                            <select class="form-control m-select2" id="m_select2_2" multiple v-model="newAuthors"
                                name="authors">
                                <option v-for="author in authors" :value="author.id"> @{{ author.name }} </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">الكلمات المفتاحية </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.tags" v-for="error in errors.tags">
                                @{{ error }}
                            </span>
                            <select class="form-control m-select2" id="m_select2_3" multiple v-model="newTags"
                                name="tags">
                                <option v-for="tag in tags" :value="tag.id"> @{{ tag.name }} </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12"> الحالة </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control" v-model="form.status">
                                <option value="1">نشط</option>
                                <option value="0">غير نشط</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12"> تفاصيل الكتاب </label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.description"
                                v-for="error in errors.description">
                                @{{ error }}
                            </span>
                            <textarea class="form-control" name="description" v-model="form.description"></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">غلاف الكتاب </label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span class="invalid-feedback err" v-show="errors.cover" v-for="error in errors.cover">
                                @{{ error }}
                            </span>
                            <input type="file" @change="fileUpload($event)" class="form-control m-input">
                        </div>
                    </div>

                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" :disabled="form.busy" @click.prevent="submit()"
                                    class="btn btn-brand">أضف</button>

                                <span v-if="form.busy">
                                    <i class="fa fa-btn fa-spinner fa-spin"></i> {{ __('Next') }}
                                </span>

                                <a href="{{ route('books.index') }}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </create-book>

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
