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
                    <span> بيانات الموقع </span>
                </h2> </div>
			</div>
			<div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
						<a href="{{ route('settings.edit',$setting->id) }}" class="btn btn-md btn-danger">
                            <span>
                                <i class="la la-edit"></i>
                                <span>  تعديل بيانات الموقع </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
			</div>
		</div>

		<div class="m-portlet__body">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td class="w-25 p-3"> <h6> عنوان الموقع </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->title }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> تفاصيل الموقع </h6> </td>
						<td class="w-75 p-3"> <h5> {!! $setting->description !!} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> كلمات مفتاحية للموقع </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->tags }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> Facebook Link </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->facebook }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> Twitter Link </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->twitter }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> Instagram Link </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->instagram }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> Pintrest Link </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->pintrest }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> E-mail </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $setting->mail }} </h5> </td>
					</tr>
					
				</tbody>
			</table>
		</div>

	</div>
	<!--end::Portlet-->
@endsection