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
                    <span>عرض مؤلف </span>
                </h2> </div>
			</div>
		</div>

		<div class="m-portlet__body">
			<table class="table table-bordered">
				<tbody>
						<tr>
							<td class="w-25 p-3"> <h6> صورة المؤلف </h6> </td>
							<td class="w-75 p-3"> <h5> <img src="/uploads/author/{{ ($author->pic == null ) ? 'no-image.png' : $author->pic }}" width="200" height="200"> </h5> </td>
						</tr>
					<tr>
						<td class="w-25 p-3"> <h6> أسم المؤلف </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $author->name }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> معلومات عن المؤلف  </h6> </td>
						<td class="w-75 p-3"> <h5> {{ strip_tags(html_entity_decode($author->about)) }} </h5> </td>
					</tr>
					<tr>
						<td class="w-25 p-3"> <h6> المسؤول </h6> </td>
						<td class="w-75 p-3"> <h5> {{ $author->user->name }} </h5> </td>
					</tr>
				</tbody>
			</table>
			<a href="{{ route('authors.index') }}" class="btn btn-md btn-info">رجوع</a>
		</div>

	</div>
	<!--end::Portlet-->
@endsection