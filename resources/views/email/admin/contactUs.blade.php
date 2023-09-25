@extends('layouts.email.index')
@section('content')
<tr style="display: flex; justify-content: center; margin:0 30px 35px 30px">
	<td align="start" valign="start" style="padding-bottom: 10px;">
		<!--begin:Email content-->
		<div align="center" valign="center" style="text-align:center; margin:0 15px 34px 15px">
			<!--begin:Text-->
			<div
				style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;text-align:center;">
				<p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700; text-align:center;">Contact Us</p>
			</div>
			<!--end:Text-->
		</div>
		<!--end:Email content-->
		<!--begin::Wrapper-->
		<div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
			<!--begin::Item-->
			<div style="display:flex">
				<!--begin::Block-->
				<div>
					<!--begin::Content-->
					<div>
						<!--begin::Title-->
						<a
							style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Name</a>
						<!--end::Title-->

						<!--begin::Desc-->
						<p
							style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">{{$data['data']['name'] }}</p>
						<!--end::Desc-->
					</div>
					<!--end::Content-->

					<!--begin::Separator-->
					<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
					<!--end::Separator-->

				</div>
				<!--end::Block-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div style="display:flex">
				<!--begin::Block-->
				<div>
					<!--begin::Content-->
					<div>
						<!--begin::Title-->
						<a
							style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Email</a>
						<!--end::Title-->

						<!--begin::Desc-->
						<p
							style="color:#52cc5c; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif"><a href="mailto:{{$data['data']['email'] }}" style="color:#52cc5c;">{{$data['data']['email'] }} </a></p>
						<!--end::Desc-->
					</div>
					<!--end::Content-->

					<!--begin::Separator-->
					<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
					<!--end::Separator-->

				</div>
				<!--end::Block-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div style="display:flex">
				<!--begin::Block-->
				<div>
					<!--begin::Content-->
					<div>
						<!--begin::Title-->
						<a
							style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">Message</a>
						<!--end::Title-->

						<!--begin::Desc-->
						<p
							style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">{{$data['data']['message'] }}</p>
						<!--end::Desc-->
					</div>
					<!--end::Content-->


				</div>
				<!--end::Block-->
			</div>
			<!--end::Item-->

		</div>
		<!--end::Wrapper-->
	</td>
</tr>
@endsection
