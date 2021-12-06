@extends('front.blank')
@section('content')

<div class="space10"></div>
<!-- BLOG CONTENT -->
<div class="blog-content cat-page">
	<div class="container">
		<div class="row">
			<!-- Sidebar -->
			{{-- <aside class="col-sm-4">
				<div class="contact-info space50">
					<h5 class="heading space40"><span>Contact Us</span></h5>
					<div class="media-list">
						<div class="media"> <i class="pull-left fa fa-home"></i>
							<div class="media-body"> <strong>Address:</strong>
								<br> 987 Main st. New York, NY, 00001, U.S.A </div>
						</div>
						<div class="media"> <i class="pull-left fa fa-phone"></i>
							<div class="media-body"> <strong>Telephone:</strong>
								<br> (012) 345-7689 </div>
						</div>
						<div class="media"> <i class="pull-left fa fa-envelope-o"></i>
							<div class="media-body"> <strong>Fax:</strong>
								<br> 0123456789 </div>
						</div>
						<div class="contact-details">
							<p> Phasellus pellentesque purus in massa aenean in pede phasellus libero ac tellus pellentesque semper. </p>
						</div>
						<div class="media">
							<div class="media-body"> <strong>Customer Service:</strong>
								<br> <a href="mailto:hello@bella.com">hello@smile.com</a> </div>
						</div>
						<div class="media">
							<div class="media-body"> <strong>Returns and Refunds:</strong>
								<br> <a href="mailto:hello@bella.com">hello@smile.com</a> </div>
						</div>
					</div>
				</div>
			</aside> --}}
			<aside class="col-sm-12 space70">
				<h5 class="heading space40"><span>تواصل معنا</span></h5>
				<form action="javascript:;" id="form" role="form" class="form ">
					<div class="row">
						<div class="col-md-6 space20">
							<input name="name" id="name" class="input-md form-control" placeholder="الأسم *" maxlength="100" required="required" type="text"> </div>
						<div class="col-md-6 space20">
							<input name="email" id="email" class="input-md form-control" placeholder="البريد الإلكترونى *" maxlength="100" required="required" type="email"> </div>
					</div>
					<div class="space20">
						<input class="input-md form-control" placeholder="عنوان الموضوع" maxlength="100" required="" type="text"> </div>
					<div class="space20">
						<textarea name="text" id="text" class="input-md form-control" rows="6" placeholder="الرسالة" maxlength="400"></textarea>
					</div>
					<button type="submit" class="btn-black"> أرسل </button>
				</form>
			</aside>
		</div>
	</div>
</div>
<div class="clearfix space20"></div>
<div class="space20"></div>
@endsection