@extends('layouts.email.index')
@section('content')
<tr style="display: flex; justify-content: center; margin:0 30px 35px 30px">
	<td align="start" valign="start" style="padding-bottom: 10px;">
		<!--begin:Email content-->
		<div align="center" valign="center" style="text-align:center; margin:0 15px 34px 15px">
			<!--begin:Text-->
			<div
				style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;text-align:center;">
				<p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700; text-align:center;">Reset Password Request</p>
			</div>
			<!--end:Text-->
		</div>
		<!--end:Email content-->
		<!--begin:Text-->
        <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
            <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Dear {{$data->full_name}}</p>
            <p style="margin-bottom:2px; color:#5E6278">We are sending this email because we recieved a forgot password request.</p>      
        </div>  
        <!--end:Text-->
		<div align="center" valign="center" style="text-align:center; margin:0 15px 34px 15px">
			<!--begin:Text-->
			<!--begin:Action-->
			<a href="{{$url}}" target="_blank" style="background-color:#50cd89; border-radius:6px;display:inline-block; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500; font-family:Arial,Helvetica,sans-serif;">
				Reset Password
			</a> 
			<!--end:Action-->
		</div>
		<!--begin:Text-->
        <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
            <p style="margin-bottom:2px; color:#5E6278">If you did not request a password reset, no further action is required. Please contact us if you did not submit this request.</p>     
        </div>  
        <!--end:Text-->
		<!--begin::Wrapper-->
		<div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
			<!--begin::Item-->
			<div style="display:flex">
				<!--begin::Block-->
				<div>
					<!--begin::Content-->
					<div>
						<p style="margin-bottom:2px; font-size: 13px; color:#5E6278; line-break: anywhere;">
							If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <a href="{{$url}}" style="color:#52cc5c;">{{$url}}</a></p>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Block-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->

		</div>
		<!--end::Wrapper-->
	</td>
</tr>
@endsection
