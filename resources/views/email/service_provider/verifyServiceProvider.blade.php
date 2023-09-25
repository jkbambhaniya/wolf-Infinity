@extends('layouts.email.index')
@section('content')
    <tr style="display: flex; justify-content: center; margin:0 30px 5px 30px">
        <td align="start" valign="start" style="padding-bottom: 2px;">
            <!--begin:Email content-->
            <div align="center" valign="center" style="text-align:center; margin:0 15px 5px 15px">
                <!--begin:Text-->
                <div
                    style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;text-align:center;">
                    <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700; text-align:center;">Profile
                        Verified Successfully!</p>
                    <p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">I am pleased to inform
                        you that your profile has been successfully verified. Our team has reviewed all of the information
                        and documentation that you provided.</p>
                    <p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">With your profile now
                        verified, you can start receiving bookings for your services. We encourage you to log in to your
                        account and get bookings, as well as update your availability and service offerings as needed.</p>
                    <p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">We appreciate your
                        cooperation and patience throughout the verification process. If you have any further questions or
                        concerns, please do not hesitate to reach out to us.</p>
                    <p style="margin-bottom:2px; color:#7E8299; margin-bottom:13px; text-align:left;">Thank you for choosing
                        our company for your needs. We look forward to continuing to work with you in the future.</p>
                </div>
                <!--end:Text-->
            </div>
            <!--end:Email content-->
        </td>
    </tr>
@endsection
