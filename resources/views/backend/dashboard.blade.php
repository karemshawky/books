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

                        {{-- <main-dashboard :data={{ $data }}> </main-dashboard>
                        <books-dashboard :data={{ $data }}> </books-dashboard>
                        <categories-dashboard :data={{ $data }}> </categories-dashboard>
                        <authors-dashboard :data={{ $data }}> </authors-dashboard>
                        <tags-dashboard :data={{ $data }}> </tags-dashboard> --}}

                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Stats-->

    </div>
    <!--end::Portlet-->
    @endsection
