@extends('layouts.email.index')
@section('content')
<tr style="display: flex; justify-content: center; margin:0 30px 5px 30px">
	<td align="start" valign="start" style="padding-bottom: 2px;">
		<!--begin:Email content-->
		<div align="center" valign="center" style="text-align:center; margin:0 15px 5px 15px">
			<!--begin:Text-->
			<div
				style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;text-align:center;">
				<p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700; text-align:center;">Thank you for contact us!</p>
				<p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">Thank you for contacting us! We are glad to receive your message and appreciate the time you have taken to reach out to us.</p>
				<p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">Please be assured that your message has been received and we will be in touch with you shortly.</p>
				<p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">Thank you once again for reaching out to us. We value your business and look forward to serving you.</p>
			</div>
			<!--end:Text-->
		</div>
		<!--end:Email content-->
	</td>
</tr>
@endsection
