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
                    <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                        <span>الرئيسية </span>
                    </h2>
                </div>
            </div>
        </div>

        <!--begin:: Widgets/Stats-->
        <div class="m-portlet ">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    عدد الكتب
                                </h4><br>
                                <span class="m-widget24__desc text-white">
                                    All Customs Value
                                </span>
                                <span class="m-widget24__stats m--font-brand">
                                    {{ $counts['books'] }}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    عدد المؤلفين
                                </h4><br>
                                <span class="m-widget24__desc text-white">
                                    C
                                </span>
                                <span class="m-widget24__stats m--font-info">
                                    {{ $counts['authors'] }}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-white">
                                    h5
                                </span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    عدد الأقسام
                                </h4><br>
                                <span class="m-widget24__desc text-white">
                                    Fresh Order Amount
                                </span>
                                <span class="m-widget24__stats m--font-danger">
                                    {{ $counts['categories'] }}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    عدد الأعضاء
                                </h4><br>
                                <span class="m-widget24__desc text-white">
                                    Joined New User
                                </span>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $counts['users'] }}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-success" role="progressbar" style="width:100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Stats-->

</div>
<!--end::Portlet-->
@endsection